<?php

namespace Espo\Modules\WarehouseManagement\Hooks\Product;

use Espo\Core\Utils\Config;
use Espo\Modules\ProductBase\Entities\Product;
use Espo\Modules\WarehouseManagement\Tools\Product\PriceLoader as PriceLoaderTool;
use Espo\Modules\WarehouseManagement\Tools\Stock\Hook\Interfaces\{
    AfterStocked,
    AfterUnstocked};
use Espo\ORM\EntityManager;

class UpdateCostPrice implements AfterStocked, AfterUnstocked
{
    public function __construct(
        private readonly PriceLoaderTool $priceLoaderTool,
        private readonly EntityManager $entityManager,
        private readonly Config $config,
    ) {
    }

    public function afterStocked(Product $product, array $options = [], array $hookData = []): void
    {
        $this->copyCostPrice($product);
    }

    public function afterUnstocked(Product $product, array $options = [], array $hookData = []): void
    {
        $this->copyCostPrice($product);
    }

    private function copyCostPrice(Product $product): void
    {
        if (!$this->config->get('updateProductCostPriceWithAveragePrice')) {
            return;
        }

        $averagePrice = $this->priceLoaderTool->getAveragePrice($product);

        $product->setCostPrice($averagePrice);

        $this->entityManager->saveEntity($product);
    }
}
