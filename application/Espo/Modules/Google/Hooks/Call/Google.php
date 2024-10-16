<?php
/*********************************************************************************
 * The contents of this file are subject to the EspoCRM Google Integration
 * Agreement ("License") which can be viewed at
 * https://www.espocrm.com/google-integration-agreement.
 * By installing or using this file, You have unconditionally agreed to the
 * terms and conditions of the License, and You may not use this file except in
 * compliance with the License.  Under the terms of the license, You shall not,
 * sublicense, resell, rent, lease, distribute, or otherwise  transfer rights
 * or usage to the software.
 *
 * Copyright (C) 2015-2023 Letrium Ltd.
 *
 * License ID: d222cd5ec22d93ad3eb7a092569d85b3
 ***********************************************************************************/

namespace Espo\Modules\Google\Hooks\Call;

use Espo\ORM\Entity;

class Google extends \Espo\Core\Hooks\Base
{
    public static $order = 9;

    public function beforeSave(Entity $entity)
    {
        if (!$entity->isNew() && $entity->isAttributeChanged('assignedUserId') && $entity->get('googleCalendarEventId')) {

            $dummy = $this->getEntityManager()->getEntity($entity->getEntityType());

            $copyList = [
                'name',
                'assignedUserId',
                'googleCalendarId',
                'googleCalendarEventId',
                'dateStart',
                'dateEnd',
            ];
            foreach ($copyList as $field) {
                $dummy->set($field, $entity->getFetched($field));
            }

            $dummy->set('deleted', true);

            $this->getEntityManager()->saveEntity($dummy, ['skipHooks' => true]);
            $this->getEntityManager()->removeEntity($dummy, ['skipHooks' => true]);

            $entity->set('googleCalendarEventId', '');
            $entity->set('googleCalendarId', '');
        }

        if (!$entity->isNew() && $entity->getFetched('googleCalendarEventId') == 'FAIL') {
            $entity->set('googleCalendarEventId', '');
        }
    }
}
