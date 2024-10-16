<?php

namespace Espo\Modules\RecurringRecords\Hooks\RecordRecurrence;

use Espo\Core\Exceptions\{
    BadRequest,
    Error,
    Error\Body as ErrorBody,
    ErrorSilent,
    Forbidden,
    ForbiddenSilent,
    NotFound
};
use Espo\Core\Record\ServiceContainer as RecordServiceContainer;
use Espo\ORM\Entity;

class DuplicateData
{
    public function __construct(
        private readonly RecordServiceContainer $recordServiceContainer,
    ) {
    }

    /**
     * @throws BadRequest
     * @throws Forbidden
     * @throws ForbiddenSilent
     * @throws NotFound
     * @throws Error
     */
    public function beforeSave(Entity $entity, array $options = []): void
    {
        if (!$entity->isNew()) {
            return;
        }

        $data = $entity->get('data');
        $id = $data->id ?? null;

        if (!$id) {
            return;
        }

        $recordService = $this->recordServiceContainer->get($entity->get('entityType'));
        $duplicateAttributes = $recordService->getDuplicateAttributes($id);

        if (!($duplicateAttributes->dateStart ?? null)) {
            throw ErrorSilent::createWithBody(
                'Record must have a start date.',
                ErrorBody::create()
                    ->withMessageTranslation('cronExprInvalid', 'RecordRecurrence')
                    ->encode(),
            );
        }

        $entity->set('data', $duplicateAttributes);
    }
}
