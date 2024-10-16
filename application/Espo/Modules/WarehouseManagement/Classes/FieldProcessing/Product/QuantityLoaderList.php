<?php

namespace Espo\Modules\WarehouseManagement\Classes\FieldProcessing\Product;

use Espo\Core\FieldProcessing\{
    Loader\Params};
use Espo\ORM\{
    Entity};

class QuantityLoaderList extends QuantityLoader
{
    public function process(Entity $entity, Params $params): void
    {
        if (
            $params->hasInSelect('totalReservedQuantity')
            || $params->hasInSelect('totalWarehouseQuantity')
            || $params->hasInSelect('totalAvailableQuantity')
        ) {
            parent::process($entity, $params);
        }
    }
}
