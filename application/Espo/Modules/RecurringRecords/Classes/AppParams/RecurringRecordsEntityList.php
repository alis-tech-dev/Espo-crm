<?php

namespace Espo\Modules\RecurringRecords\Classes\AppParams;

use Espo\Core\Exceptions\BadRequest;
use Espo\Core\Exceptions\Error;
use Espo\Core\Exceptions\Forbidden;
use Espo\Core\Select\SelectBuilderFactory;
use Espo\ORM\EntityManager;

class RecurringRecordsEntityList
{
    public function __construct(
        private readonly SelectBuilderFactory $selectBuilderFactory,
        private readonly EntityManager $entityManager,
    ) {
    }

    /**
     * @throws BadRequest
     * @throws Forbidden
     * @throws Error
     */
    public function get(): array
    {
        $list = [];

        $query = $this->selectBuilderFactory->create()
            ->from('RecordRecurrence')
            ->withStrictAccessControl()
            ->buildQueryBuilder()
            ->select(['entityType'])
            ->group(['entityType'])
            ->build();

        $recurrences = $this->entityManager
            ->getRDBRepository('RecordRecurrence')
            ->clone($query)
            ->find();

        foreach ($recurrences as $record) {
            $list[] = $record->get('entityType');
        }

        return $list;
    }
}
