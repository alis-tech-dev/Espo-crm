<?php

namespace Espo\Modules\Production\Classes\FieldProcessing\ProductionOrder;

use Espo\Core\FieldProcessing\Loader;
use Espo\ORM\Entity;
use Espo\Core\FieldProcessing\Loader\Params;
use Espo\ORM\EntityManager;

class ActualQuantityLoader implements Loader {

    public function __construct(
        private readonly EntityManager $entityManager
    ) {}

    public function process(Entity $entity, Params $params): void
    {
//        $recordList = $entity->get('billOfMaterialsRecordList') ?? [];
//
//        if (count($recordList) > 0) {
//            $quantityProduced = PHP_INT_MAX;
//
//            foreach ($recordList as $item) {
//                $works = $this
//                    ->entityManager
//                    ->getRDBRepository('ProductionOrder')
//                    ->getRelation($entity, 'workPerformed')
//                    ->where('operationId', $item->productionModelOperationId)
//                    ->find();
//
//                $totalPerformed = 0;
//
//                foreach ($works as $work) {
//                    $totalPerformed += $work->get('producedAmount');
//                }
//
//                if ($totalPerformed < $quantityProduced) {
//                    $quantityProduced = $totalPerformed;
//                }
//
//                $item->quantityWithdrawnActual = $item->quantity * $totalPerformed;
//            }
//        } else {
//            $quantityProduced = 0;
//        }
//
//        $entity->set('quantityProduced', $quantityProduced);
    }

}