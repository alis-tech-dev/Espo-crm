<?php

namespace Espo\Modules\Autocrm\Tools\Aggregation;

use Espo\ORM\Query\SelectBuilder;

interface AggregationFunction
{
    public function aggregate(string $name, string $function, string $field, SelectBuilder $queryBuilder): void;
}
