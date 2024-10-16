<?php
/*********************************************************************************
 * The contents of this file are subject to the EspoCRM Sales Pack
 * Agreement ("License") which can be viewed at
 * https://www.espocrm.com/sales-pack-agreement.
 * By installing or using this file, You have unconditionally agreed to the
 * terms and conditions of the License, and You may not use this file except in
 * compliance with the License.  Under the terms of the license, You shall not,
 * sublicense, resell, rent, lease, distribute, or otherwise  transfer rights
 * or usage to the software.
 * 
 * Copyright (C) 2015-2020 Letrium Ltd.
 * 
 * License ID: ab90ca3eab7c48e8ae6409bc1af8bf16
 ***********************************************************************************/

namespace Espo\Modules\Sales\SelectManagers;

class UseCaseItem extends \Espo\Core\SelectManagers\Base
{
    protected $parentTable = 'useCase';

    protected $parentEntityType = 'UseCase';

    protected $parentIdAttribute = 'useCaseId';

    protected $parentLink = 'useCase';

    protected function accessOnlyOwn(&$result)
    {
        $this->addJoin([
            $this->parentLink,
            $this->parentLink . 'Access',
        ], $result);

        $result['whereClause'][] = [
            $this->parentLink . 'Access.assignedUserId' => $this->getUser()->id
        ];
    }

    protected function accessOnlyTeam(&$result)
    {
        $teamIdList = $this->user->getLinkMultipleIdList('teams');
        if (empty($teamIdList)) {
            $this->accessOnlyOwn($result);
            return;
        }
        $arr = [];

        $parentAlias = $this->parentLink . 'Access';

        $this->addJoin([
            $this->parentLink,
            $parentAlias,
        ], $result);

        $this->addJoin([
            'EntityTeam',
            'teamsAccess',
            [
                'entityId:' => $parentAlias . '.id',
                'entityType' => $this->parentEntityType,
                'deleted' => 0,
            ]
        ], $result);

        $result['whereClause'][] = [
            'OR' => [
                $parentAlias . '.assignedUserId' => $this->getUser()->id,
                'teamsAccess.teamId' => $teamIdList,
            ]
        ];

        $this->setDistinct(true, $result);
    }

    protected function accessPortalOnlyOwn(&$result)
    {
        $result['whereClause'][] = [
            'id' => null
        ];
    }

    protected function accessPortalOnlyContact(&$result)
    {
        $result['whereClause'][] = [
            'id' => null
        ];
    }

    protected function accessPortalOnlyAccount(&$result)
    {
        $result['whereClause'][] = [
            'id' => null
        ];
    }
}
