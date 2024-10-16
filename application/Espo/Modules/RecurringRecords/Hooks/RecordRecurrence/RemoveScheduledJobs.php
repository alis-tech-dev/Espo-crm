<?php

namespace Espo\Modules\RecurringRecords\Hooks\RecordRecurrence;

use Espo\Core\Job\Job\Status;
use Espo\Entities\Job as JobEntity;
use Espo\Entities\ScheduledJob as ScheduledJobEntity;
use Espo\ORM\Entity;
use Espo\ORM\EntityManager;


class RemoveScheduledJobs
{
    public function __construct(
        private readonly EntityManager $entityManager,
    ) {
    }

    public function afterSave(Entity $entity, array $options): void
    {
        if (!$entity->isNew()) {
            $this->removeEntityScheduledJob($entity);
        }
    }

    private function removeEntityScheduledJob(Entity $entity): void
    {
        $scheduledJob = $this->getScheduledJobEntity();
        if (!$scheduledJob) {
            return;
        }

        $this->entityManager->getRDBRepository(JobEntity::ENTITY_TYPE)->where([
            'scheduledJobId' => $scheduledJob->getId(),
            'status' => [
                Status::PENDING,
                Status::RUNNING,
            ],
            'targetType' => $entity->getEntityType(),
            'targetId' => $entity->getId(),
        ]);
    }

    private function getScheduledJobEntity(): ?ScheduledJobEntity
    {
        return $this->entityManager->getRDBRepository(ScheduledJobEntity::ENTITY_TYPE)->where([
            'name' => 'CheckRecurringRecords',
        ])->findOne();
    }

    public function afterRemove(Entity $entity, array $options): void
    {
        $this->removeEntityScheduledJob($entity);
    }
}
