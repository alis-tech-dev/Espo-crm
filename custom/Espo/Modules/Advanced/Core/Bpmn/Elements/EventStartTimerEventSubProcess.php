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

use Espo\Modules\Advanced\Entities\BpmnFlowNode;
use Espo\ORM\Entity;

class EventStartTimerEventSubProcess extends EventIntermediateTimerCatch
{
    protected $pendingStatus = BpmnFlowNode::STATUS_STANDBY;

    protected function getConditionsTarget(): ?Entity
    {
        return $this->getSpecificTarget($this->getFlowNode()->getDataItemValue('subProcessTarget'));
    }

    /**
     * @param string|bool|null $divergentFlowNodeId
     */
    protected function processNextElement(
        ?string $nextElementId = null,
        $divergentFlowNodeId = false,
        bool $dontSetProcessed = false
    ): ?BpmnFlowNode {

        return parent::processNextElement($this->getFlowNode()->getDataItemValue('subProcessElementId'));
    }

    public function proceedPending(): void
    {
        $flowNode = $this->getFlowNode();
        $flowNode->set('status', BpmnFlowNode::STATUS_IN_PROCESS);
        $this->getEntityManager()->saveEntity($flowNode);

        $subProcessIsInterrupting = $this->getFlowNode()->getDataItemValue('subProcessIsInterrupting');

        if (!$subProcessIsInterrupting) {
            $standbyFlowNode = $this->getManager()->prepareStandbyFlow(
                $this->getTarget(),
                $this->getProcess(),
                $this->getFlowNode()->getDataItemValue('subProcessElementId')
            );

            if ($standbyFlowNode) {
                $this->getManager()->processPreparedFlowNode(
                    $this->getTarget(),
                    $standbyFlowNode,
                    $this->getProcess()
                );
            }
        }

        if ($subProcessIsInterrupting) {
            $this->getManager()->interruptProcessByEventSubProcess($this->getProcess(), $this->getFlowNode());
        }

        $this->processNextElement();
    }
}
