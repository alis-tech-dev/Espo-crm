<?php

namespace Espo\Modules\WarehouseManagement\Classes\FieldProcessing\Product;

use Espo\Core\FieldProcessing\{
    Loader,
    Loader\Params};
use Espo\Modules\ProductBase\Entities\Product;
use Espo\Modules\WarehouseManagement\Tools\Product\PriceLoader as PriceLoaderTool;
use Espo\ORM\{
    Entity};

class PriceLoader implements Loader
{
    public function __construct(
        private readonly PriceLoaderTool $priceLoaderTool,
    ) {
    }

    public function process(Entity $entity, Params $params): void
    {
        if (!$entity instanceof Product) {
            return;
        }

        $entity->setValueObject('averagePrice', $this->priceLoaderTool->getAveragePrice($entity));
        $entity->setValueObject('totalPrice', $this->priceLoaderTool->getTotalPrice($entity));
    }
}
