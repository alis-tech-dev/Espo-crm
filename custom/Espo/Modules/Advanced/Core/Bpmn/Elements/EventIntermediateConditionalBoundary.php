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

class EventIntermediateConditionalBoundary extends EventIntermediateConditionalCatch
{
    public function process(): void
    {
        $result = $this->getConditionManager()->check(
            $this->getTarget(),
            $this->getAttributeValue('conditionsAll'),
            $this->getAttributeValue('conditionsAny'),
            $this->getAttributeValue('conditionsFormula'),
            $this->getVariablesForFormula()
        );

        if ($result) {
            if ($this->getAttributeValue('cancelActivity')) {
                $this->getManager()->cancelActivityByBoundaryEvent($this->getFlowNode());
            }

            if (!$this->getAttributeValue('cancelActivity')) {
                $this->createOppositeNode();
            }

            $this->processNextElement();

            return;
        }

        $flowNode = $this->getFlowNode();

        $flowNode->set([
            'status' => BpmnFlowNode::STATUS_PENDING,
        ]);

        $this->getEntityManager()->saveEntity($flowNode);
    }

    public function proceedPending(): void
    {
        $result = $this->getConditionManager()->check(
            $this->getTarget(),
            $this->getAttributeValue('conditionsAll'),
            $this->getAttributeValue('conditionsAny'),
            $this->getAttributeValue('conditionsFormula'),
            $this->getVariablesForFormula()
        );

        if ($this->getFlowNode()->getDataItemValue('isOpposite')) {
            if (!$result) {
                $this->setProcessed();
                $this->createOppositeNode(true);
            }

            return;
        }

        if ($result) {
            if ($this->getAttributeValue('cancelActivity')) {
                $this->getManager()->cancelActivityByBoundaryEvent($this->getFlowNode());
            }

            if (!$this->getAttributeValue('cancelActivity')) {
                $this->createOppositeNode();
            }

            $this->processNextElement();
        }
    }

    protected function createOppositeNode($isNegative = false)
    {
        $flowNode = $this->getEntityManager()->getEntity(BpmnFlowNode::ENTITY_TYPE);

        $flowNode->set([
            'status' => BpmnFlowNode::STATUS_PENDING,
            'elementId' => $this->getFlowNode()->get('elementId'),
            'elementType' => $this->getFlowNode()->get('elementType'),
            'elementData' => $this->getFlowNode()->get('elementData'),
            'data' => [
                'isOpposite' => !$isNegative,
            ],
            'flowchartId' => $this->getProcess()->get('flowchartId'),
            'processId' => $this->getProcess()->get('id'),
            'previousFlowNodeElementType' => $this->getFlowNode()->get('previousFlowNodeElementType'),
            'previousFlowNodeId' => $this->getFlowNode()->get('previousFlowNodeId'),
            'divergentFlowNodeId' => $this->getFlowNode()->get('divergentFlowNodeId'),
            'targetType' => $this->getFlowNode()->get('targetType'),
            'targetId' => $this->getFlowNode()->get('targetId'),
        ]);

        $this->getEntityManager()->saveEntity($flowNode);
    }
}
