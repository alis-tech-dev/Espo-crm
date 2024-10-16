<?php

namespace Espo\Modules\WarehouseManagement\Tools\Product\StockInfo;

use Espo\ORM\{
    Entity,
    EntityCollection,
};
use stdClass;

class Result
{
    public function __construct(
        /** @var EntityCollection<Entity> */
        private readonly EntityCollection $collection,
        private readonly int $total,
        private readonly stdClass $data
    ) {
    }

    /**
     * @return EntityCollection<Entity>
     */
    public function getCollection(): EntityCollection
    {
        return $this->collection;
    }

    public function getTotal(): int
    {
        return $this->total;
    }

    public function getData(): stdClass
    {
        return $this->data;
    }
}
