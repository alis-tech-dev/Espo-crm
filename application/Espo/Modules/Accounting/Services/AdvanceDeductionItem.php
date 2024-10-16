<?php

namespace Espo\Modules\Accounting\Services;

use Espo\ORM\Entity;
use Espo\Modules\Accounting\Entities\Invoice;
use Espo\Modules\Accounting\Services\Invoice as ServicesInvoice;

class AdvanceDeductionItem
{
    public function afterUpdateEntity(Entity $entity, $data): void
    {
        /** @var InvoiceLike $service */
        $service = $this->recordServiceContainer->get(Invoice::ENTITY_TYPE);

        $parentRelation = $this->entityManager
            ->getDefs()
            ->getEntity(Invoice::ENTITY_TYPE)
            ->getRelation($service::ADVANCE_DEDUCTIONS_LINK_NAME);

        $linkName = $parentRelation->getForeignRelationName();

        /** @var Entity $entity */
        $parentEntity = $this->getRepository()
            ->getRelation($entity, $linkName)
            ->findOne();

        if (!$parentEntity) {
            return;
        }

        $service->recalculate($parentEntity, true);
    }
}
