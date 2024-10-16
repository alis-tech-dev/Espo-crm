<?php

namespace Espo\Modules\RecurringRecords\Services;

use Cron\CronExpression;
use DateTimeImmutable;
use DateTimeZone;
use Espo\Core\{
    Exceptions\Error,
    Exceptions\ErrorSilent,
    Exceptions\Forbidden,
    Exceptions\ForbiddenSilent,
    Utils\DateTime as DateTimeUtil
};
use Espo\Core\Exceptions\Error\Body as ErrorBody;
use Espo\Core\Templates\Services\Base;
use Espo\Modules\RecurringRecords\Entities\RecordRecurrence as RecordRecurrenceEntity;
use Espo\ORM\Entity;
use Exception;

class RecordRecurrence extends Base
{
    /**
     * @throws Error
     * @throws Exception
     */
    public function processRecurringRecords(RecordRecurrenceEntity $recordRecurrence): void
    {
        $now = new DateTimeImmutable();
        $timezoneStr = $this->config->get('timeZone') ?? 'UTC';
        $utcTimezone = new DateTimeZone('UTC');
        $isBatched = $recordRecurrence->isBatched();
        $lastBatch = !$isBatched;
        $entityType = $recordRecurrence->get('entityType');
        $data = $recordRecurrence->get('data');
        $dateStartString = $data->dateStart ?? null;

        if (!$dateStartString) {
            throw new Error('Date start is not set.');
        }

        $until = $recordRecurrence->getUntilDateTime();
        $infinite = $recordRecurrence->get('infinite');
        $lastGenerated = $recordRecurrence->getLastGeneratedDateTime() ?? 'now';

        if ($isBatched) {
            $untilNew = $now->add($recordRecurrence->getGenerateInAdvanceInterval());

            if ($infinite || $untilNew < $until) {
                $until = $untilNew;
            } else {
                $lastBatch = true;
            }
        } elseif ($until < $now) {
            $recordRecurrence->set('status', 'Completed');

            return;
        }

        $nextDate = $recordRecurrence->getNextCreateDate(
            currentTime: $lastGenerated,
            allowCurrentDate: true,
            timeZone: $timezoneStr
        );

        if ($lastBatch && $nextDate > $until) {
            $recordRecurrence->set('status', 'Completed');

            return;
        }

        $dateStart = DateTimeImmutable::createFromFormat(
            DateTimeUtil::SYSTEM_DATE_TIME_FORMAT,
            $dateStartString,
            $utcTimezone
        );
        $fieldsToShift = ['dateEnd'];

        try {
            for ($i = 1; $nextDate <= $until; $i++) {
                $diff = $dateStart->diff($nextDate);

                $scheduledRecord = $this->entityManager->getNewEntity($entityType);
                $scheduledRecord->set($data);
                $scheduledRecord->set('dateStart', $nextDate->format(DateTimeUtil::SYSTEM_DATE_TIME_FORMAT));

                foreach ($fieldsToShift as $field) {
                    if ($scheduledRecord->has($field)) {
                        $orgValue = $scheduledRecord->getValueObject($field)?->getDateTime();

                        if ($orgValue) {
                            $scheduledRecord->set(
                                $field,
                                $orgValue->add($diff)->format(DateTimeUtil::SYSTEM_DATE_TIME_FORMAT)
                            );
                        }
                    }
                }

                $this->entityManager->saveEntity($scheduledRecord);

                $nextDate = $recordRecurrence->getNextCreateDate(
                    currentTime: $lastGenerated,
                    nth: $i,
                    allowCurrentDate: true,
                    timeZone: $timezoneStr
                );
            }
        } catch (Exception $e) {
            $GLOBALS['log']->error(
                'RecordRecurrence: Unexpected exception occurred while processing ' . $recordRecurrence->getId() . '. Details: ' . $e->getMessage()
            );

            $recordRecurrence->set('lastGenerated', $nextDate->format(DateTimeUtil::SYSTEM_DATE_TIME_FORMAT));

            return;
        }

        if ($lastBatch) {
            $recordRecurrence->set('status', 'Completed');

            return;
        }

        $recordRecurrence->set('lastGenerated', $until->format(DateTimeUtil::SYSTEM_DATE_TIME_FORMAT));
    }

    /**
     * @throws Exception
     */
    public function isAboveBatchSizeLimit(RecordRecurrenceEntity $recordRecurrence): bool
    {
        $timezoneStr = $this->config->get('timeZone') ?? 'UTC';
        $runLimit = $this->config->get('recurrenceBatchSizeLimit', 500);

        $now = new \DateTimeImmutable();
        $isBatched = $recordRecurrence->isBatched();
        $until = $isBatched ? $now->add(
            $recordRecurrence->getGenerateInAdvanceInterval()
        ) : $recordRecurrence->getUntilDateTime();
        $numberOfRecurrences = 0;

        do {
            $nextDate = $recordRecurrence->getNextCreateDate(
                nth: $numberOfRecurrences,
                allowCurrentDate: true,
                timeZone: $timezoneStr,
            );
            $numberOfRecurrences++;

            if ($numberOfRecurrences > $runLimit) {
                return true;
            }
        } while ($nextDate < $until);

        return false;
    }

    /**
     * @throws Forbidden
     * @throws Exception
     */
    protected function beforeCreateEntity(Entity $entity, $data): void
    {
        assert($entity instanceof RecordRecurrenceEntity);

        if (!CronExpression::isValidExpression($entity->get('scheduling'))) {
            throw ErrorSilent::createWithBody(
                "Invalid scheduling expression.",
                ErrorBody::create()
                    ->withMessageTranslation(
                        'invalidSchedulingExpression',
                        'RecordRecurrence',
                    )
                    ->encode()
            );
        }

        if ($this->isAboveBatchSizeLimit($entity)) {
            throw ForbiddenSilent::createWithBody(
                "Batch size limit exceeded.",
                ErrorBody::create()
                    ->withMessageTranslation(
                        'batchSizeLimitExceeded',
                        'RecordRecurrence',
                    )
                    ->encode()
            );
        }

        parent::beforeCreateEntity($entity, $data);
    }
}
