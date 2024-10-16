<?php

namespace Espo\Modules\Production\Hooks\ProductionModel;

use Espo\Core\Hook\Hook\AfterSave;
use Espo\Core\ORM\EntityManager;
use Espo\ORM\Entity;
use Espo\ORM\Repository\Option\SaveOptions;
use Espo\Modules\ProductBase\Entities\Product as ProductEntity;

class SetAsDefault implements AfterSave {

    public function __construct(
        private readonly EntityManager $entityManager
    ){}

    public function afterSave(Entity $entity, SaveOptions $options): void
    {
        $productId = $entity->get('productId');

        if (!$productId) {
            return;
        }

        $product = $this->entityManager->getEntityById(ProductEntity::ENTITY_TYPE, $productId);

        if (!$product) {
            return;
        }

        $count = $this
            ->entityManager
            ->getRDBRepository(ProductEntity::ENTITY_TYPE)
            ->getRelation($product, 'productionModels')
            ->count();

        if ($count === 1) {
            $product->set('defaultProductionModelId', $entity->getId());
            $this->entityManager->saveEntity($product);
        }
    }

}