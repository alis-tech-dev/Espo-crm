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

namespace Espo\Modules\Advanced\Tools\Workflow\Jobs;

use Espo\Core\Job\Job;
use Espo\Core\Job\Job\Data;
use Espo\Modules\Advanced\Tools\Workflow\Service;
use Espo\ORM\EntityManager;

use RuntimeException;

class RunScheduledWorkflowForEntity implements Job
{
    private EntityManager $entityManager;
    private Service $service;

    public function __construct(
        EntityManager $entityManager,
        Service $service
    ) {
        $this->entityManager = $entityManager;
        $this->service = $service;
    }

    public function run(Data $data): void
    {
        $data = $data->getRaw();

        $entityType = $data->entityType;
        $id = $data->entityId;
        $workflowId = $data->workflowId;

        $entity = $this->entityManager->getEntityById($entityType, $id);

        if (!$entity) {
            throw new RuntimeException(
                'Workflow['.$workflowId.'][runActions]: ' .
                'Entity['.$entityType.'] ['. $id . '] is not found.');
        }

        $this->service->triggerWorkflow($entity, $workflowId);
    }
}
