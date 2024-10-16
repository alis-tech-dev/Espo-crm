<?php

namespace Espo\Modules\Main\Classes\Stock\Managers;

use Espo\Modules\WarehouseManagement\Classes\Stock\Managers\Positional as StockManagerPositional;
use Espo\Modules\WarehouseManagement\Entities\Warehouse;
use Espo\Modules\WarehouseManagement\Entities\WarehouseItem;
use Exception;

class Positional extends StockManagerPositional
{
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
//                'positionId' => $item->get('positionToId'),
//                'parentType' => Warehouse::ENTITY_TYPE,
//                'parentId' => $this->warehouse->getId(),
//                'quantity' => 1,
//            ]);
//
//            $this->entityManager->saveEntity($warehouseItem, [
//                self::TRIGGERED_BY_STOCK_MANAGER => true,
//            ]);
//        }
    }
}
