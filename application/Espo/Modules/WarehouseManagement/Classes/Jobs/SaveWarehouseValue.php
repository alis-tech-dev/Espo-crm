<?php

namespace Espo\Modules\WarehouseManagement\Classes\Jobs;

use Espo\Core\Exceptions\NotFound;
use Espo\Core\Job\JobDataLess;
use Espo\Core\Utils\Log;
use Espo\ORM\EntityManager;
use Espo\Core\Utils\Config;
use Espo\ORM\Query\Part\Condition;
use Espo\ORM\Query\Part\Expression;
use Espo\Modules\WarehouseManagement\Entities\Warehouse;
use Espo\ORM\Query\Part\Selection;
use Espo\Modules\WarehouseManagement\Classes\FieldProcessing\Warehouse\TotalValueLoader;
use Espo\Core\FieldProcessing\Loader\Params;
use Espo\Core\Field\Currency;
use Espo\Core\Currency\ConfigDataProvider as CurrencyConfigDataProvider;
use Espo\Modules\WarehouseManagement\Entities\WarehouseValueRecord;

class SaveWarehouseValue implements JobDataLess
{
    private const LOG_PREFIX = "[SaveWarehouseValue] ";

    public function __construct(
        private readonly EntityManager $entityManager,
        private readonly Log $log,
        private readonly Config $config,
        private readonly TotalValueLoader $totalValueLoader,
        private readonly CurrencyConfigDataProvider $currencyConfigDataProvider
    ) {
    }

    private function debug(string $message): void
    {
        $this->log->debug(self::LOG_PREFIX . $message);
    }

    public function run(): void
    {
        $this->debug("Started.");

        $warehouses = $this->getWarehouses();

        foreach($warehouses as $warehouse) {
            $this->saveWarehouseValue($warehouse);
        }        

        $this->debug("Finished.");
    }

    private function saveWarehouseValue(Warehouse $warehouse): void
    {
        $this->debug("Saving value for warehouse: {$warehouse->get("name")} ({$warehouse->getId()}");

        $value = Currency::create(
            $warehouse->get("totalValue"),
            $this->currencyConfigDataProvider->getBaseCurrency()
        );

        $warehouseValueRecord = $this->entityManager->createEntity(WarehouseValueRecord::ENTITY_TYPE);

        $warehouseValueRecord->set("warehouseId", $warehouse->getId());
        $warehouseValueRecord->setValueObject("value", $value);

        $this->entityManager->saveEntity($warehouseValueRecord);
    }

    private function getWarehouses()
    {
        $this->debug("Getting warehouses to save value for.");

        $warehouseIds = $this->config->get("warehouseListToSaveValueOfIds");
        
        if(empty($warehouseIds)) {
            throw new NotFound("No warehouse ids found in config.");
        }
        
        $warehouses = $this->entityManager
            ->getRDBRepositoryByClass(Warehouse::class)
            ->select(Selection::fromString("id"))
            ->where(Condition::in(Expression::column("id"), $warehouseIds))
            ->find();

        foreach($warehouses as $warehouse) {
            $this->totalValueLoader->process($warehouse, Params::create());
        }

        return $warehouses;
    }
}
