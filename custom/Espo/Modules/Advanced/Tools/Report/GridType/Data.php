<?php
/*********************************************************************************
 * The contents of this file are subject to the EspoCRM Advanced Pack
 * Agreement ("License") which can be viewed at
 * https://www.espocrm.com/advanced-pack-agreement.
 * By installing or using this file, You have unconditionally agreed to the
 * terms and conditions of the License, and You may not use this file except in
 * compliance with the License.  Under the terms of the license, You shall not,
 * sublicense, resell, rent, lease, distribute, or otherwise  transfer rights
 * or usage to the software.
 *
 * Copyright (C) 2015-2023 Letrium Ltd.
 *
 * License ID: 9e71abacf6ac199ee59911e8bc81aa87
 ***********************************************************************************/

namespace Espo\Modules\Advanced\Tools\Report\GridType;

use Espo\Core\Select\Where\Item as WhereItem;
use stdClass;

class Data
{
    private string $entityType;
    private ?string $success;
    /** @var string[] */
    private array $columns;
    /** @var string[] */
    private array $groupBy;
    /** @var string[] */
    private array $orderBy;
    private bool $applyAcl;
    private ?WhereItem $filtersWhere;
    private ?string $chartType;
    /** @var ?array<string, string> */
    private ?array $chartColors;
    private ?string $chartColor;
    /** @var ?stdClass[] */
    private ?array $chartDataList;
    /** @var string[] */
    private array $aggregatedColumns = [];

    /**
     * @param string[] $columns
     * @param string[] $groupBy
     * @param string[] $orderBy
     * @param ?string[] $chartColors
     * @param ?stdClass[] $chartDataList
     */
    public function __construct(
        string $entityType,
        array $columns,
        array $groupBy,
        array $orderBy,
        bool $applyAcl,
        ?WhereItem $filtersWhere,
        ?string $chartType,
        ?array $chartColors,
        ?string $chartColor,
        ?array $chartDataList,
        ?string $success
    ) {
        $this->entityType = $entityType;
        $this->columns = $columns;
        $this->groupBy = $groupBy;
        $this->orderBy = $orderBy;
        $this->applyAcl = $applyAcl;
        $this->filtersWhere = $filtersWhere;
        $this->chartType = $chartType;
        $this->chartColors = $chartColors;
        $this->chartColor = $chartColor;
        $this->chartDataList = $chartDataList;
        $this->success = $success;
    }

    public function getEntityType(): string
    {
        return $this->entityType;
    }

    public function getSuccess(): ?string
    {
        return $this->success;
    }

    /**
     * @return string[]
     */
    public function getOrderBy(): array
    {
        return $this->orderBy;
    }

    /**
     * @return string[]
     */
    public function getColumns(): array
    {
        return $this->columns;
    }

    /**
     * @return string[]
     */
    public function getGroupBy(): array
    {
        return $this->groupBy;
    }

    public function applyAcl(): bool
    {
        return $this->applyAcl;
    }

    public function getFiltersWhere(): ?WhereItem
    {
        return $this->filtersWhere;
    }

    public function getChartType(): ?string
    {
        return $this->chartType;
    }

    /**
     * @return ?string[]
     */
    public function getChartColors(): ?array
    {
        return $this->chartColors;
    }

    public function getChartColor(): ?string
    {
        return $this->chartColor;
    }

    /**
     * @return ?stdClass[]
     */
    public function getChartDataList(): ?array
    {
        return $this->chartDataList;
    }

    /**
     * @return string[]
     */
    public function getAggregatedColumns(): array
    {
        return $this->aggregatedColumns;
    }

    /**
     * @param string[] $aggregatedColumns
     */
    public function withAggregatedColumns(array $aggregatedColumns): self
    {
        $obj = clone $this;
        $obj->aggregatedColumns = $aggregatedColumns;

        return $obj;
    }
}
