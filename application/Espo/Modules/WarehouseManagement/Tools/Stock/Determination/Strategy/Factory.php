<?php

namespace Espo\Modules\WarehouseManagement\Tools\Stock\Determination\Strategy;

use Espo\Core\Binding\BindingContainerBuilder;
use Espo\Core\InjectableFactory;
use Espo\Core\Utils\Metadata;
use Espo\Modules\WarehouseManagement\Entities\Warehouse as WarehouseEntity;
use Espo\Modules\WarehouseManagement\Tools\Stock\InformationProvider\Factory as StockInformationProviderFactory;
use Espo\Modules\WarehouseManagement\Tools\Stock\InformationProvider\StockInformationProvider;

class Factory
{
    public function __construct(
        private readonly Metadata $metadata,
        private readonly InjectableFactory $injectableFactory,
        private readonly StockInformationProviderFactory $informationProviderFactory,
    ) {
    }

    public function create(WarehouseEntity $warehouse): Strategy
    {
        $helper = $this->informationProviderFactory->getClassName($warehouse->getType());

        $binding = BindingContainerBuilder::create()
            ->bindInstance(WarehouseEntity::class, $warehouse)
            ->bindImplementation(StockInformationProvider::class, $helper)
            ->build();

        return $this->injectableFactory->createWithBinding($this->getClassName(), $binding);
    }

    /**
     * @return class-string<Strategy>
     */
    public function getClassName(): string
    {
        // TODO: Needs more abstraction. Perhaps, different processor per warehouse, although it's still not clear to me
        return $this->metadata->get(['app', 'stockDefs', 'stockDeterminationDefaultStrategy']) ?? DefaultStrategy::class;
    }
}
