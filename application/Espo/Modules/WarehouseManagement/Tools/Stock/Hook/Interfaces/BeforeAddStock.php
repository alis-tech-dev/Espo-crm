<?php

namespace Espo\Modules\WarehouseManagement\Tools\Stock\Hook\Interfaces;

use Espo\Modules\WarehouseManagement\Entities\Warehouse;

interface BeforeAddStock
{
    public function beforeAddStock(Warehouse $warehouse, array $options = [], array $hookData = []): void;
}
