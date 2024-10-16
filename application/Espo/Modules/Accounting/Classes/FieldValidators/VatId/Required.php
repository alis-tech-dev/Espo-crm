<?php

namespace Espo\Modules\Accounting\Classes\FieldValidators\VatId;

use Espo\Classes\FieldValidators\VarcharType;
use Espo\Core\FieldValidation\Validator;
use Espo\Core\FieldValidation\Validator\Data;
use Espo\Core\FieldValidation\Validator\Failure;
use Espo\ORM\Defs as OrmDefs;
use Espo\ORM\Entity;

class Required implements Validator
{
    public function __construct(
        private readonly VarcharType $varcharType,
        private readonly OrmDefs $ormDefs,
    ) {
    }

    public function validate(Entity $entity, string $field, Data $data): ?Failure {
        $enabled = $this->ormDefs
            ->getEntity($entity->getEntityType())
            ->getField($field)
            ->getParam('required');

        if(!$enabled) {
            return null;
        }

        if ($this->isNotEmpty($entity, $field)) {
            return null;
        }

        return Failure::create();
    }

    private function isNotEmpty(Entity $entity, string $field): bool
    {
        return
            $entity->has($field) &&
            $entity->get($field) !== '' &&
            $entity->get($field) !== null;
    }
}
