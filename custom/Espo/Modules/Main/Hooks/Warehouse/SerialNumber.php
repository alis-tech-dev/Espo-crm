<?php

namespace Espo\Modules\Main\Hooks\Warehouse;

use Espo\Core\ORM\EntityManager;
use Espo\Entities\NextNumber;
use Espo\Modules\ProductBase\Entities\Product;
use Espo\Modules\WarehouseManagement\Entities\{Warehouse, WarehouseItem};

class SerialNumber
{
    public function __construct(
        private readonly EntityManager $entityManager,
    ) {
    }

    public function beforeAddStock(Warehouse $warehouse, array $options, array $hookData): void
    {
        $warehouseItem = $hookData['item'];

        $product = $this
            ->entityManager
            ->getRDBRepository('WarehouseItem')
            ->getRelation($warehouseItem, 'product')
            ->findOne();

        if (!$product) {
            return;
        }

        $this->entityManager->getTransactionManager()->start();

        $nextNumber = $this->entityManager
            ->getRDBRepository(NextNumber::ENTITY_TYPE)
            ->where([
                'fieldName' => 'serialNumber',
                'entityType' =>  'WarehouseItem',
            ])
            ->forUpdate()
            ->findOne();

        if (!$nextNumber) {
            $nextNumber = $this->entityManager->getNewEntity(NextNumber::ENTITY_TYPE);

            $nextNumber->set([
                'fieldName' => 'serialNumber',
                'entityType' =>  'WarehouseItem',
            ]);
        }

        $warehouseItem->set('serialNumber', $this->composeNumberAttribute($product, $nextNumber));

        $value = $nextNumber->get('value');

        if (!$value) {
            $value = 1;
        }

        $value++;

        $nextNumber->set('value', $value);

        $this->entityManager->saveEntity($nextNumber);

        $this->entityManager->getTransactionManager()->commit();
    }

    public function composeNumberAttribute(Product $product, NextNumber $nextNumber): string
    {
        return $product->get('name') . '_' . $nextNumber->get('value');
    }
}
