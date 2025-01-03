<?php
/************************************************************************
 * This file is part of EspoCRM.
 *
 * EspoCRM - Open Source CRM application.
 * Copyright (C) 2014-2021 Yurii Kuznietsov, Taras Machyshyn, Oleksii Avramenko
 * Website: https://www.espocrm.com
 *
 * EspoCRM is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * EspoCRM is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with EspoCRM. If not, see http://www.gnu.org/licenses/.
 *
 * The interactive user interfaces in modified source and object code versions
 * of this program must display Appropriate Legal Notices, as required under
 * Section 5 of the GNU General Public License version 3.
 *
 * In accordance with Section 7(b) of the GNU General Public License version 3,
 * these Appropriate Legal Notices must retain the display of the "EspoCRM" word.
 ************************************************************************/

namespace Espo\Core\Select\Appliers;

use Espo\Core\{
    Exceptions\Error,
    Select\SelectManager,
    Select\Factory\BoolFilterFactory,
};

use Espo\{
    ORM\QueryParams\SelectBuilder as QueryBuilder,
    ORM\QueryParams\Parts\Where\OrGroup,
    ORM\QueryParams\Parts\WhereClause,
    Entities\User,
};

class BoolFilterListApplier
{
    protected $entityType;
    protected $user;
    protected $selectManager;
    protected $boolFilterFactory;

    public function __construct(
        string $entityType, User $user, BoolFilterFactory $boolFilterFactory, SelectManager $selectManager
    ) {
        $this->entityType = $entityType;
        $this->user = $user;
        $this->boolFilterFactory = $boolFilterFactory;
        $this->selectManager = $selectManager;
    }

    public function apply(QueryBuilder $queryBuilder, array $boolFilterNameList) : void
    {
        $orGroup = new OrGroup();

        foreach ($boolFilterNameList as $filterName) {
            $itemWhereClause = $this->applyBoolFilter($queryBuilder, $filterName);

            $orGroup->add($itemWhereClause);
        }

        $whereClause = new WhereClause();

        $whereClause->add($orGroup);

        $queryBuilder->where(
            $whereClause->getRaw()
        );
    }

    protected function applyBoolFilter(QueryBuilder $queryBuilder, string $filterName) : WhereClause
    {
        if ($this->boolFilterFactory->has($this->entityType, $filterName)) {
            $filter = $this->boolFilterFactory->create($this->entityType, $this->user, $filterName);

            return $filter->apply($queryBuilder);
        }

        // For backward compatibility.
        if ($this->selectManager->hasBoolFilter($filterName)) {
            $rawWhereClause = $this->selectManager->applyBoolFilterToQueryBuilder($queryBuilder, $filterName);

            return WhereClause::fromRaw($rawWhereClause);
        }

        throw new Error("No bool filter '{$filterName}' for '{this->entityType}'.");
    }
}
