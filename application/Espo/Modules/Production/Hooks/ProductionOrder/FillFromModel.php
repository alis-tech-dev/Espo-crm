<?php

namespace Espo\Modules\Production\Hooks\ProductionOrder;

use Espo\Core\Hook\Hook\AfterSave;
use Espo\ORM\Entity;
use Espo\Core\ORM\EntityManager;
use Espo\ORM\Repository\Option\SaveOptions;

class FillFromModel implements AfterSave
{
    public static int $order = 15;

    public function __construct(
        private readonly EntityManager $entityManager
    ) {
    }

    public function afterSave(Entity $entity, SaveOptions $options): void
    {
        //TODO: maybe on productionModelId change instead?
        if (!$entity->isNew()) {
            return;
        }

        $productionModelId = $entity->get('productionModelId');

        if ($productionModelId) {
            $model = $this->entityManager->getEntityById('ProductionModel', $productionModelId);

            if ($model) {
                $oldToNewMap = [];

                $operations = $this
                    ->entityManager
                    ->getRDBRepository('ProductionModel')
                    ->getRelation($model, 'operations')
                    ->find();

                foreach ($operations as $op) {
                    $newOp = $this->entityManager->getNewEntity('ProductionModelOperation');

                    $attributes = $op->getValueMap();

                    unset($attributes->id);

                    $newOp->set((array)$attributes);

                    $this->entityManager->saveEntity($newOp);

                    $this
                        ->entityManager
                        ->getRDBRepository('ProductionOrder')
                        ->getRelation($entity, 'operations')
                        ->relate($newOp);

                    $oldToNewMap[$op->getId()] = $newOp->getId();
                }

                $materials = $this
                    ->entityManager
                    ->getRDBRepository('ProductionModel')
                    ->getRelation($model, 'billOfMaterials')
                    ->find();

                foreach ($materials as $material) {
                    $newMaterial = $this->entityManager->getNewEntity('ProductionModelItem');

                    $attributes = $material->getValueMap();

                    unset($attributes->id);

                    $newMaterial->set((array)$attributes);

                    $newMaterial->set(
                        'productionModelOperationId',
                        $oldToNewMap[$material->get('productionModelOperationId') ?? null]
                    );

                    $this->entityManager->saveEntity($newMaterial);

                    $this
                        ->entityManager
                        ->getRDBRepository('ProductionOrder')
                        ->getRelation($entity, 'billOfMaterials')
                        ->relate($newMaterial);
                }
            }
        }
    }
}
