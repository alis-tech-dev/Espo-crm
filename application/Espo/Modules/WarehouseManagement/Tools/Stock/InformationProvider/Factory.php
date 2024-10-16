<?php

namespace Espo\Modules\WarehouseManagement\Tools\Stock\InformationProvider;

use Espo\Core\InjectableFactory;
use Espo\Core\Utils\Metadata;
use RuntimeException;

class Factory
{
    public function __construct(
        private readonly Metadata $metadata,
        private readonly InjectableFactory $injectableFactory
    ) {
    }

    public function create(string $warehouseType): StockInformationProvider
    {
        if (!$warehouseType) {
            throw new RuntimeException("Stock Information Provider Factory: Warehouse type is not set");
        }

        return $this->injectableFactory->create($this->getClassName($warehouseType));
    }

    /**
     * @return class-string<StockInformationProvider>
     */
    public function getClassName(string $type): string
    {
        return $this->metadata->get(['warehouseTypes', $type, 'stockInformationProviderClassName']) ?? DefaultStockInformationProvider::class;
    }
}
