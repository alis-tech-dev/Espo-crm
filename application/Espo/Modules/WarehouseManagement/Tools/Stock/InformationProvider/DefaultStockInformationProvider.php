<?php

namespace Espo\Modules\WarehouseManagement\Tools\Stock\InformationProvider;

use Espo\Core\Exceptions\BadRequest;
use Espo\Core\Exceptions\Error;
use Espo\Core\Exceptions\Forbidden;
use Espo\Modules\WarehouseManagement\Entities\WarehouseItem;
use Espo\Modules\WarehouseManagement\Tools\Stock\StockHelper;
use Espo\ORM\Query\Select;

class DefaultStockInformationProvider implements StockInformationProvider
{

    public function __construct(
        private readonly StockHelper $stockHelper,
    ) {
    }

    /**
     * @return array<string, string>
     */
    private function getItemAttributesMapping(): array
    {
        $attributes = $this->stockHelper->getGroupByAttributes();

        return array_combine($attributes, $attributes);
    }

    /**
     * @inheritDoc
     */
    public function getItemAttributeMappingForAdd(): array
    {
        return $this->getItemAttributesMapping();
    }

    /**
     * @inheritDoc
     */
    public function getItemAttributeMappingForRemove(): array
    {
        return $this->getItemAttributesMapping();
    }

    public function getItemIdentificationDataForAdd(WarehouseItem $item): array
    {
        $data = [];

        foreach ($this->getItemAttributeMappingForAdd() as $to => $from) {
            $data[$to] = $item->get($from);
        }

        return $data;
    }

    public function getItemIdentificationDataForRemove(WarehouseItem $item): array
    {
        $data = [];

        foreach ($this->getItemAttributeMappingForRemove() as $to => $from) {
            $data[$to] = $item->get($from);
        }

        return $data;
    }

    /**
     * @throws BadRequest
     * @throws Forbidden
     * @throws Error
     */
    public function getItemIdentificationQueryForAdd(WarehouseItem $item): Select
    {
        $data = $this->getItemIdentificationDataForAdd($item);

        return $this->stockHelper->buildIdentificationQueryFromData($data);
    }

    /**
     * @throws BadRequest
     * @throws Forbidden
     * @throws Error
     */
    public function getItemIdentificationQueryForRemove(WarehouseItem $item): Select
    {
        $data = $this->getItemIdentificationDataForRemove($item);

        return $this->stockHelper->buildIdentificationQueryFromData($data);
    }
}
