<?php

namespace Espo\Modules\RecurringRecords\Entities;

use Cron\CronExpression;
use DateInterval;
use DateTimeImmutable;
use DateTimeZone;
use Espo\Core\Templates\Entities\Base;
use Exception;

class RecordRecurrence extends Base
{
    public const ENTITY_TYPE = 'RecordRecurrence';

    private ?CronExpression $cronExpression = null;

    public function isBatched(): bool
    {
        return $this->get('generateInBatches') || $this->get('infinite');
    }

    public function getGenerateInAdvanceInterval(): DateInterval
    {
        return DateInterval::createFromDateString(str_replace('_', ' ', $this->get('generateInAdvance')));
    }

    /**
     * @throws Exception
     */
    public function getNextCreateDate(
        $currentTime = 'now',
        int $nth = 0,
        bool $allowCurrentDate = false,
        $timeZone = null
    ): DateTimeImmutable {
        if (!$currentTime) {
            $currentTime = 'now';
        }

        $lastGenerated = $this->getLastGeneratedDateTime();

        do {
            $nextDate = $this->getCronExpression()
                ->setMaxIterationCount(PHP_INT_MAX)
                ->getNextRunDate($currentTime, $nth++, $allowCurrentDate, $timeZone)
                ->setTimezone(new DateTimeZone('UTC'));
        } while ($lastGenerated && $nextDate < $lastGenerated);

        return DateTimeImmutable::createFromMutable($nextDate);
    }

    public function getLastGeneratedDateTime(): ?DateTimeImmutable
    {
        return $this->getValueObject('lastGenerated')?->getDateTime();
    }

    public function getCronExpression(): CronExpression
    {
        if (!$this->cronExpression) {
            $this->cronExpression = CronExpression::factory($this->get('scheduling'));
        }

        return $this->cronExpression;
    }

    public function getUntilDateTime(): ?DateTimeImmutable
    {
        return $this->getValueObject('until')?->getDateTime();
    }
}
