<?php

namespace Espo\Modules\WarehouseManagement\Tools\Stock\Determination;

use Espo\Modules\WarehouseManagement\Entities\Warehouse;
use Espo\Modules\WarehouseManagement\Entities\WarehouseItem;
use Espo\Modules\WarehouseManagement\Tools\Stock\Determination\Strategy\Factory as StrategyFactory;
use Espo\ORM\Collection;
use Espo\ORM\EntityCollection;

class DefaultStockDeterminationProcessor implements StockDeterminationProcessor
{
    public function __construct(
        private readonly StrategyFactory $strategyFactory,
    ) {
    }

    /**
     * @inheritDoc
     */
    public function findItems(Warehouse $warehouse, Collection $items): EntityCollection
    {
        $result = new EntityCollection([], WarehouseItem::ENTITY_TYPE);
        $strategy = $this->strategyFactory->create($warehouse);

        foreach ($items as $item) {
            $foundItems = $strategy->findItems($item);

            // Cannot use `merge` as it calls `getId` which causes error
            foreach ($foundItems as $foundItem) {
                $result->append($foundItem);
            }
        }

        return $result;
    }
}
