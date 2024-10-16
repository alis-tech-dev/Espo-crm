<?php

namespace Espo\Modules\RecurringRecords\Classes\Jobs;

use Espo\Core\{
    Exceptions\Error,
    Job\Job
};
use Espo\Core\Job\Job\Data;
use Espo\Modules\RecurringRecords\Entities\RecordRecurrence as RecordRecurrenceEntity;
use Espo\Modules\RecurringRecords\Services\RecordRecurrence as Service;
use Espo\ORM\EntityManager;

class CheckRecurringRecords implements Job
{
    public function __construct(
        private readonly Service $service,
        private readonly EntityManager $entityManager,
    ) {
    }

    /**
     * @throws Error
     */
    public function run(Data $data): void
    {
        $recordRecurrenceId = $data->getTargetId();

        if (!$recordRecurrenceId) {
            throw new Error('No target.');
        }

        /** @var RecordRecurrenceEntity $recordRecurrence */
        $recordRecurrence = $this->entityManager->getEntity('RecordRecurrence', $recordRecurrenceId);

        if (!$recordRecurrence) {
            throw new Error('Record Recurrence not found.');
        }


        $this->service->processRecurringRecords($recordRecurrence);
        $this->entityManager->saveEntity($recordRecurrence);
    }
}
