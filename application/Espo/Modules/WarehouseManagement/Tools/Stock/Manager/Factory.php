<?php

namespace Espo\Modules\WarehouseManagement\Tools\Stock\Manager;

use Espo\Core\Binding\BindingContainerBuilder;
use Espo\Core\InjectableFactory;
use Espo\Core\Utils\Metadata;
use Espo\Modules\WarehouseManagement\Entities\Warehouse as WarehouseEntity;
use Espo\Modules\WarehouseManagement\Tools\Stock\InformationProvider\{
    Factory as StockInformationProviderFactory,
    StockInformationProvider
};
use RuntimeException;

class Factory
{
    public function __construct(
        private readonly Metadata $metadata,
        private readonly InjectableFactory $injectableFactory,
        private readonly StockInformationProviderFactory $informationProviderFactory,
    ) {
    }

    public function create(WarehouseEntity $warehouse): StockManager
    {
        $warehouseType = $warehouse->getType();

        if (!$warehouseType) {
            throw new RuntimeException("Stock Manager Factory: Warehouse type is not set");
        }

        $className = $this->getClassName($warehouseType);

        $helper = $this->informationProviderFactory->getClassName($warehouseType);

        $binding = BindingContainerBuilder::create()
            ->bindInstance(WarehouseEntity::class, $warehouse)
            ->bindImplementation(StockInformationProvider::class, $helper)
            ->build();

        return $this->injectableFactory->createWithBinding($className, $binding);
    }

    /**
     * @return class-string<StockManager>
     */
    private function getClassName(string $type): string
    {
        return $this->metadata->get(['warehouseTypes', $type, 'stockManagerClassName']) ?? DefaultStockManager::class;
    }
}
