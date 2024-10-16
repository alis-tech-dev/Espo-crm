<?php

namespace Espo\Modules\WarehouseManagement\Hooks\Warehouse;

use Espo\Core\Hook\Hook\AfterRemove;
use Espo\Modules\WarehouseManagement\Entities\Warehouse;
use Espo\ORM\Entity;
use Espo\ORM\EntityManager;
use Espo\ORM\Repository\Option\RemoveOptions;

class RemoveItems implements AfterRemove
{
    public function __construct(
        private readonly EntityManager $entityManager,
    ) {
    }

    public function afterRemove(Entity $entity, RemoveOptions $options): void
    {
        if ($options->get('keepItems')) {
            return;
        }

        $items = $this->entityManager
            ->getRDBRepositoryByClass(Warehouse::class)
            ->getRelation($entity, 'items')
            ->find();

        foreach ($items as $item) {
            $this->entityManager->removeEntity($item);
        }
    }
}
