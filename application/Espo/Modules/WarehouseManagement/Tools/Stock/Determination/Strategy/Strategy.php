<?php

namespace Espo\Modules\WarehouseManagement\Tools\Stock\Determination\Strategy;

use Espo\Modules\WarehouseManagement\Entities\Warehouse;
use Espo\Modules\WarehouseManagement\Entities\WarehouseItem;
use Espo\Modules\WarehouseManagement\Tools\Stock\InformationProvider\StockInformationProvider;
use Espo\ORM\EntityCollection;

abstract class Strategy
{
    public function __construct(
        protected readonly Warehouse $warehouse,
        protected readonly StockInformationProvider $informationProvider,
    ) {
    }

    /**
     * @param WarehouseItem $item
     *
     * @return EntityCollection<WarehouseItem>
     */
    abstract public function findItems(WarehouseItem $item): EntityCollection;
}
