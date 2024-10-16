<?php

namespace Espo\Modules\WarehouseManagement\Services;

use Espo\Core\Di;
use Espo\Modules\WarehouseManagement\Entities\{
    Warehouse,
    WarehouseItem as WarehouseItemEntity
};
use Espo\Modules\WarehouseManagement\Tools\Stock\DataLoader\Factory as StockDataLoaderFactory;

class WarehouseItem extends \Espo\Core\Templates\Services\Base implements Di\InjectableFactoryAware
{
    use Di\InjectableFactorySetter;

    private ?StockDataLoaderFactory $stockDataLoaderFactory = null;

    public function checkControllerActionAccess(string $action, string $id): bool
    {
        /** @var WarehouseItemEntity $entity */
        $entity = $this->entityManager->getEntityById(WarehouseItemEntity::ENTITY_TYPE, $id);

        if (!$entity || !$entity->isWarehouseItem()) {
            return true;
        }

        return !in_array($action, ['update', 'delete', 'create']);
    }

    public function loadWarehouseQuantities(WarehouseItemEntity $item): void
    {
        if (!$item->isWarehouseItem()) {
            throw new \RuntimeException("StockDataLoader: Item does not belong to warehouse");
        }

        // Note: it is not possible to use RDBRelation as $item may be new (w/o ID)
        $warehouseId = $item->get('parentId');

        if (!$warehouseId) {
            throw new \RuntimeException("StockDataLoader: Item does not belong to warehouse");
        }

        /** @var Warehouse $warehouse */
        $warehouse = $this->entityManager->getEntityById(Warehouse::ENTITY_TYPE, $warehouseId);

        $stockDataLoader = $this->getStockLoaderFactory()->create($warehouse->getType());
        $stockDataLoader->loadWarehouseItemQuantities($item);
    }

    private function getStockLoaderFactory(): StockDataLoaderFactory
    {
        return $this->stockDataLoaderFactory ??= $this->injectableFactory->create(StockDataLoaderFactory::class);
    }
}
