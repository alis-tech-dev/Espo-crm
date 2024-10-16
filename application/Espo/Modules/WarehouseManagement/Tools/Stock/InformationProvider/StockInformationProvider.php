<?php

namespace Espo\Modules\WarehouseManagement\Tools\Stock\InformationProvider;

use Espo\Modules\WarehouseManagement\Entities\WarehouseItem;
use Espo\ORM\Query\Select;

interface StockInformationProvider
{
    /**
     * @return array<string, string>
     */
    public function getItemAttributeMappingForAdd(): array;

    /**
     * @return array<string, string>
     */
    public function getItemAttributeMappingForRemove(): array;

    /**
     * @return array<string, mixed>
     */
    public function getItemIdentificationDataForAdd(WarehouseItem $item): array;

    /**
     * @return array<string, mixed>
     */
    public function getItemIdentificationDataForRemove(WarehouseItem $item): array;

    public function getItemIdentificationQueryForAdd(WarehouseItem $item): Select;

    public function getItemIdentificationQueryForRemove(WarehouseItem $item): Select;
}
