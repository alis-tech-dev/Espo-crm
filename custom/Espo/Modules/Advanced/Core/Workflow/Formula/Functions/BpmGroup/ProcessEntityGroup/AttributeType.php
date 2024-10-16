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

namespace Espo\Modules\Advanced\Core\Workflow\Formula\Functions\BpmGroup\ProcessEntityGroup;

use Espo\Core\Exceptions\Error;

/**
 * @todo Rewrite to inherit from BaseFunction.
 */
class AttributeType extends \Espo\Core\Formula\Functions\EntityGroup\AttributeType
{
    protected function getEntity()
    {
        $variables = $this->getVariables();

        if (!isset($variables->__processEntity)) {
            throw new Error("Formula processEntity\\attribute can't be used out of process");
        }

        return $variables->__processEntity;
    }
}
