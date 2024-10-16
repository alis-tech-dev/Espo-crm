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

namespace Espo\Modules\Advanced\Core\Workflow\Actions;

use Espo\ORM\Entity;
use Espo\Core\Exceptions\Error;
use stdClass;

class ApplyAssignmentRule extends BaseEntity
{
    protected function run(Entity $entity, stdClass $actionData): bool
    {
        $entityManager = $this->getEntityManager();

        $target = null;

        if (!empty($actionData->target)) {
            $target = $actionData->target;
        }

        if ($target === 'process') {
            $entity = $this->bpmnProcess;
        }
        else if (strpos($target, 'created:') === 0) {
            $entity = $this->getCreatedEntity($target);
        }

        if (!$entity) {
            return false;
        }

        if (!$entity->hasAttribute('assignedUserId') || !$entity->hasRelation('assignedUser')) {
            return false;
        }

        $reloadedEntity = $entityManager->getEntity($entity->getEntityType(), $entity->get('id'));

        if (empty($actionData->targetTeamId) || empty($actionData->assignmentRule)) {
            throw new Error('AssignmentRule: Not enough parameters.');
        }

        $targetTeamId = $actionData->targetTeamId;
        $assignmentRule = $actionData->assignmentRule;

        $targetUserPosition = null;

        if (!empty($actionData->targetUserPosition)) {
            $targetUserPosition = $actionData->targetUserPosition;
        }

        $listReportId = null;

        if (!empty($actionData->listReportId)) {
            $listReportId = $actionData->listReportId;
        }

        if (
            !in_array(
                $assignmentRule,
                $this->getMetadata()->get('entityDefs.Workflow.assignmentRuleList', [])
            )
        ) {
            throw new Error('AssignmentRule: ' . $assignmentRule . ' is not supported.');
        }

        // @todo Use factory and interface.

        $className = 'Espo\\Modules\\Advanced\\Business\\Workflow\\AssignmentRules\\' .
            str_replace('-', '', $assignmentRule);

        if (!class_exists($className)) {
            throw new Error('AssignmentRule: Class ' . $className . ' not found.');
        }

        $actionId = $this->getActionData()->id ?? null;

        if (!$actionId) {
            throw new Error("No action ID.");
        }

        $workflowId = $this->getWorkflowId();

        $flowchartId = null;

        if ($this->bpmnProcess) {
            $flowchartId = $this->bpmnProcess->get('flowchartId');

            $workflowId = null;
        }

        $rule = $this->injectableFactory->createWith($className, [
            'actionId' => $actionId,
            'workflowId' => $workflowId,
            'flowchartId' => $flowchartId,
            'entityType' => $entity->getEntityType(),
        ]);

        $attributes = $rule->getAssignmentAttributes($entity, $targetTeamId, $targetUserPosition, $listReportId);

        $entity->set($attributes);
        $reloadedEntity->set($attributes);

        $entityManager->saveEntity($reloadedEntity, [
            'skipWorkflow' => true,
            'noStream' => true,
            'noNotifications' => true,
            'skipModifiedBy' => true,
            'skipCreatedBy' => true,
        ]);

        return true;
    }
}
