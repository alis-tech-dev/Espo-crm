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

namespace Espo\Modules\Advanced\Core\Workflow\Formula\Functions\BpmGroup;

use Espo\Core\Di\EntityManagerAware;
use Espo\Core\Di\EntityManagerSetter;
use Espo\Core\Di\InjectableFactoryAware;
use Espo\Core\Di\InjectableFactorySetter;
use Espo\Core\Exceptions\Error;
use Espo\Core\Formula\ArgumentList;
use Espo\Core\Formula\Functions\BaseFunction;
use Espo\Modules\Advanced\Core\Bpmn\BpmnManager;
use Espo\Modules\Advanced\Entities\BpmnFlowchart;

class StartProcessType extends BaseFunction implements EntityManagerAware, InjectableFactoryAware
{
    use EntityManagerSetter;
    use InjectableFactorySetter;

    /**
     * @inheritDoc
     */
    public function process(ArgumentList $args)
    {
        $args = $this->evaluate($args);

        $flowchartId = $args[0] ?? null;
        $targetType = $args[1] ?? null;
        $targetId = $args[2] ?? null;
        $elementId = $args[3] ?? null;

        if (!$flowchartId || !$targetType || !$targetId)
            throw new Error("Formula: bpm\\startProcess: Too few arguments.");

        if (!is_string($flowchartId) || !is_string($targetType) || !is_string($targetId))
            throw new Error("Formula: bpm\\startProcess: Bad arguments.");

        /** @var ?BpmnFlowchart $flowchart */
        $flowchart = $this->entityManager->getEntityById(BpmnFlowchart::ENTITY_TYPE, $flowchartId);
        $target = $this->entityManager->getEntityById($targetType, $targetId);

        if (!$flowchart) {
            $GLOBALS['log']->notice("Formula: bpm\\startProcess: Flowchart '$flowchartId' not found.");

            return null;
        }

        if (!$target) {
            $GLOBALS['log']->notice("Formula: bpm\\startProcess: Target $targetType '$targetId' not found.");

            return null;
        }

        if ($flowchart->get('targetType') != $targetType)
            throw new Error("Formula: bpm\\startProcess: Target entity type doesn't match flowchart target type.");

        $bpmnManager = $this->injectableFactory->create(BpmnManager::class);

        $bpmnManager->startProcess($target, $flowchart, $elementId);

        return true;
    }
}
