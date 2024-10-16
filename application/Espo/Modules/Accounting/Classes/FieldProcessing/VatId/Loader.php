<?php

namespace Espo\Modules\Accounting\Classes\FieldProcessing\VatId;

use Espo\Core\FieldProcessing\Loader as FieldProcessingLoader;
use Espo\ORM\Entity;
use Espo\Core\FieldProcessing\Loader\Params;
use Espo\Core\ORM\EntityManager;
use Exception;

class Loader implements FieldProcessingLoader
{
    public function __construct(
        private readonly EntityManager $entityManager
    ) {
    }

    public function process(Entity $entity, Params $params): void
    {
        $entityType = $entity->getEntityType();

        $defs = $this->entityManager->getDefs()->getEntity($entityType);

        $fieldList = $defs->getFieldList();

        foreach ($fieldList as $field) {
            $fieldType = $field->getType();

            if ($fieldType !== "vatId") {
                continue;
            }

            $fieldName = $field->getName();

            $value = $entity->get($fieldName);

            if (!$value) {
                continue;
            }

            return;

            if(strpos($value, 'CZ') === true){
                $status = $this
                    ->entityManager
                    ->getRDBRepository('UnreliablePayer')
                    ->where('vatId', $value)
                    ->findOne()
                    ?->get('status') ? 'payerOk' : 'payerNotOk';
            }

            // $entity->set($field->getName() . 'Status', $status);
            // $entity->set($field->getName() . 'Text', $status);
        }
    }
}