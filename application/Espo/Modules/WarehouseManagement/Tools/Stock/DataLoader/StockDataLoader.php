<?php

namespace Espo\Modules\WarehouseManagement\Tools\Stock\DataLoader;

use Espo\Modules\WarehouseManagement\Entities\WarehouseItem;

interface StockDataLoader
{
    public function loadWarehouseItemQuantities(WarehouseItem $item): void;
}
