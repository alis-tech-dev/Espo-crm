<?php

namespace Espo\Modules\Autocrm\Classes\FieldValidators;

use Espo\Classes\FieldValidators\LinkMultipleType as BaseLinkMultipleType;
use Espo\Core\Di;
use Espo\ORM\Entity;

class LinkMultipleType extends BaseLinkMultipleType implements Di\EntityManagerAware
{
    use Di\EntityManagerSetter;

    public function checkRequired(Entity $entity, string $field): bool
    {
        $recordListEnabled = $this->entityManager->getDefs()
            ->getEntity($entity->getEntityType())
            ->getField($field)
            ->getParam('recordListEnabled');

        if ($recordListEnabled) {
            $recordList = $entity->get($field . 'RecordList') ?: [];

            return is_array($recordList) && count($recordList) > 0;
        }

        return parent::checkRequired($entity, $field);
    }
}
