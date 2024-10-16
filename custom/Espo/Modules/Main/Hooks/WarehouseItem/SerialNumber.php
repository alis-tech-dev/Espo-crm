<?php


namespace Espo\Modules\Main\Hooks\WarehouseItem;

use Espo\Core\Hook\Hook\BeforeSave;
use Espo\Core\ORM\EntityManager;
use Espo\Entities\NextNumber;
use Espo\Modules\ProductBase\Entities\Product;
use Espo\ORM\Entity;
use Espo\ORM\Repository\Option\SaveOptions;
use Espo\Modules\WarehouseManagement\Tools\Stock\Manager\DefaultStockManager;
class SerialNumber implements BeforeSave
{
    public function __construct(
        private readonly EntityManager $entityManager,

    ) {
    }

    public function beforeSave(Entity $entity, SaveOptions $options): void
    {
        if (!$options->get(DefaultStockManager::TRIGGERED_BY_STOCK_MANAGER)) {
            return;
        }

        $product = $this
            ->entityManager
            ->getRDBRepository('WarehouseItem')
            ->getRelation($entity, 'product')
            ->findOne();

        if (!$product) {
            return;
        }

        $this->entityManager->getTransactionManager()->start();

        $maxSerialNumber = $this->getMaxSerialNumberForProduct($product);

        $nextNumberAdd = $this->entityManager
            ->getRDBRepository(NextNumber::ENTITY_TYPE)
            ->where([
                'fieldName' => 'serialNumber',
                'entityType' => 'WarehouseItem',
                'productId' => $product->getId(),
            ])
            ->forUpdate()
            ->findOne();

        if (!$nextNumberAdd) {
            $nextNumberAdd = $this->entityManager->getNewEntity(NextNumber::ENTITY_TYPE);

            $nextNumberAdd->set([
                'fieldName' => 'serialNumber',
                'entityType' => 'WarehouseItem',
                'productId' => $product->getId(),
                'value' => $maxSerialNumber + 1
            ]);
        }

        $entity->set('serialNumber', $this->composeNumberAttribute($product, $nextNumberAdd));

        $value = $nextNumberAdd->get('value');

        if (!$value) {
            $value = $maxSerialNumber + 1;
        }

        $value++;

        $nextNumberAdd->set('value', $value);

        $this->entityManager->saveEntity($nextNumberAdd);

        $this->entityManager->getTransactionManager()->commit();
    }

    private function getMaxSerialNumberForProduct(Product $product): int
    {
        $result = $this->entityManager
            ->getRDBRepository('WarehouseItem')
            ->where([
                'productId' => $product->getId()
            ])
            ->select(['serialNumber'])
            ->find(['orderBy' => ['serialNumber', 'desc'], 'limit' => 1]);

        if (!empty($result) && isset($result[0])) {
            $serialNumber = $result[0]->get('serialNumber');
            $numberPart = preg_replace('/\D/', '', $serialNumber);
            return (int) $numberPart;
        }

        return 0;
    }

    public function composeNumberAttribute(Product $product, NextNumber $nextNumber): string
    {
        return $product->get('name') .'_' . str_pad($nextNumber->get('value'), 5, '0', STR_PAD_LEFT);
    }
}
