<?php

namespace Espo\Modules\Main\Tools\Api\SalesOrder;

use Espo\Core\Api\Action;
use Espo\Core\Api\Request;
use Espo\Core\Api\Response;
use Espo\Core\Api\ResponseComposer;
use Espo\Core\Exceptions\BadRequest;
use Espo\Core\ORM\EntityManager;
use Espo\ORM\Entity;
use stdClass;

class Summary implements Action
{
    public function __construct(
        private readonly EntityManager $entityManager
    ) {
    }

    public function process(Request $request): Response
    {
        $id = $request->getRouteParam('id') ?? throw new BadRequest();

        $salesOrder = $this
            ->entityManager
            ->getEntityById('SalesOrder', $id) ?? throw new BadRequest();

        $productionOrders = $this
            ->entityManager
            ->getRDBRepository('SalesOrder')
            ->getRelation($salesOrder, 'productionOrders')
            ->find();

        $tree = [];

        foreach ($productionOrders as $productionOrder) {
            $tree[] = $this->decomposeProductionOrder($productionOrder, $tree);
        }

        return ResponseComposer::json($tree);
    }

    private function decomposeProductionOrder(Entity $productionOrder): stdClass
    {
        $materialSet = [];

        $materials = $this
            ->entityManager
            ->getRDBRepository('ProductionOrder')
            ->getRelation($productionOrder, 'billOfMaterials')
            ->find();

        foreach ($materials as $material) {
            $product = $this
                ->entityManager
                ->getRDBRepository('ProductionModelItem')
                ->getRelation($material, 'product')
                ->findOne();

            if (!$product) {
                continue;
            }

            // Skip if already set, we only want to show each product once
            if (array_key_exists($product->getId(), $materialSet)) {
                continue;
            }

            $warehouse = $this
                ->entityManager
                ->getRDBRepository('ProductionOrder')
                ->getRelation($productionOrder, 'materialWarehouse')
                ->findOne();

            assert($warehouse);

            $childProductionOrder = $this
                ->entityManager
                ->getRDBRepository('ProductionOrder')
                ->getRelation($productionOrder, 'childProductionOrders')
                ->where('productId', $product->getId())
                ->findOne();

            if ($childProductionOrder) {
                $childProductionOrder = $this->decomposeProductionOrder($childProductionOrder);
            } else {
                $childProductionOrder = null;
            }

            $warehouseQuantity = $this
                ->entityManager
                ->getRDBRepository('WarehouseItem')
                ->where([
                    'productId' => $product->getId(),
                    'parentId' => $warehouse->getId(),
                    'parentType' => 'Warehouse'
                ])
                ->sum('quantity');

            $orderedQuantity = $this
                ->entityManager
                ->getRDBRepository('SupplierOrderItem')
                ->join('supplierOrder')
                ->where('supplierOrder.status', 'Processing')
                ->where('productId', $product->getId())
                ->sum('quantity');

            $inProductionQuantity = $this
                ->entityManager
                ->getRDBRepository('ProductionOrder')
                ->where('productId', $product->getId())
                ->where('status', 'Ongoing')
                ->sum('quantityPlanned');

            $materialSet[$product->getId()] = [
                'id' => $product->getId(),
                'name' => $product->get('name'),
                'neededQuantity' => $material->get('quantity'),
                'reservedQuantity' => 'TODO!',
                'warehouseQuantity' => $warehouseQuantity,
                'productionOrder' => $childProductionOrder,
                'orderedQuantity' => $orderedQuantity,
                'inProductionQuantity' => $inProductionQuantity
            ];
        }

        return (object)[
            'id' => $productionOrder->getId(),
            'materials' => $materialSet
        ];
    }
}
