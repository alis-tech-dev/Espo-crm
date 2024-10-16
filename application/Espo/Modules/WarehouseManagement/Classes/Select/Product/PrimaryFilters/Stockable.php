<?php

namespace Espo\Modules\WarehouseManagement\Classes\Select\Product\PrimaryFilters;

use Espo\Core\Select\Primary\Filter as PrimaryFilter;
use Espo\Core\Utils\Metadata;
use Espo\ORM\Query\SelectBuilder as QueryBuilder;

class Stockable implements PrimaryFilter
{
    public function __construct(
        private readonly Metadata $metadata
    ) {
    }

    public function apply(QueryBuilder $queryBuilder): void
    {
        $stockableTypes = $this->metadata->get(['entityDefs', 'Product', 'fields', 'type', 'stockableTypes'], []);

        $queryBuilder->where('type', $stockableTypes);
    }
}
