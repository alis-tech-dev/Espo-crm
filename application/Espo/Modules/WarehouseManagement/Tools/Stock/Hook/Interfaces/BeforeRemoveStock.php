<?php

namespace Espo\Modules\WarehouseManagement\Tools\Stock\Hook\Interfaces;

use Espo\Modules\WarehouseManagement\Entities\Warehouse;

interface BeforeRemoveStock
{
    public function beforeRemoveStock(Warehouse $warehouse, array $options = [], array $hookData = []): void;
}
