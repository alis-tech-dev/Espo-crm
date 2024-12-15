<?php

namespace Espo\Modules\Main\Hooks\WorkPerformed;

use Espo\Core\Exceptions\BadRequest;
use Espo\Core\Hook\Hook\BeforeSave;
use Espo\ORM\Entity;
use Espo\ORM\Repository\Option\SaveOptions;
use Espo\Core\ORM\EntityManager;
use LogicException;
use Espo\Modules\WarehouseManagement\Entities\Warehouse;
use Espo\Modules\WarehouseManagement\Entities\WarehouseItem;
use Espo\Modules\WarehouseManagement\Tools\Stock\Manager\DefaultStockManager;

class CreateGoodsIssue implements BeforeSave
{
    public function __construct(
        private readonly EntityManager $entityManager,
    ) {
    }

    /**
     * @throws BadRequest
     */
    public function beforeSave(Entity $entity, SaveOptions $options): void
    {
        if ($entity->get('processed') || is_null($entity->get('producedAmount')) || $entity->get('producedAmount') == 0) {
            return;
        }
        $productionOrderId = $entity->get('productionOrderId') ?? throw new LogicException();
        $productionOrder = $this->entityManager->getEntityById('ProductionOrder', $productionOrderId) ?? throw new LogicException();
        $producedAmount = $entity->get('producedAmount');


        $salesOderId = $productionOrder->get('salesOrderId');
        $entryKey = $productionOrder->get('entryKey');

        $productName = $productionOrder->get('productName') ?? throw new LogicException();

        $warehouse = $this->entityManager->getRDBRepository('Warehouse')
        ->where('name', $productName)
        ->findOne();
        $warehouseId = $warehouse->getId();
        $serialNumber = $warehouse->get('isSerialNumber');

        $stockLocation = $entity->get('stockLocation');
        if ($stockLocation == 'brno') {
            $resultStockAvailableQuantity = 'availableBrno';
        } else {
            $resultStockAvailableQuantity = 'availablePv';
        }
        $warehouseAvailable = $warehouse->get($resultStockAvailableQuantity);

        $productId = $productionOrder->get('productId');
        $product = $this->entityManager->getEntityById('Product', $productId);
        $productUnit = $product->get('unit');

        $singleUnits = ['km', 'hod', 'day', 'h'];
        $metricUnits = ['m', 'kg', 'g'];

        if (in_array($productUnit, $metricUnits) || $serialNumber == 0) {
            $warehouseItemsFirst = $this->entityManager->getRDBRepository('WarehouseItem')
                ->where('parentId', $warehouseId)
                ->findOne();

            if (!$warehouseItemsFirst) {
                $warehouseItemsFirst = $this->createWarehouseItem(
                    $productName,
                    $productId,
                    $warehouseId,
                    $warehouse,
                    $resultStockAvailableQuantity,
                );
            }

            $stockQuantity = $warehouseItemsFirst->get('quantity');
            $totalQuantity = $stockQuantity + $producedAmount;

            $warehouseItemsFirst->set(['quantity' => $totalQuantity,]);
            if (!$salesOderId) {
                $warehouse->set($resultStockAvailableQuantity, $warehouseAvailable + $producedAmount);
            }
            $warehouse->set('quantity', $totalQuantity);
            $warehouseItemsMId = $warehouseItemsFirst->getId();

            $WarehouseItemSalesOrder = $this->entityManager->getRDBRepository('Wiso')
                ->where('salesOrder1Id', $salesOderId)
                ->having('warehouseItem1Id', $warehouseItemsMId)
                ->findOne();

            if (!$WarehouseItemSalesOrder) {
                $WarehouseItemSalesOrder = $this->entityManager->createEntity('Wiso', [
                    'salesOrder1Id' => $salesOderId,
                    'warehouseItem1Id' => $warehouseItemsMId,
                    'entryKey' => $entryKey,
                    'stockLocation' => $stockLocation
                ]);
            }

            $soReservedQuantity = $WarehouseItemSalesOrder->get('quantity');

            if ($soReservedQuantity == 0) {
                $WarehouseItemSalesOrder->set('quantity', $producedAmount);
            } else {
                $totalSoQuantity = $soReservedQuantity + $producedAmount;
                $WarehouseItemSalesOrder->set('quantity', $totalSoQuantity);
            }

            $this->entityManager->saveEntity($WarehouseItemSalesOrder);
            $this->entityManager->saveEntity($warehouseItemsFirst);
            $this->entityManager->saveEntity($warehouse);

            $model = $this->entityManager->getRDBRepository('ProductionModel')
                ->where('name', $productName)
                ->findOne();
            if ($model) {
                $modelId = $model->getId();

                $items = $this->entityManager->getRDBRepository('ProductionModelItem')
                    ->where('parentId', $modelId)
                    ->find();

                if (count($items) > 0) {
                    $this->updateQuantityForModelItems($items, $resultStockAvailableQuantity, $producedAmount);
                }
            }

        } elseif (in_array($productUnit, $singleUnits)) {
            $warehouseItems = $this->entityManager->getRDBRepository('WarehouseItem')
                ->where('parentId', $warehouseId)
                ->findOne();

            if (!$warehouseItems) {
                $singleWarehouseItem = $this->createWarehouseItem(
                    $productName,
                    $productId,
                    $warehouseId,
                    $warehouse,
                    $resultStockAvailableQuantity,
                    9999
                );
            }
            if ($warehouseItems) {
                $itemId = $warehouseItems->getId();
            } else {
                $itemId = $singleWarehouseItem->getId();
            }
            if ($salesOderId) {
                $WarehouseItemSalesOrder = $this->entityManager->getRDBRepository('Wiso')
                    ->where('salesOrder1Id', $salesOderId)
                    ->having('warehouseItem1Id', $itemId)
                    ->findOne();

                if (!$WarehouseItemSalesOrder) {
                    $WarehouseItemSalesOrder = $this->entityManager->createEntity('Wiso', [
                        'salesOrder1Id' => $salesOderId,
                        'warehouseItem1Id' => $itemId,
                        'entryKey' => $entryKey
                    ]);
                }
                $soReservedQuantity = $WarehouseItemSalesOrder->get('quantity');
                if ($soReservedQuantity == 0) {
                    $WarehouseItemSalesOrder->set('quantity', $producedAmount);
                } else {
                    $totalSoQuantity = $soReservedQuantity + $producedAmount;
                    $WarehouseItemSalesOrder->set('quantity', $totalSoQuantity);
                }
                $this->entityManager->saveEntity($WarehouseItemSalesOrder);
            }
        } else {

            $i = 0;
            for ($i = 0; $i < $producedAmount; $i++) {

                $isReserved = 1;
                if (!$salesOderId) {
                    $isReserved = 0;
                }

                $warehouseItem = $this->entityManager->getNewEntity(WarehouseItem::ENTITY_TYPE);

                $warehouseItem->set([
                    'productId' => $productId,
                    'parentType' => Warehouse::ENTITY_TYPE,
                    'parentId' => $warehouse->getId(),
                    'isReserved' => $isReserved,
                    'salesOrderId' => $salesOderId,
                    'quantity' => 1,
                    'stockLocation' => $stockLocation
                ]);

                $this->entityManager->saveEntity($warehouseItem, [
                    DefaultStockManager::TRIGGERED_BY_STOCK_MANAGER => true,
                ]);
                $quantity = $warehouse->get('quantity');
                $availableQuantity = $warehouse->get($resultStockAvailableQuantity);
                if ($isReserved == 0) {
                    $warehouse->set([$resultStockAvailableQuantity => $availableQuantity + 1]);
                }

                $warehouse->set(['quantity' => $quantity + 1]);
                $this->entityManager->saveEntity($warehouse);



                $productionModel = $this->entityManager->getRDBRepository('ProductionModel')
                    ->where('name', $productName)
                    ->findOne();
                if ($productionModel) {
                    $productionModelId = $productionModel->getId();
                    $modelItems = $this->entityManager->getRDBRepository('ProductionModelItem')
                        ->where('parentId', $productionModelId)
                        ->find();
                } else {
                    continue;
                }

                if (count($modelItems) > 0) {
                    $this->updateQuantityForModelItems($modelItems, $resultStockAvailableQuantity);
                }
            }
        }
        $entity->set('processed', true);
    }

