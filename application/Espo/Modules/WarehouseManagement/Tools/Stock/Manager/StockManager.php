<?php

namespace Espo\Modules\WarehouseManagement\Tools\Stock\Manager;

use Espo\Core\Exceptions\Error;
use Espo\Modules\WarehouseManagement\Entities\{
    Warehouse,
    WarehouseItem};
use Espo\Modules\WarehouseManagement\Tools\Stock\{
    InformationProvider\StockInformationProvider};

abstract class StockManager
{
    public const TRIGGERED_BY_STOCK_MANAGER = 'triggeredByStockManager';

    public function __construct(
        protected readonly Warehouse $warehouse,
        protected readonly StockInformationProvider $informationProvider,
    ) {
    }

    /**
     * @param WarehouseItem $item    The item to add
     * @param array         $options Additional options
     *
     * @return void
     * @throws Error
     *
     */
    abstract public function addStock(WarehouseItem $item, array $options = []): void;

    /**
     * @param WarehouseItem $item    The item to remove
     * @param array         $options Additional options
     *
     * @return void
     * @throws Error
     *
     */
    abstract public function removeStock(WarehouseItem $item, array $options = []): void;
}
