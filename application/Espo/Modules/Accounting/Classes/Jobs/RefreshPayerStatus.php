<?php

namespace Espo\Modules\Accounting\Classes\Jobs;

use Espo\Core\Job\JobDataLess;
use Espo\Core\ORM\EntityManager;
use Espo\Core\Utils\Metadata;
use Espo\Modules\Accounting\Tools\UnreliablePayer\Client;

class RefreshPayerStatus implements JobDataLess
{
    public function __construct(
        private readonly Client $client,
        private readonly EntityManager $entityManager,
        private readonly Metadata $metadata
    ) {
    }

    public function run(): void
    {
        $allEntityTypeList = $this->getHavingVatIdEntityTypeList();

        foreach ($allEntityTypeList as $entityType) {

            $entityDefs = $this->entityManager->getDefs()->getEntity($entityType);
            $fieldList = $entityDefs->getFieldList();

            foreach ($fieldList as $field) {

                if($field->getType() === 'vatId') {

                    $entityList = $this->entityManager
                        ->getRDBRepository($entityType)
                        ->where([
                            $field->getName() . '!=' => null,
                        ])
                        ->find();

                    foreach ($entityList as $entity) {

                        $value = $entity->get($field->getName());

                        if(strpos($value, 'CZ') === false){
                            $status = 'Unknown';
                        } else {
                            $status = $this
                                ->entityManager
                                ->getRDBRepository('UnreliablePayer')
                                ->where('vatId', $value)
                                ->findOne()
                                ?->get('status') ?? 'Ok';
                        }

                        $entity->set($field->getName() . 'Status', $status);

                    }

                }

            }

        }

    }

    protected function getHavingVatIdEntityTypeList(): array {

        $entityList = [];

        $scopeDefs = $this->metadata->get(['scopes']);

        foreach ($scopeDefs as $scope => $defs) {

            if(!empty($defs['entity']) && $defs['entity']){
                $entityList[] = $scope;
            }

        }

        $entityWithVatIdFieldList = [];

        foreach ($entityList as $entity) {

            $entityDefs = $this->entityManager->getDefs()->getEntity($entity);
            $fieldList = $entityDefs->getFieldList();

            foreach ($fieldList as $field) {
                if($field->getType() === 'vatId'){
                    $entityWithVatIdFieldList[] = $entity;
                    break;
                }
            }
        }

        return  $entityWithVatIdFieldList;

    }

}
