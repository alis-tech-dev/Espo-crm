<?php

namespace Espo\Modules\Main\Hooks\GoodsIssue;

use Espo\Core\Hook\Hook\AfterSave;
use Espo\Core\ORM\EntityManager;
use Espo\ORM\Entity;
use Espo\ORM\Repository\Option\SaveOptions;

class LinkToReclamation implements AfterSave
{
    public function __construct(
        private readonly EntityManager $entityManager
    ) {
    }

    public function afterSave(Entity $entity, SaveOptions $options): void
    {
        if ($entity->isNew()) {
            $parent =
                $this
                ->entityManager
                ->getRDBRepository('GoodsIssue')
                ->getRelation($entity, 'parent')
                ->findOne();

            if ($parent && $parent->getEntityType() === 'GoodsReceipt') {
                $reclamation = $this
                    ->entityManager
                    ->getRDBRepository('Reclamation')
                    ->getRelation($parent, 'parent')
                    ->findOne();

                if ($reclamation && $reclamation->getEntityType() === 'Reclamation') {
                    $this
                        ->entityManager
                        ->getRDBRepository('GoodsIssue')
                        ->getRelation($entity, 'parent')
                        ->relate($reclamation);

                    $this
                        ->entityManager
                        ->getRDBRepository('Reclamation')
                        ->getRelation($reclamation, 'goodsIssue')
                        ->relate($entity);

                    $supplierReclamations = $this
                        ->entityManager
                        ->getRDBRepository('Reclamation')
                        ->getRelation($reclamation, 'supplierReclamations')
                        ->find();

                    foreach ($supplierReclamations as $supplierReclamation) {
                        $this
                            ->entityManager
                            ->getRDBRepository('SupplierReclamation')
                            ->getRelation($supplierReclamation, 'goodsIssue')
                            ->relate($entity);
                    }
                }
            }
        }
    }
}
