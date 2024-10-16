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

use Espo\Core\Exceptions\Error;
use Espo\Core\Exceptions\Forbidden;
use Espo\Entities\Team;
use Espo\Entities\User;
use Espo\Modules\Advanced\Entities\Report;
use Espo\Modules\Advanced\Tools\Report\ReportHelper;
use Espo\Modules\Advanced\Tools\Report\Service;
use Espo\ORM\Entity;
use Espo\ORM\EntityManager;
use Espo\ORM\Query\SelectBuilder;

use PDO;

class LeastBusy
{
    /** @var EntityManager */
    private $entityManager;
    /** @var string */
    private $entityType;
    /** @var Service */
    private $reportService;
    /** @var ReportHelper */
    private $reportHelper;

    public function __construct(
        EntityManager $entityManager,
        Service $reportService,
        string $entityType,
        ReportHelper $reportHelper
    ) {
        $this->entityManager = $entityManager;
        $this->reportService = $reportService;
        $this->entityType = $entityType;
        $this->reportHelper = $reportHelper;
    }

    /**
     * @return array<string, mixed>
     * @throws Forbidden
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
            throw new Error("LeastBusy: No team $targetTeamId.");
        }

        $where = [];

        if ($targetUserPosition) {
            $where['@relation.role'] = $targetUserPosition;
        }

        $userList = $this->entityManager
            ->getRDBRepository(Team::ENTITY_TYPE)
            ->getRelation($team, 'users')
            ->select('id')
            ->order('userName')
            ->where($where)
            ->find();

        if (is_countable($userList) && count($userList) === 0) {
            throw new Error("LeastBusy: No users in team $targetTeamId.");
        }

        $userIdList = [];

        foreach ($userList as $user) {
            $userIdList[] = $user->getId();
        }

        $counts = [];

        foreach ($userIdList as $id) {
            $counts[$id] = 0;
        }

        $selectBuilder = SelectBuilder::create()->from($this->entityType);

        if ($listReportId) {
            /** @var ?Report $report */
            $report = $this->entityManager->getEntityById(Report::ENTITY_TYPE, $listReportId);

            if (!$report) {
                throw new Error("No report $listReportId.");
            }

            $this->reportHelper->checkReportCanBeRunToRun($report);

            $selectBuilder = $this->reportService->prepareSelectBuilder($report);
        }

        $selectBuilder
            ->where([
                'assignedUserId' => $userIdList,
                'id!=' => $entity->hasId() ? $entity->getId() : null,
            ])
            ->group('assignedUserId')
            ->select([
                'assignedUserId',
                ['COUNT:(id)', 'COUNT:id'],
            ])
            ->order([])
            ->order('assignedUserId')
            ->leftJoin('assignedUser', 'assignedUserAssignedRule')
            ->where(['assignedUserAssignedRule.isActive' => true]);

        if ($whereClause) {
            $selectBuilder->where($whereClause);
        }

        $sth = $this->entityManager
            ->getQueryExecutor()
            ->execute($selectBuilder->build());

        $rowList = $sth->fetchAll(PDO::FETCH_ASSOC);

        foreach ($rowList as $row) {
            $id = $row['assignedUserId'];

            if (!$id) {
                continue;
            }

            $counts[$id] = $row['COUNT:id'];
        }

        $minCount = min(array_values($counts));
        $minCountIdList = [];

        foreach ($counts as $id => $count) {
            if ($count === $minCount) {
                $minCountIdList[] = $id;
            }
        }

        $attributes = [];

        if (!count($minCountIdList)) {
            return $attributes;
        }

        $attributes['assignedUserId'] = $minCountIdList[array_rand($minCountIdList)];

        /** @var ?User $user */
        $user = $this->entityManager->getEntityById(User::ENTITY_TYPE, $attributes['assignedUserId']);

        if ($user) {
            $attributes['assignedUserName'] = $user->getName();
        }

        return $attributes;
    }
}
