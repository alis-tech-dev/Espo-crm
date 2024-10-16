<?php

namespace Espo\Modules\Reclamations\Hooks\SupplierReclamation;

use Espo\Core\Hook\Hook\AfterSave;
use Espo\Core\ORM\EntityManager;
use Espo\ORM\Entity;
use Espo\ORM\Repository\Option\SaveOptions;

class CreateGoodsIssue implements AfterSave
{
    public function __construct(
        private readonly EntityManager $entityManager
    ) {
    }

    public function afterSave(Entity $entity, SaveOptions $options): void
    {
        /*if ($entity->isNew()) {
            $goodsIssue = $this->entityManager->createEntity(
                GoodsIssue::ENTITY_TYPE,
                [
                    'name' => 'Výdejka k reklamaci u dodavatele',
                    'selectedItemsRecordList' => [
                        (object)[
                            'productId' => $entity->get('productId'),
                            'productName' => $entity->get('productName'),
                            'name'  => $entity->get('productName'),
                            'quantity' => 1
                        ]
                    ]
                ]
            );

            $this
                ->entityManager
                ->getRDBRepository('SupplierReclamation')
                ->getRelation($entity, 'goodsIssue')
                ->relate($goodsIssue);
        }*/
    }
}
