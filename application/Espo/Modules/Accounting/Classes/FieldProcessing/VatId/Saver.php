<?php


namespace Espo\Modules\Accounting\Classes\FieldProcessing\VatId;

use Espo\ORM\Entity;
use Espo\Core\FieldProcessing\Saver as SaverInterface;
use Espo\Core\FieldProcessing\Saver\Params;
use Espo\Core\Utils\DateTime;
use Espo\ORM\EntityManager;

class Saver implements SaverInterface
{
    public function __construct(
        private readonly EntityManager $entityManager,
        private DateTime $dateTime,
    ) {}

    public function process(Entity $entity, Params $params): void
    {
        $entityType = $entity->getEntityType();

        $defs = $this->entityManager->getDefs()->getEntity($entityType);

        $fieldList = $defs->getFieldList();

        foreach($fieldList as $field) {
            $fieldType = $field->getType();

            if($fieldType !== "vatId") {
                continue;
            }

            $fieldName = $field->getName();

            $value = $entity->get($fieldName);

            if(!$value) {
                continue;
            }

            $entity->set($field->getName(), strtoupper($value));

            $status = 'Unknown';

            if(!strpos($value, 'CZ')){
                $PayerStatus = $this
                    ->entityManager
                    ->getRDBRepository('UnreliablePayer')
                    ->where('vatId', $value)
                    ->findOne()
                    ?->get('status') ?? 'Ok';

                $GLOBALS['log']->debug('PayerStatus: ', [$PayerStatus]);

                if($PayerStatus === 'Ok'){
                    $status = 'payerOk';
                } else if($PayerStatus === 'NotOk'){
                    $status = 'payerNotOk';
                } else if ($PayerStatus === 'Unknown'){
                    $status = 'Unknown';
                }
            }

            $entity->set($field->getName() . 'Status', $status);
            $entity->set($field->getName() . 'Description', $status);
            $entity->set($field->getName() . 'Date', date('Y-m-d'));

            $this->entityManager->saveEntity($entity, ['skipHooks' => true]);
        }
    }

}