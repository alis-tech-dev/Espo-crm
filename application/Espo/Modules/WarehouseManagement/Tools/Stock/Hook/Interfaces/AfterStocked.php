<?php

namespace Espo\Modules\WarehouseManagement\Tools\Stock\Hook\Interfaces;

use Espo\Modules\ProductBase\Entities\Product;

interface AfterStocked
{
    public function afterStocked(Product $product, array $options = [], array $hookData = []): void;
}
