<?php

namespace Espo\Modules\WarehouseManagement\Tools\Stock\Services;

use Espo\Modules\WarehouseManagement\Entities\Warehouse;
use Espo\Modules\WarehouseManagement\Entities\WarehouseItem;
use Espo\Modules\WarehouseManagement\Entities\WarehouseTransfer as TransferEntity;
use Espo\Modules\WarehouseManagement\Tools\Stock\Manager\Factory as StockManagerFactory;
use Espo\ORM\EntityCollection;
use Espo\ORM\EntityManager;
use RuntimeException;

class Transferer
{
    public function __construct(
        private readonly EntityManager $entityManager,
        private readonly StockManagerFactory $stockManagerFactory,
    ) {
    }

    /**
     * @throws \Exception
     */
    public function transfer(TransferEntity $transfer): void
    {
        if (in_array($transfer->getStatus(), [TransferEntity::STATUS_TRANSFERRED, TransferEntity::STATUS_CANCELED])) {
            throw new RuntimeException('StockTranfererService: Transfer already transferred or cancelled');
        }

        /** @var ?Warehouse $fromWarehouse */
        $fromWarehouse = $this->entityManager
            ->getRDBRepository(TransferEntity::ENTITY_TYPE)
            ->getRelation($transfer, 'warehouseFrom')
            ->findOne();

        /** @var ?Warehouse $toWarehouse */
        $toWarehouse = $this->entityManager
            ->getRDBRepository(TransferEntity::ENTITY_TYPE)
            ->getRelation($transfer, 'warehouseTo')
            ->findOne();

        if (!$fromWarehouse || !$toWarehouse) {
            throw new RuntimeException('StockTranfererService: From/to warehouse is not set');
        }

        $fromStockManager = $this->stockManagerFactory->create($fromWarehouse);
        $toStockManager = $this->stockManagerFactory->create($toWarehouse);

        /** @var EntityCollection<WarehouseItem> $items */
        $items = $this->entityManager
            ->getRDBRepository(TransferEntity::ENTITY_TYPE)
            ->getRelation($transfer, 'items')
            ->find();

        $this->entityManager->getTransactionManager()->start();

        try {
            foreach ($items as $item) {
                $fromStockManager->removeStock($item);
                $toStockManager->addStock($item);
            }

            $this->entityManager->getTransactionManager()->commit();

            $transfer->set('status', TransferEntity::STATUS_TRANSFERRED);
        } catch (\Exception $e) {
            $this->entityManager->getTransactionManager()->rollback();
            $transfer->set('status', TransferEntity::STATUS_DRAFT);

            throw $e;
        } finally {
            $this->entityManager->saveEntity($transfer);
        }
    }
}
