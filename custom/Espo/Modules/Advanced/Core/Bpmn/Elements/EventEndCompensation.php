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

namespace Espo\Modules\Advanced\Core\Bpmn\Elements;

use Espo\Core\Exceptions\Error;
use Espo\Modules\Advanced\Entities\BpmnFlowNode;
use Espo\Modules\Advanced\Entities\BpmnProcess;

class EventEndCompensation extends Base
{
    public function process(): void
    {
        /** @var ?string $activityId */
        $activityId = $this->getAttributeValue('activityId');

        $process = $this->getProcess();

        if (
            $this->getProcess()->getParentProcessFlowNodeId() &&
            $this->getProcess()->getParentProcessId()
        ) {
            /** @var ?BpmnFlowNode $parentNode */
            $parentNode = $this->getEntityManager()
                ->getEntityById(BpmnFlowNode::ENTITY_TYPE, $this->getProcess()->getParentProcessFlowNodeId());

            if (!$parentNode) {
                throw new Error("No parent node.");
            }

            if ($parentNode->getElementType() === 'eventSubProcess') {
                /** @var ?BpmnProcess $process */
                $process = $this->getEntityManager()
                    ->getEntityById(BpmnProcess::ENTITY_TYPE, $this->getProcess()->getParentProcessId());

                if (!$process) {
                    throw new Error("No parent process.");
                }
            }
        }

        $compensationFlowNodeIdList = $this->getManager()->compensate($process, $activityId);

        $this->getFlowNode()->setDataItemValue('compensationFlowNodeIdList', $compensationFlowNodeIdList);
        $this->saveFlowNode();

        $this->refreshProcess();
        $this->refreshTarget();

        if ($compensationFlowNodeIdList === [] || $this->isCompensated()) {
            $this->setProcessed();
            $this->processAfterProcessed();

            return;
        }

        $this->getFlowNode()->set('status', BpmnFlowNode::STATUS_PENDING);
        $this->saveFlowNode();
    }

    protected function processAfterProcessed(): void
    {
        $this->endProcessFlow();
    }

    public function proceedPending(): void
    {
        if (!$this->isCompensated()) {
            return;
        }

        $this->setProcessed();
        $this->processAfterProcessed();
    }

    private function isCompensated(): bool
    {
        /** @var string[] $compensationFlowNodeIdList */
        $compensationFlowNodeIdList = $this->getFlowNode()->getDataItemValue('compensationFlowNodeIdList') ?? [];

        $flowNodes = $this->getEntityManager()
            ->getRDBRepository(BpmnFlowNode::ENTITY_TYPE)
            ->where(['id' => $compensationFlowNodeIdList])
            ->find();

        foreach ($flowNodes as $flowNode) {
            if ($flowNode->getStatus() === BpmnFlowNode::STATUS_PROCESSED) {
                continue;
            }

            return false;
        }

        return true;
    }
}
