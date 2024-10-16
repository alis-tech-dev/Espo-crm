<?php

namespace Espo\Modules\Accounting\Classes\Abstract\Services;

use Espo\Core\Di;
use Espo\Core\Templates\Services\Base;
use Espo\ORM\Entity;

class InvoiceItemLike extends Base implements Di\InjectableFactoryAware
{
    use Di\InjectableFactorySetter;

    protected const PARENT_ENTITY_NAME = null;

    public function getParentEntityName(): string
    {
        $entityName = static::PARENT_ENTITY_NAME;

        if (!$entityName) {
            $entityName = substr($this->entityType, 0, -4); // removes 'Item'
        }

        return $entityName;
    }

    public function afterUpdateEntity(Entity $entity, $data): void
    {
        $parentEntityType = $this->getParentEntityName();

        /** @var InvoiceLike $service */
        $service = $this->recordServiceContainer->get($parentEntityType);

        $parentRelation = $this->entityManager
            ->getDefs()
            ->getEntity($parentEntityType)
            ->getRelation($service::ITEM_LINK_NAME);

        $linkName = $parentRelation->getForeignRelationName();

        $parentEntity = $this->getRepository()
            ->getRelation($entity, $linkName)
            ->findOne();

        if (!$parentEntity) {
            return;
        }

        $service->recalculate($parentEntity, true);
    }
}
