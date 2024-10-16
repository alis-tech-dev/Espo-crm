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

class EventIntermediateSignalThrow extends EventSignal
{
    public function process(): void
    {
        $nextFlowNode = $this->prepareNextFlowNode();

        $this->setProcessed();

        $signal = $this->getSignal();

        if ($signal && is_string($signal)) {
            if (mb_substr($signal, 0, 1) !== '@') {
                $this->getManager()->broadcastSignal($signal);
            }
        } else {
            $GLOBALS['log']->warning("BPM: eventIntermediateSignalThrow, no signal");
        }

        $this->refreshProcess();
        $this->refreshTarget();

        if ($nextFlowNode) {
            $this->processPreparedNextFlowNode($nextFlowNode);
        }

        if ($signal && is_string($signal)) {
            if (mb_substr($signal, 0, 1) !== '@') {
                $this->getSignalManager()->trigger($signal);
            } else {
                $this->getSignalManager()->trigger($signal, $this->getTarget());
            }
        }
    }
}
