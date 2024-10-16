<?php

namespace Espo\Modules\WarehouseManagement\Classes\FieldProcessing\Product;

use Espo\Core\FieldProcessing\Loader;
use Espo\ORM\Entity;
use Espo\Core\FieldProcessing\Loader\Params;
use Espo\Core\ORM\EntityManager;

class OrderedLoader implements Loader
{
    public function __construct(
        private readonly EntityManager $entityManager
    ) {
    }

    public function process(Entity $entity, Params $params): void
    {
        $ordered = (bool)$this
            ->entityManager
            ->getRDBRepository('SupplierOrderItem')
            ->where('productId', $entity->getId())
            ->findOne();

        $entity->set('ordered', true);
    }
}
