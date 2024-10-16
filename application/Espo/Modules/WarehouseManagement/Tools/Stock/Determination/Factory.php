<?php

namespace Espo\Modules\WarehouseManagement\Tools\Stock\Determination;

use Espo\Core\InjectableFactory;
use Espo\Core\Utils\Metadata;

class Factory
{
    public function __construct(
        private readonly Metadata $metadata,
        private readonly InjectableFactory $injectableFactory
    ) {
    }

    public function create(): StockDeterminationProcessor
    {
        return $this->injectableFactory->create($this->getClassName());
    }

    /**
     * @return class-string<StockDeterminationProcessor>
     */
    public function getClassName(): string
    {
        // TODO: Needs more abstraction. Perhaps, different processor per warehouse, although its still not clear to me
        return $this->metadata->get(['app', 'stockDefs', 'stockDeterminationProcessorClassName']) ?? DefaultStockDeterminationProcessor::class;
    }
}
