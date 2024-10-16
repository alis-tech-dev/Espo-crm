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

namespace Espo\Modules\Advanced\Hooks\BpmnProcess;

use Espo\Modules\Advanced\Entities\BpmnProcess;
use Espo\ORM\Entity;
use Espo\ORM\EntityManager;

class SubProcesses
{
    private EntityManager $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function afterRemove(Entity $entity, array $options): void
    {
        $subProcessList = $this->entityManager
            ->getRDBRepository(BpmnProcess::ENTITY_TYPE)
            ->where(['parentProcessId' => $entity->getId()])
            ->find();

        foreach ($subProcessList as $e) {
            $this->entityManager->removeEntity($e, $options);
        }
    }
}
