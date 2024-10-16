<?php

namespace Espo\Modules\WarehouseManagement\Tools\Stock\Hook\Interfaces;

use Espo\Modules\WarehouseManagement\Entities\Warehouse;

interface AfterAddStock
{
    public function afterAddStock(Warehouse $warehouse, array $options = [], array $hookData = []): void;
}
