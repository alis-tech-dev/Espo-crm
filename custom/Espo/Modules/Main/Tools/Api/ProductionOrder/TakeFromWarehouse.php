<?php

namespace Espo\Modules\Main\Tools\Api\ProductionOrder;

use Espo\Core\Api\Action;
use Espo\Core\Api\Request;
use Espo\Core\Api\Response;
use Espo\Core\Api\ResponseComposer;
use Espo\Core\Exceptions\BadRequest;
use Espo\Core\ORM\EntityManager;

class TakeFromWarehouse implements Action
{
    public function __construct(
        private EntityManager $entityManager
    ) {
    }

    public function process(Request $request): Response
    {
        $id = $request->getRouteParam('id') ?? throw new BadRequest('ID not found.');
        $quantityStr = $request->getRouteParam('quantity')  ?? throw new BadRequest('Quantity not found.');
        $quantity = intval($quantityStr);
        $stockLocation = $request->getRouteParam('stock')  ?? throw new BadRequest('Stock not found');

        $productionOrder = $this
            ->entityManager
            ->getEntityById('ProductionOrder', $id) ?? throw new BadRequest();

        $salesOrderId = $productionOrder->get('salesOrderId');

        $warehouseId = $productionOrder->get('productWarehouseId');
//        $warehouse = $this->entityManager->getEntityById('Warehouse', $warehouseId);

        $name = $productionOrder->get('name');
        $warehouse = $this->entityManager->getRDBRepository('Warehouse')
            ->where('name', $name)
            ->findOne();

        $serialNumber = $warehouse->get('isSerialNumber');
        $warehouseId = $warehouse->getId();
        $product = $this->entityManager->getEntityById('Product', $productionOrder->get('productId'));
        $productUnit = $product->get('unit');

        $warehouseItems = $this->entityManager->getRDBRepository('WarehouseItem')
            ->where('parentId', $warehouseId)
            ->having('isReserved', 0)
            ->order('serialNumber', 'ASC')
            ->find();
        $fromWarehouseQuantity = $productionOrder->get('fromWarehouse');
        if ($stockLocation == 'brno') {
            $availableQuantity = $warehouse->get('availableBrno');
            $resultQuantity = 'availableBrno';
        } else if ($stockLocation == 'pv'){
            $availableQuantity = $warehouse->get('availablePv');
            $resultQuantity = 'availablePv';
        }
        $producedQuantity = $productionOrder->get('quantityProduced');
        $planedQuantity = $productionOrder->get('quantityPlanned');
        $expectedQuantity = $planedQuantity - $producedQuantity - $fromWarehouseQuantity;
        $totalQuantity = $fromWarehouseQuantity + $producedQuantity;
        $singleUnits = ['km', 'hod', 'day'];
        $units = ['m', 'kg', 'g'];

        if ($availableQuantity == 0) {
            throw new BadRequest("The available quantity in the warehouse is not enough. Available quantity: {$availableQuantity}");

        } else if ($quantity > $expectedQuantity) {
            throw new BadRequest("Quantity must be less than or equal to {$expectedQuantity}.");

        } elseif ($planedQuantity == $totalQuantity) {
            throw new BadRequest("You already have required 'Total quantity'. Total quantity: {$totalQuantity}");

        } elseif ($availableQuantity < $quantity) {
            $resultFromWarehouse = $fromWarehouseQuantity + $availableQuantity;
            $productionOrder->set('fromWarehouse', $resultFromWarehouse);
            $this->entityManager->saveEntity($productionOrder, ['skipHooks' => true]);
            $this->reservingItems($warehouseItems, $availableQuantity, $salesOrderId, $productionOrder, $serialNumber);
            $warehouse->set($resultQuantity, 0);
            if (in_array($productUnit, $units)  || $serialNumber == 0) {
//                $warehouse->set('quantity', 0);
                $pass = '';
            }
            if (in_array($productUnit, $singleUnits)) {
                $warehouse->set('quantity', 9999);
                $warehouse->set('availableQuantity', 9999);
            }
            $this->entityManager->saveEntity($warehouse);

            return ResponseComposer::json(['status' => "from the warehouse received {$availableQuantity}, Warehouse available quantity: 0."]);

        } else {
            $resultFromWarehouse = $fromWarehouseQuantity + $quantity;
            $productionOrder->set('fromWarehouse', $resultFromWarehouse);
            $this->entityManager->saveEntity($productionOrder, ['skipHooks' => true]);
            $this->reservingItems($warehouseItems, $quantity, $salesOrderId, $productionOrder, $serialNumber);
            $totalAvailableQuantity = $availableQuantity - $quantity;
            $warehouse->set($resultQuantity, $totalAvailableQuantity);
            if (in_array($productUnit, $units) || $serialNumber == 0){
//                $warehouse->set('quantity', $totalAvailableQuantity);
                $pass = '';
            }
            if (in_array($productUnit, $singleUnits)) {
                $warehouse->set('quantity', 9999);
                $warehouse->set('availableQuantity', 9999);
            }
            $this->entityManager->saveEntity($warehouse);

            return ResponseComposer::json(['status' => "from the warehouse received {$quantity}."]);
        }
    }
    private function reservingItems($items, $quantity, $attribute, $productionOrder, $serialNumber): void {
        $product = $this->entityManager->getEntityById('Product', $productionOrder->get('productId'));
        $productUnit = $product->get('unit');
        $entryKey = $productionOrder->get('entryKey');

        $singleUnits = ['km', 'hod', 'day'];
        $metricUnits = ['m', 'kg', 'g', 'km', 'hod', 'day'];

        if (in_array($productUnit, $metricUnits) || $serialNumber == 0) {
            $warehouseItem = $items[0];
            $warehouseItemId = $items[0]->getId();
            $warehouseItemQuantity = $warehouseItem->get('quantity');
            if (in_array($productUnit, $singleUnits)) {
                $resultQuantity = 9999;
            } else {
                $resultQuantity = $warehouseItemQuantity;
            }

            $warehouseItem->set('quantity', $resultQuantity);
            $this->entityManager->saveEntity($warehouseItem);


            $WarehouseItemSalesOrder = $this->entityManager->getRDBRepository('Wiso')
                ->where('salesOrder1Id', $attribute)
                ->having('warehouseItem1Id', $warehouseItemId)
                ->findOne();

            if (!$WarehouseItemSalesOrder) {
                $WarehouseItemSalesOrder = $this->entityManager->createEntity('Wiso', [
                    'salesOrder1Id' => $attribute,
                    'warehouseItem1Id' => $warehouseItemId,
                    'entryKey' => $entryKey
                ]);
            }
            $soReservedQuantity = $WarehouseItemSalesOrder->get('quantity');
            if ($soReservedQuantity == 0) {
                $WarehouseItemSalesOrder->set('quantity', $quantity);
            } else {
                $totalSoQuantity = $soReservedQuantity + $quantity;
                $WarehouseItemSalesOrder->set('quantity', $totalSoQuantity);
            }
            $this->entityManager->saveEntity($WarehouseItemSalesOrder);

        } else {
            $count = 0;
            foreach ($items as $item) {
                if ($count >= $quantity) {
                    break;
                }
                $item->set('isReserved', 1);
                $item->set('salesOrderId', $attribute);
                $this->entityManager->saveEntity($item);
                $count++;
            }
        }
    }
}
