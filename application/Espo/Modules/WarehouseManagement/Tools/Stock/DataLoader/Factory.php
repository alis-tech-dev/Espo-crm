<?php

namespace Espo\Modules\WarehouseManagement\Tools\Stock\DataLoader;

use Espo\Core\InjectableFactory;
use Espo\Core\Utils\Metadata;
use RuntimeException;

class Factory
{
    public function __construct(
        private readonly InjectableFactory $injectableFactory,
        private readonly Metadata $metadata
    ) {
    }

    public function create(string $type): StockDataLoader
    {
        $implementation = $this->getClassName($type);

        if (!class_exists($implementation)) {
            throw new RuntimeException("Class {$implementation} does not exist");
        }

        return $this->injectableFactory->create($implementation);
    }

    /**
     * @return class-string<StockDataLoader>
     */
    public function getClassName(string $type): string
    {
        return $this->metadata->get(['warehouseTypes', $type, 'stockInfoProviderClassName']) ?? DefaultStockDataLoader::class;
    }
}
