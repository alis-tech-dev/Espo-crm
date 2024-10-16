<?php

namespace Espo\Modules\Accounting\Classes\FieldValidators\VatId;

use Espo\Core\Exceptions\Error;
use Espo\Core\FieldValidation\Validator;
use Espo\Core\FieldValidation\Validator\Data;
use Espo\Core\FieldValidation\Validator\Failure;
use Espo\Core\Utils\Metadata;
use Espo\ORM\Defs as OrmDefs;
use Espo\ORM\Entity;

class MaxLength implements Validator
{
    public function __construct(
        private readonly OrmDefs $ormDefs,
        private readonly Metadata $metadata,
    ) {
    }

    public function validate(Entity $entity, string $field, Data $data): ?Failure
    {
        if (!$this->isNotEmpty($entity, $field)) {
            return null;
        }

        $fieldDefs = $this->ormDefs
            ->getEntity($entity->getEntityType())
            ->getField($field);

        if ($fieldDefs->isNotStorable()) {
            return null;
        }

        $fieldType = $fieldDefs->getType();
        $maxLength = $this->metadata->get(['fields', $fieldType, 'fieldDefs', 'len']);

        if(!is_int($maxLength) || $maxLength < 1) {
            throw new Error("Field type '$fieldType' has invalid/missing fieldDefs 'len' property");
        }

        $value = $entity->get($field);

        if (mb_strlen($value) > $maxLength) {
            return Failure::create();
        }

        return null;
    }

    private function isNotEmpty(Entity $entity, string $field): bool
    {
        return
            $entity->has($field) &&
            $entity->get($field) !== '' &&
            $entity->get($field) !== null;
    }
}
