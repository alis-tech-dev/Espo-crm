<?php

namespace Espo\Modules\WarehouseManagement\Tools\Stock\Hook\Interfaces;

use Espo\Modules\WarehouseManagement\Entities\Warehouse;

interface AfterRemoveStock
{
    public function afterRemoveStock(Warehouse $warehouse, array $options = [], array $hookData = []): void;
}
