<?php

namespace Espo\Modules\RecurringRecords\Hooks\RecordRecurrence;

use Espo\Core\Exceptions\Error;
use Espo\Core\Exceptions\ForbiddenSilent;
use Espo\Modules\RecurringRecords\Entities\RecordRecurrence as RecordRecurrenceEntity;
use Espo\Modules\RecurringRecords\Services\RecordRecurrence as Service;
use Espo\ORM\Entity;
use Espo\ORM\EntityManager;

class Process
{
    public function __construct(
        private readonly Service $service,
        private readonly EntityManager $entityManager,
    ) {
    }

    public function afterSave(Entity $entity, array $options): void
    {
        if (!$entity->isNew() || $entity->get('status') !== 'Draft') {
            return;
        }

        assert($entity instanceof RecordRecurrenceEntity);

        try {
            $this->service->processRecurringRecords($entity);
        } catch (Error|\Exception $e) {
            $GLOBALS['log']->error('Record Recurrence: After save error: ' . $e->getMessage());
        } finally {
            if ($entity->get('status') === 'Draft') {
                $entity->set('status', 'Active'); // changing Draft to Active will trigger the job preparation
                $this->entityManager->saveEntity($entity, ['skipHooks' => true]);
            }
        }
    }
}
