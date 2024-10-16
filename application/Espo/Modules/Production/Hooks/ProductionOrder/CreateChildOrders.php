<?php

namespace Espo\Modules\Production\Hooks\ProductionOrder;

use Espo\Core\Hook\Hook\AfterSave;
use Espo\Core\ORM\EntityManager;
use Espo\Entities\User;
use Espo\ORM\Entity;
use Espo\ORM\Repository\Option\SaveOptions;

class CreateChildOrders implements AfterSave
{
    public static int $order = 20;

    public function __construct(
        private readonly EntityManager $entityManager,
        private readonly User $user,
    ) {
    }

    public function afterSave(Entity $entity, SaveOptions $options): void
    {
        if (!$entity->isNew()) {
            return;
        }

        $materials = $this
            ->entityManager
            ->getRDBRepository('ProductionOrder')
            ->getRelation($entity, 'billOfMaterials')
            ->find();

        foreach ($materials as $material) {
            $product = $this
                ->entityManager
                ->getRDBRepository('ProductionModelItem')
                ->getRelation($material, 'product')
                ->findOne();

            if (!$product) {
                continue;
            }

            $productionModelId = $this
                ->entityManager
                ->getRDBRepository('Product')
                ->getRelation($product, 'defaultProductionModel')
                ->findOne()
                ?->getId();

            if (!$productionModelId) {
                continue;
            }

            $this->entityManager->createEntity('ProductionOrder', [
                'productId' => $product->getId(),
                'parentProductionOrderId' => $entity->getId(),
                'quantityPlanned' => $entity->get('quantityPlanned') * $material->get('quantity'),
                'productionModelId' => $productionModelId,
                'name' => $product->get('name'),
                'assignedUserId' => $this->user->getId(),
            ]);
        }
    }
}
