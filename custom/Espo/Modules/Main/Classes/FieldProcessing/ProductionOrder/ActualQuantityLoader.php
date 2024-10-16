<?php

namespace Espo\Modules\Main\Classes\FieldProcessing\ProductionOrder;

//use Espo\Core\FieldProcessing\Loader;
//use Espo\ORM\Entity;
//use Espo\Core\FieldProcessing\Loader\Params;
//use Espo\ORM\EntityManager;
//
//class ActualQuantityLoader implements Loader
//{
//    public function __construct(
//        private readonly EntityManager $entityManager
//    ) {
//    }
//
//    public function process(Entity $entity, Params $params): void
//    {
//        $quantityProduced = $entity->get('quantityProduced');
//        $productionOrderId = $entity->getId();
//
//        $works = $this
//            ->entityManager
//            ->getRDBRepository('WorkPerformed')
//            ->where('productionOrderId', $productionOrderId)
//            ->find();
//
//        $totalPerformed = 0;
//        if ($works) {
//            foreach ($works as $work) {
//                $producedAmount = $work->get('producedAmount');
//                $totalPerformed += $producedAmount;
//            }
//        }
//        $totalProduced = $quantityProduced + $totalPerformed;
//        $entity->set('quantityProduced', $totalProduced);
//        $this->entityManager->saveEntity($entity);
//    }
//}





use Espo\Core\FieldProcessing\Loader;
use Espo\ORM\Entity;
use Espo\Core\FieldProcessing\Loader\Params;
use Espo\ORM\EntityManager;

class ActualQuantityLoader implements Loader
{

    public function __construct(
        private readonly EntityManager $entityManager
    ) {
    }

    public function process(Entity $entity, Params $params): void
    {
        $quantityProduced = PHP_INT_MAX;

        $works = $this
            ->entityManager
            ->getRDBRepository('ProductionOrder')
            ->getRelation($entity, 'workPerformed')
            ->find();
        $productionOrderId = $entity->getId();
//        $works = $this
//            ->entityManager
//            ->getRDBRepository('WorkPerformed')
//            ->where('productionOrderId', $productionOrderId)
//            ->having('deleted', 0)
//            ->find();

        $totalPerformed = 0;

        foreach ($works as $work) {
            $totalPerformed += $work->get('producedAmount');
        }

        if ($totalPerformed < $quantityProduced) {
            $quantityProduced = $totalPerformed;
        }
        $entity->set('quantityProduced', $quantityProduced);
        $this->entityManager->saveEntity($entity);
    }
}
