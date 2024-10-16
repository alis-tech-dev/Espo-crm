<?php

namespace Espo\Modules\Accounting\Classes\Actions;

use Espo\Core\Action\{
    Data,
    Params
};
use Espo\Core\Di;
use Espo\Modules\Accounting\Entities\{
    Invoice,
    SalesOrder,
    Quote,
    PurchaseOrder,
    SupplierInvoice
};

class ConvertCurrency extends \Espo\Core\Action\Actions\ConvertCurrency implements Di\EntityManagerAware
{
    use Di\EntityManagerSetter;

    private const ENTITY_TYPES = [
        Invoice::ENTITY_TYPE,
        SalesOrder::ENTITY_TYPE,
        Quote::ENTITY_TYPE,
        PurchaseOrder::ENTITY_TYPE,
        SupplierInvoice::ENTITY_TYPE
    ];

    public function process(Params $params, Data $data): void
    {
        $entityType = $params->getEntityType();

        parent::process($params, $data);

        if (!in_array($entityType, self::ENTITY_TYPES)) {
            return;
        }

        $id = $params->getId();
        $entity = $this->entityManager->getEntityById($entityType, $id);

        $items = $this->entityManager
            ->getRDBRepository($entityType)
            ->getRelation($entity, 'items')
            ->find();

        foreach ($items as $item) {
            parent::process(
                new Params(
                    $entityType . 'Item',
                    $item->getId(),
                ),
                $data
            );
        }
    }
}
