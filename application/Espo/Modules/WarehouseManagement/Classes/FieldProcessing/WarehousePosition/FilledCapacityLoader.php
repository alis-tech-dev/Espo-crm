<?php

namespace Espo\Modules\WarehouseManagement\Classes\FieldProcessing\WarehousePosition;

use Espo\Core\FieldProcessing\Loader;
use Espo\ORM\Entity;
use Espo\Core\FieldProcessing\Loader\Params;
use Espo\Core\ORM\EntityManager;

class FilledCapacityLoader implements Loader
{
    public function __construct(
        private readonly EntityManager $entityManager
    ) {
    }

    public function process(Entity $entity, Params $params): void
    {
        $quantity = $this
            ->entityManager
            ->getRDBRepository('WarehouseItem')
            ->where('positionId', $entity->getId())
            ->sum('quantity');

        $entity->set('filledCapacity', $quantity);
    }
}
