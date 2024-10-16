<?php

namespace Espo\Modules\Main\Classes\Stock\Managers;

use Espo\Modules\WarehouseManagement\Entities\Warehouse;
use Espo\Modules\WarehouseManagement\Entities\WarehouseItem;
use Espo\Modules\WarehouseManagement\Tools\Stock\Manager\DefaultStockManager;
use Espo\Core\Di;
use Exception;

class Simple extends DefaultStockManager implements Di\EntityManagerAware
{
    use Di\EntityManagerSetter;

    /**
     * @inheritDoc
     */
    public function addStock(WarehouseItem $item, array $options = []): void
    {
        $this->checkItemValidity($item, Self::DIRECTION_ADD);

        $quantity = $item->get('quantity');

        // There has to be a whole number of items
        // TODO: maybe this should be a part of checkItemValidity?
        if (floor($quantity) !== $quantity) {
            throw new Exception();
        }

//        for ($i = 0; $i < $quantity; $i++) {
//            /** @var WarehouseItem $warehouseItem */
//            $warehouseItem = $this->entityManager->getNewEntity(WarehouseItem::ENTITY_TYPE);
//
//            $warehouseItem->set([
//                'productId' => $item->get('productId'),
//                'parentType' => Warehouse::ENTITY_TYPE,
//                'parentId' => $this->warehouse->getId(),
//                'isReserved' => 1,
//                'quantity' => 1,
//
//            ]);
//
//            $this->entityManager->saveEntity($warehouseItem, [
//                self::TRIGGERED_BY_STOCK_MANAGER => true,
//            ]);
//        }
    }
}