    public function createWarehouseItem(
        $productName,
        $productId,
        $warehouseId,
        $warehouse,
        $resultStockAvailableQuantity,
        $quantity = 0
    ): Entity
    {
        $warehouseItemsFirst = $this->entityManager->getNewEntity(WarehouseItem::ENTITY_TYPE);
        $warehouseItemsFirst->set([
            'serialNumber' => $productName,
            'productId' => $productId,
            'parentType' => Warehouse::ENTITY_TYPE,
            'parentId' => $warehouseId,
            'isReserved' => 0,
            'quantity' => $quantity,
        ]);
        $this->entityManager->saveEntity($warehouseItemsFirst);
        $warehouse->set([
            'quantity' => $quantity,
            $resultStockAvailableQuantity => $quantity
        ]);
        $this->entityManager->saveEntity($warehouse);
        return $warehouseItemsFirst;
    }

    /**
     * @throws BadRequest
     */
    public function updateQuantityForModelItems($modelItems, $resultStockAvailableQuantity, $producedAmount = 1): void
    {
        foreach ($modelItems as $item) {
            $itemName = $item->get('name');
            $itemQuantity = $item->get('quantity');

            $componentWarehouse = $this->entityManager->getRDBRepository('Warehouse')
                ->where('name', $itemName)
                ->findOne();

            $isSerialNumber = $componentWarehouse->get('isSerialNumber');
            $componentWarehouseId = $componentWarehouse->getId();
            $componentAvailableQuantity = $componentWarehouse->get($resultStockAvailableQuantity);

            $warehouseItemComponents = $this->entityManager->getRDBRepository('WarehouseItem')
                ->where('parentId', $componentWarehouseId)
                ->find();

            if (!$isSerialNumber) {
                $component = $warehouseItemComponents[0];
                $componentQuantity = $component->get('quantity');
                $totalProduced = $itemQuantity * $producedAmount;
                $resultComponentQuantity = $componentQuantity - $totalProduced;
                $component->set(['quantity' => $resultComponentQuantity]);
                $componentWarehouse->set($resultStockAvailableQuantity, $resultComponentQuantity);
                $this->entityManager->saveEntity($component);
                $this->entityManager->saveEntity($componentWarehouse);

            } elseif ($itemQuantity < 1) {
                $components = $this->entityManager->getRDBRepository('WarehouseItem')
                    ->where('parentId', $componentWarehouseId)
                    ->having('isReserved', 0)
                    ->order('serialNumber', 'ASC')
                    ->limit(2)
                    ->find();
                $firstComponent = $components[0];
                $secondComponent = $components[1];

                if ($firstComponent) {
                    $firstComponentQuantity = $firstComponent->get('quantity');
                    $resultQuantity = $firstComponentQuantity - $itemQuantity;

                    if ($resultQuantity > 0) {
                        $firstComponent->set('quantity', $resultQuantity);
                        $this->entityManager->saveEntity($firstComponent);

                        $resultAvailable = $componentAvailableQuantity - $itemQuantity;
                        $componentWarehouse->set($resultStockAvailableQuantity, $resultAvailable);
                        $this->entityManager->saveEntity($componentWarehouse);

                    } elseif ($resultQuantity == 0) {

                        $firstComponent->set('quantity', $resultQuantity);
                        $firstComponent->set('isReserved', 1);
                        $this->entityManager->saveEntity($firstComponent);

                        $resultAvailable = $componentAvailableQuantity - $itemQuantity;
                        $componentWarehouse->set($resultStockAvailableQuantity, $resultAvailable);
                        $this->entityManager->saveEntity($componentWarehouse);
                    } else {
                        if ($secondComponent) {
                            $secondComponentQuantity = $secondComponent->get('quantity');
                            $differentQuantity = $itemQuantity - $firstComponentQuantity;

                            $firstComponent->set('quantity', 0);
                            $firstComponent->set('isReserved', 1);
                            $this->entityManager->saveEntity($firstComponent);

                            $resultSecondComponentQuantity = $secondComponentQuantity - $differentQuantity;
                            $secondComponent->set('quantity', $resultSecondComponentQuantity);
                            $this->entityManager->saveEntity($secondComponent);

                            $resultAvailable = $componentAvailableQuantity - $itemQuantity;
                            $componentWarehouse->set($resultStockAvailableQuantity, $resultAvailable);
                            $this->entityManager->saveEntity($componentWarehouse);

                        } else {
                            throw new BadRequest(
                                "The amount of one of the components is not enough. Available 
                                    quantity: {$firstComponentQuantity}, Required quantity: {$itemQuantity}."
                            );
                        }
                    }
                } else {
                    throw new BadRequest("No components available, Required quantity: {$itemQuantity}");
                }
            } else {
                $components = $this->entityManager->getRDBRepository('WarehouseItem')
                    ->where('parentId', $componentWarehouseId)
                    ->having('isReserved', 0)
                    ->order('serialNumber', 'ASC')
                    ->find();

                if (count($components) > 0) {
                    $count = 0;
                    foreach ($components as $component) {
                        if ($count >= $itemQuantity) {
                            break;
                        }
                        $component->set(['isReserved' => 1]);
                        $this->entityManager->saveEntity($component);
                        $count++;
                    }
                    $resultAvailableQuantity = $componentAvailableQuantity - $itemQuantity;
                    $componentWarehouse->set($resultStockAvailableQuantity, $resultAvailableQuantity);
                    $this->entityManager->saveEntity($componentWarehouse);
                } else {
                    throw new BadRequest(
                        "There are not enough components. Available quantity: 
                            {$componentAvailableQuantity}, Required quantity: {$itemQuantity}"
                    );
                }
            }
        }
    }
}
