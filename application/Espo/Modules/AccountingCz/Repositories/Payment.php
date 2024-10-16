<?php

namespace Espo\Modules\AccountingCz\Repositories;

use Espo\Core\Di;
use Espo\Core\Templates\Repositories\Base;
use Espo\Modules\AccountingCz\Services\Invoice as InvoiceService;
use Espo\Modules\AccountingCz\Services\ProformaInvoice as ProformaInvoiceService;

use Espo\ORM\Entity;

class Payment extends Base implements Di\InjectableFactoryAware
{
    use Di\InjectableFactorySetter;

    protected function afterRemove(Entity $entity, array $options = [])
    {
        parent::afterRemove($entity, $options);

        $this->updateParentEntity($entity);
        
    }

    private function updateParentEntity(Entity $entity): void
    {
        $parentEntityType = $entity->get('parentType') ?? null;
        $parentEntityId = $entity->get('parentId') ?? null;

        if(!$parentEntityType || !$parentEntityId){
            return;
        }

        $parentEntity = $this->entityManager->getEntityById($parentEntityType, $parentEntityId);

        if(!$parentEntity){
            return;
        }

        $this->{'get'.$parentEntity->getEntityType().'Service'}()->recalculateTotals($parentEntity);

        $this->entityManager->saveEntity($parentEntity);
    }

    private function getInvoiceService(): InvoiceService
    {
        return $this->injectableFactory->create(InvoiceService::class);
    }

    private function getProformaInvoiceService(): ProformaInvoiceService
    {
        return $this->injectableFactory->create(ProformaInvoiceService::class);
    }
}
