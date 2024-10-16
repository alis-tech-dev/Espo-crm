<?php

namespace Espo\Modules\WarehouseManagement\Tools\Stock\Hook\Interfaces;

use Espo\Modules\ProductBase\Entities\Product;

interface AfterUnstocked
{
    public function afterUnstocked(Product $product, array $options = [], array $hookData = []): void;
}
