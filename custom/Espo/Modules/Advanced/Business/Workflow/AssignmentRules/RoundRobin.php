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

namespace Espo\Modules\Advanced\Business\Workflow\AssignmentRules;

use Espo\Entities\Team;
use Espo\Entities\User;
use Espo\ORM\Entity;
use Espo\ORM\EntityManager;
use Espo\Core\Exceptions\Error;
use Espo\Modules\Advanced\Entities\WorkflowRoundRobin;

class RoundRobin
{
    /** @var EntityManager */
    private $entityManager;
    /** @var string */
    private $entityType;
    /** @var string */
    private $actionId;
    /** @var string|null */
    private $workflowId;
    /** @var string|null */
    private $flowchartId;

    public function __construct(
        EntityManager $entityManager,
        string $entityType,
        string $actionId,
        ?string $workflowId = null,
        ?string $flowchartId = null
    ) {
        $this->entityManager = $entityManager;
        $this->entityType = $entityType;
        $this->actionId = $actionId;
        $this->workflowId = $workflowId;
        $this->flowchartId = $flowchartId;
    }

    /**
     * @return array<string, mixed>
     * @throws Error
     */
    public function getAssignmentAttributes(
        Entity $entity,
        string $targetTeamId,
        ?string $targetUserPosition,
        ?string $listReportId = null,
        ?array $whereClause = null
    ): array {

        $team = $this->entityManager->getEntityById(Team::ENTITY_TYPE, $targetTeamId);

        if (!$team) {
            throw new Error('RoundRobin: No team with id ' . $targetTeamId);
        }

        $where = [];

        if ($targetUserPosition) {
            $where['@relation.role'] = $targetUserPosition;
        }

        $userList = $this->entityManager
            ->getRDBRepository(Team::ENTITY_TYPE)
            ->getRelation($team, 'users')
            ->select('id')
            ->order('id')
            ->where($where)
            ->find();

        if (is_countable($userList) && count($userList) === 0) {
            throw new Error('RoundRobin: No users found in team ' . $targetTeamId);
        }

        $userIdList = [];

        foreach ($userList as $user) {
            $userIdList[] = $user->getId();
        }

        // @todo lock table ?

        $lastUserId = $this->getLastUserId();

        if ($lastUserId === null) {
            $num = 0;
        }
        else {
            $num = array_search($lastUserId, $userIdList);

            if ($num === false || $num == count($userIdList) - 1) {
                $num = 0;
            }
            else {
                $num++;
            }
        }

        $userId = $userIdList[$num];

        $this->storeLastUserId($userId);

        $attributes = ['assignedUserId' => $userId];

        if ($attributes['assignedUserId']) {
            /** @var ?User $user */
            $user = $this->entityManager->getEntityById(User::ENTITY_TYPE, $attributes['assignedUserId']);

            if ($user) {
                $attributes['assignedUserName'] = $user->getName();
            }
        }

        return $attributes;
    }

    private function getLastUserId(): ?string
    {
        $item = $this->entityManager
            ->getRDBRepository(WorkflowRoundRobin::ENTITY_TYPE)
            ->select(['lastUserId'])
            ->where([
                'actionId' => $this->actionId,
                'workflowId' => $this->workflowId,
                'flowchartId' => $this->flowchartId,
            ])
            ->findOne();

        if (!$item) {
            return null;
        }

        return $item->get('lastUserId');
    }

    private function storeLastUserId(string $userId): void
    {
        $item = $this->entityManager
            ->getRDBRepository(WorkflowRoundRobin::ENTITY_TYPE)
            ->select(['id', 'lastUserId'])
            ->where([
                'actionId' => $this->actionId,
                'workflowId' => $this->workflowId,
                'flowchartId' => $this->flowchartId,
            ])
            ->findOne();

        if (!$item) {
            $this->entityManager->createEntity(WorkflowRoundRobin::ENTITY_TYPE, [
                'actionId' => $this->actionId,
                'lastUserId' => $userId,
                'entityType' => $this->entityType,
                'workflowId' => $this->workflowId,
                'flowchartId' => $this->flowchartId,
            ]);

            return;
        }

        $item->set('lastUserId', $userId);

        $this->entityManager->saveEntity($item);
    }
}
