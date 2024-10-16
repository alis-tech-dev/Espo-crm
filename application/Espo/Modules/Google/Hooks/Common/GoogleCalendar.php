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

namespace Espo\Modules\Google\Hooks\Common;

use \Espo\ORM\Entity;

class GoogleCalendar extends \Espo\Core\Hooks\Base
{
    public static $order = 8;

    protected function isValidEntityType(Entity $entity)
    {
        return $entity instanceof \Espo\Core\Templates\Entities\Event;
    }

    public function beforeSave(Entity $entity)
    {
        if (!empty($options['silent'])) return;

        if (!$this->isValidEntityType($entity)) return;

        $repository = $this->getEntityManager()->getRepository('GoogleCalendar');
        if (!$entity->isNew()) {
            $googleData = $repository->getEventEntityGoogleData($entity->getEntityType(), $entity->get('id'));
            if (!empty($googleData['googleCalendarEventId'])) {
                $googleCalendarEventId = $googleData['googleCalendarEventId'];
                $googleCalendarId = $googleData['googleCalendarId'];

                if ($googleCalendarEventId == 'FAIL') {
                    $repository
                        ->storeEventRelation(
                            $entity->getEntityType(), $entity->get('id'), $googleData['googleCalendarId'], '');

                    return;
                } else if ($entity->isAttributeChanged('assignedUserId')) {

                    $newEntity = $this->getEntityManager()->getEntity($entity->getEntityType());

                    $copyFields = array(
                        "name",
                        "assignedUserId",
                        "dateStart",
                        "dateEnd"
                    );
                    foreach ($copyFields as $field) {
                        $newEntity->set($field, $entity->getFetched($field));
                    }

                    $this->getEntityManager()->saveEntity($newEntity, ['skipHooks' => true]);

                    $repository->storeEventRelation(
                        $newEntity->getEntityType(), $newEntity->get('id'), $googleCalendarId, $googleCalendarEventId);

                    $this->getEntityManager()->removeEntity($newEntity, ['skipHooks' => true]);

                    $repository->resetEventRelation($entity->getEntityType(), $entity->get('id'));
                }
            }
        }
    }
}
