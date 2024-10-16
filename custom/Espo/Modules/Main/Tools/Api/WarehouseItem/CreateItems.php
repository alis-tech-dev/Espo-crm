<?php

namespace Espo\Modules\Main\Tools\Api\WarehouseItem;


use Espo\Core\Api\Action;
use Espo\Core\Api\Request;
use Espo\Core\Api\Response;
use Espo\Core\Api\ResponseComposer;
use Espo\Core\Exceptions\BadRequest;
use Espo\Core\ORM\EntityManager;
use Espo\Modules\WarehouseManagement\Entities\Warehouse;
use Espo\Modules\WarehouseManagement\Entities\WarehouseItem;
use Espo\Modules\WarehouseManagement\Tools\Stock\Manager\DefaultStockManager;

class CreateItems implements Action
{
    public function __construct(
        private EntityManager $entityManager
    )
    {
    }

    public function process(Request $request): Response
    {
        try {
            $this->entityManager->getTransactionManager()->start();
            $warehouseId = $request->getRouteParam('productId') ?? throw new BadRequest('ProductId not found');
            $countStr = $request->getRouteParam('count') ?? throw new BadRequest('Count not found');
            $count = intval($countStr);
            $stockLocation = $request->getRouteParam('stock')  ?? throw new BadRequest('Stock not found');

            $warehouse = $this->entityManager->getEntityById('Warehouse', $warehouseId);
            $productId = $warehouse->get('productId');

            $productName = $warehouse->get('name');
            $productUnit = $warehouse->get('unit');

            $resultQuantity = '';
            if ($stockLocation == 'brno') {
                $resultQuantity = 'availableBrno';
            } else if ($stockLocation == 'pv'){
                $resultQuantity = 'availablePv';
            }

            $serialNumber = $warehouse->get('isSerialNumber');
            $warehouseId = $warehouse->getId();
            $warehouseTotalQuantity = $warehouse->get('quantity');
            $warehouseAvailableQuantity = $warehouse->get($resultQuantity);

            $resultTotalQuantity = $warehouseTotalQuantity + $count;
            $resultAvailableQuantity = $warehouseAvailableQuantity + $count;

            $warehouse->set('quantity', $resultTotalQuantity);
            $warehouse->set($resultQuantity, $resultAvailableQuantity);
            $this->entityManager->saveEntity($warehouse);


            $metricUnits = ['m', 'kg', 'g'];

            if (in_array($productUnit, $metricUnits) || $serialNumber == 0) {
                $warehouseItemsM = $this->entityManager->getRDBRepository('WarehouseItem')
                    ->where('parentId', $warehouseId)
                    ->findOne();

                if (!$warehouseItemsM) {
                    $singleWarehouseItemM = $this->entityManager->getNewEntity(WarehouseItem::ENTITY_TYPE);
                    $singleWarehouseItemM->set([
                        'serialNumber' => $productName,
                        'productId' => $productId,
                        'parentType' => Warehouse::ENTITY_TYPE,
                        'parentId' => $warehouseId,
                        'isReserved' => 0,
                        'quantity' => $count,
                    ]);
                    $this->entityManager->saveEntity($singleWarehouseItemM);
                } else {
                    $stockQuantity = $warehouseItemsM->get('quantity');
                    $totalQuantity = $stockQuantity + $count;

                    $warehouseItemsM->set([
                        'quantity' => $totalQuantity,
                    ]);
                    $warehouse->set([
                        'quantity' => $totalQuantity
                    ]);
                    $this->entityManager->saveEntity($warehouseItemsM);
                    $this->entityManager->saveEntity($warehouse);
                }
            } else {
                $i = 0;
                for ($i = 0; $i < $count; $i++) {
                    $warehouseItem = $this->entityManager->getNewEntity(WarehouseItem::ENTITY_TYPE);
                    $warehouseItem->set([
                        'productId' => $productId,
                        'parentType' => Warehouse::ENTITY_TYPE,
                        'parentId' => $warehouse->getId(),
                        'isReserved' => 0,
                        'quantity' => 1,
                    ]);

                    $this->entityManager->saveEntity($warehouseItem, [
                        DefaultStockManager::TRIGGERED_BY_STOCK_MANAGER => true,
                    ]);
                }
            }
            $this->entityManager->getTransactionManager()->commit();
            return ResponseComposer::json(['status'=> "Delivered quantity updated. {$count} products added to stock. Available quantity: {$resultAvailableQuantity}."]);
        } catch (\Exception $e) {
            $this->entityManager->getTransactionManager()->rollback();
            throw new BadRequest('Error processing request: ' . $e->getMessage());
        }
    }
}