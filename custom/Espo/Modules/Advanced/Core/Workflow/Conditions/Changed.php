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

namespace Espo\Modules\Advanced\Core\Workflow\Conditions;

class Changed extends Base
{
    /**
     * @param mixed $fieldValue
     */
    protected function compare($fieldValue): bool
    {
        $entity = $this->getEntity();
        $attribute = $this->getAttributeName();

        if (!isset($attribute)) {
            return false;
        }

        if (
            !$entity->isNew() &&
            !$entity->hasFetched($attribute) &&
            $entity->getAttributeParam($attribute, 'isLinkMultipleIdList')
        ) {
            return false;
        }

        if ($entity->isNew()) {
            $value = $entity->get($attribute);

            if (empty($value)) {
                return false;
            }
        }

        return $entity->isAttributeChanged($attribute);
    }
}
