<?php

namespace Espo\Modules\Main\Hooks\ProductionOrder;

use Espo\Core\Hook\Hook\BeforeSave;
use Espo\Core\ORM\EntityManager;
use Espo\ORM\Entity;
use Espo\ORM\Repository\Option\SaveOptions;

class ChangeSalesOrderStatus implements BeforeSave
{
    public function __construct(
        private readonly EntityManager $entityManager
    ) {
    }

    public function beforeSave(Entity $entity, SaveOptions $options): void
    {
        if ($entity->isNew() || !$entity->isAttributeChanged('status')) {
            return;
        }

        $salesOrder = $this
            ->entityManager
            ->getRDBRepository('ProductionOrder')
            ->getRelation($entity, 'salesOrder')
            ->findOne();

        if (!$salesOrder) {
            return;
        }

        if ($entity->get('status') == 'Completed') {
            // Try find an order that's not completed
            $productionOrder = $this
                ->entityManager
                ->getRDBRepository('SalesOrder')
                ->getRelation($salesOrder, 'productionOrders')
                ->where('status!=', 'Completed')
                ->where('id!=', $entity->getId()) // We have to skip the current one, because it's not saved yet (we are in a beforeSave hook)
                ->findOne();

            // If there is no such order, we can set the status to completed
            if (!$productionOrder) {
                $salesOrder->set('status', 'Completed');
                $this->entityManager->saveEntity($salesOrder);
                return;
            }
        }
    }
}
