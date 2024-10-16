<?php

namespace Espo\Modules\Main\Hooks\SalesOrder;

use Espo\Core\Field\DateTime;
use Espo\Core\Hook\Hook\BeforeSave;
use Espo\ORM\Entity;
use Espo\ORM\Repository\Option\SaveOptions;

class CalcOnHoldTime implements BeforeSave
{
    public function beforeSave(Entity $entity, SaveOptions $options): void
    {
        if ($entity->get('status') === 'OnHold' && $entity->getFetched('status') !== 'OnHold') {
            $entity->set('lastSwitchToOnHold', DateTime::createNow()->getString());
        } else if ($entity->getFetched('status') === 'OnHold' && $entity->get('status') !== 'OnHold') {
            $lastOnHoldDate = $entity->get('lastSwitchToOnHold');

            if ($lastOnHoldDate) {
                $onHoldTime = $entity->get('onHoldTime') ?? 0;

                $diff = DateTime::createNow()->getDateTime()->getTimestamp() - strtotime($lastOnHoldDate);

                $entity->set('onHoldTime', $onHoldTime + $diff);
                $entity->set('lastSwitchToOnHold', null);
            }
        }
    }
}
