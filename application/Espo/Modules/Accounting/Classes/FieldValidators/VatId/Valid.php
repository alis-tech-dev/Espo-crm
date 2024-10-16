<?php
// TODO: translate error etc.

namespace Espo\Modules\Accounting\Classes\FieldValidators\VatId;

use Espo\Core\FieldValidation\Validator;
use Espo\Core\FieldValidation\Validator\Data;
use Espo\Core\FieldValidation\Validator\Failure;
use Espo\ORM\Defs as OrmDefs;
use Espo\ORM\Entity;
use Espo\Modules\Accounting\Tools\VIESValidator;

class Valid implements Validator
{
    public function __construct(
        private readonly OrmDefs $ormDefs,
        private readonly VIESValidator $viesValidator,
    ) {
    }

    public function validate(Entity $entity, string $field, Data $data): ?Failure
    {
        return null;

        if (!$this->isNotEmpty($entity, $field)) {
            return null;
        }

        $fieldDefs = $this->ormDefs
            ->getEntity($entity->getEntityType())
            ->getField($field);

        $validateFormat = (bool) $fieldDefs->getParam('validateFormat');
        $validateExistence = (bool) $fieldDefs->getParam('validateExistence');

        $value = strtoupper($entity->get($field));

        if ($validateFormat) {
            if (!$this->viesValidator->validate($value, $validateExistence)) {
                return Failure::create();
            }
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