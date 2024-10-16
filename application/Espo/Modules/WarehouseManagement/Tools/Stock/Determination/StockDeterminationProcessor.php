<?php

namespace Espo\Modules\WarehouseManagement\Tools\Stock\Determination;

use Espo\Modules\WarehouseManagement\Entities\Warehouse;
use Espo\Modules\WarehouseManagement\Entities\WarehouseItem;
use Espo\ORM\Collection;
use Espo\ORM\EntityCollection;

interface StockDeterminationProcessor
{
    /**
     * @param Warehouse                 $warehouse
     * @param Collection<WarehouseItem> $items
     *
     * @return EntityCollection<WarehouseItem>
     */
    public function findItems(Warehouse $warehouse, Collection $items): EntityCollection;
}
