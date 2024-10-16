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
use stdClass;

class UpdateCreatedEntity extends BaseEntity
{
    protected function run(Entity $entity, stdClass $actionData): bool
    {
        if (empty($actionData->target)) {
            return false;
        }

        $target = $actionData->target;

        $targetEntity = $this->getCreatedEntity($target);

        if (!$targetEntity) {
            return false;
        }

        if (property_exists($actionData, 'fields')) {
            $data = $this->getDataToFill($targetEntity, $actionData->fields);
            $targetEntity->set($data);
        }

        if (!empty($actionData->formula)) {
            $this->getFormulaManager()->run(
                $actionData->formula,
                $targetEntity,
                $this->getFormulaVariables()
            );
        }

        if (!$targetEntity->has('modifiedById')) {
            $targetEntity->set('modifiedByName', 'System');
        }

        $this->getEntityManager()->saveEntity($targetEntity, ['modifiedById' => 'system']);

        return true;
    }
}
