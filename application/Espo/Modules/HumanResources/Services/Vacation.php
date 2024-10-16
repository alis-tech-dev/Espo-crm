<?php

namespace Espo\Modules\HumanResources\Services;

use Espo\Core\Record\ReadParams;
use Espo\ORM\Query\Select;
use Espo\Modules\HumanResources\Entities\Vacation as VacationEntity;


class Vacation extends \Espo\Core\Templates\Services\Event
{
    public function getCalenderQuery(string $userId, string $from, string $to, bool $skipAcl): Select
    {
        $GLOBALS['log']->debug('Vacation::getCalenderQuery()');
        $builder = $this->selectBuilderFactory
            ->create()
            ->from(VacationEntity::ENTITY_TYPE);

        if (!$skipAcl) {
            $builder->withStrictAccessControl();
        }

        $seed = $this->entityManager->getNewEntity(VacationEntity::ENTITY_TYPE);

        $select = [
            ['"' . VacationEntity::ENTITY_TYPE . '"', 'scope'],
            'id',
            'name',
            ['dateStart', 'dateStart'],
            ['dateEnd', 'dateEnd'],
            ($seed->hasAttribute('status') ? ['status', 'status'] : ['null', 'status']),
            ($seed->hasAttribute('dateStartDate') ? ['dateStartDate', 'dateStartDate'] : ['null', 'dateStartDate']),
            ($seed->hasAttribute('dateEndDate') ? ['dateEndDate', 'dateEndDate'] : ['null', 'dateEndDate']),
            ($seed->hasAttribute('parentType') ? ['parentType', 'parentType'] : ['null', 'parentType']),
            ($seed->hasAttribute('parentId') ? ['parentId', 'parentId'] : ['null', 'parentId']),
            'createdAt',
        ];

        $additionalAttributeList = $this->metadata->get(
            ['app', 'calendar', 'additionalAttributeList']
        ) ?? [];

        foreach ($additionalAttributeList as $attribute) {
            $select[] = $seed->hasAttribute($attribute) ?
                [$attribute, $attribute] :
                ['null', $attribute];
        }


        $teamId = $this->config->get('humanResourceApprovalTeamId');

        $user = $this->recordServiceContainer->get('User')->read($userId, ReadParams::create());

        $teamIds = $user->get('teamsIds') ?? [];

        $orGroup = [
            'assignedUserId' => $userId,
        ];

        if ($seed->hasRelation('users')) {
            $orGroup['usersMiddle.userId'] = $userId;
        }

        if ($seed->hasRelation('assignedUsers')) {
            $orGroup['assignedUsersMiddle.userId'] = $userId;
        }

        if ($teamId && in_array($teamId, $teamIds) && $seed->hasRelation('teams')) {
            $orGroup['teamsMiddle.teamId'] = $teamId;
        }

        $queryBuilder = $builder
            ->buildQueryBuilder()
            ->select($select)
            ->where([
                'OR' => $orGroup,
                [
                    'OR' => [
                        [
                            'dateEnd' => null,
                            'dateStart>=' => $from,
                            'dateStart<' => $to,
                        ],
                        [
                            'dateStart>=' => $from,
                            'dateStart<' => $to,
                        ],
                        [
                            'dateEnd>=' => $from,
                            'dateEnd<' => $to,
                        ],
                        [
                            'dateStart<=' => $from,
                            'dateEnd>=' => $to,
                        ],
                        [
                            'dateEndDate!=' => null,
                            'dateEndDate>=' => $from,
                            'dateEndDate<' => $to,
                        ],
                    ],
                ],
            ]);

        if ($seed->hasRelation('users')) {
            $queryBuilder
                ->distinct()
                ->leftJoin('users');
        }

        if ($seed->hasRelation('assignedUsers')) {
            $queryBuilder
                ->distinct()
                ->leftJoin('assignedUsers');
        }

        if ($seed->hasRelation('teams')) {
            $queryBuilder
                ->distinct()
                ->leftJoin('teams');
        }

        return $queryBuilder->build();
    }
}
