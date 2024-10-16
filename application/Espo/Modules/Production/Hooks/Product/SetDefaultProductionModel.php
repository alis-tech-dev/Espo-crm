<?php

namespace Espo\Modules\Production\Hooks\Product;

use Espo\Core\Hook\Hook\BeforeSave;
use Espo\Core\ORM\EntityManager;
use Espo\ORM\Entity;
use Espo\ORM\Repository\Option\SaveOptions;

class SetDefaultProductionModel implements BeforeSave
{
    public function __construct(
        private readonly EntityManager $entityManager
    ) {
    }

    public function beforeSave(Entity $entity, SaveOptions $options): void
    {
        if (!$entity->isAttributeChanged('defaultProductionModelId')) {
            return;
        }

        $productionModelId = $entity->get('defaultProductionModelId');
        $fetchedProductionModelId = $entity->getFetched('defaultProductionModelId');

        $relation = $this->entityManager
            ->getRDBRepository($entity->getEntityType())
            ->getRelation($entity, 'productionModels');

        if (!$productionModelId && $fetchedProductionModelId) {
            $relation->unrelateById($fetchedProductionModelId);
        } else if ($productionModelId) {
            $relation->relateById($productionModelId);
        }
    }
}
