<?php

namespace Espo\Modules\RecurringRecords\Repositories;

use Cron\CronExpression;
use Espo\Core\{
    Di,
    Exceptions\Error
};
use Espo\Core\Templates\Repositories\Base;
use Espo\ORM\Entity;

class RecordRecurrence extends Base implements Di\RecordServiceContainerAware
{
    use Di\RecordServiceContainerSetter;

    /**
     * @throws Error
     */
    protected function beforeSave(Entity $entity, array $options = []): void
    {
        if (!CronExpression::isValidExpression($entity->get('scheduling'))) {
            throw new Error('Invalid scheduling cron rule');
        }

        parent::beforeSave($entity, $options);
    }
}
