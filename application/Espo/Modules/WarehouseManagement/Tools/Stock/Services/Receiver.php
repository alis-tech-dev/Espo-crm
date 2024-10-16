<?php

namespace Espo\Modules\WarehouseManagement\Tools\Stock\Services;

use Espo\Modules\WarehouseManagement\Entities\GoodsReceipt as GoodsReceiptEntity;
use Espo\Modules\WarehouseManagement\Entities\Warehouse;
use Espo\Modules\WarehouseManagement\Entities\WarehouseItem;
use Espo\Modules\WarehouseManagement\Tools\Stock\Manager\Factory as StockManagerFactory;
use Espo\ORM\EntityCollection;
use Espo\ORM\EntityManager;
use RuntimeException;

class Receiver
{
    public function __construct(
        private readonly EntityManager $entityManager,
        private readonly StockManagerFactory $stockManagerFactory,
    ) {
    }

    /**
     * @throws \Exception
     */
    public function receive(GoodsReceiptEntity $goodsReceipt): void
    {
        if (in_array($goodsReceipt->getStatus(), [GoodsReceiptEntity::STATUS_RECEIVED, GoodsReceiptEntity::STATUS_CANCELED])) {
            throw new RuntimeException("StockReceiverService: Goods receipt is already received or canceled");
        }

        /** @var ?Warehouse $warehouse */
        $warehouse = $this->entityManager
            ->getRDBRepository(GoodsReceiptEntity::ENTITY_TYPE)
            ->getRelation($goodsReceipt, 'warehouse')
            ->findOne();

        if (!$warehouse) {
            throw new RuntimeException("StockReceiverService: Warehouse is not set");
        }

        $stockManager = $this->stockManagerFactory->create($warehouse);

        /** @var EntityCollection<WarehouseItem> $items */
        $items = $this->entityManager
            ->getRDBRepository(GoodsReceiptEntity::ENTITY_TYPE)
            ->getRelation($goodsReceipt, 'items')
            ->find();

        try {
            foreach ($items as $item) {
                $stockManager->addStock($item);
            }

            $goodsReceipt->set('status', GoodsReceiptEntity::STATUS_RECEIVED);
        } catch (\Exception $e) {
            $goodsReceipt->set('status', GoodsReceiptEntity::STATUS_DRAFT);

            throw $e;
        } finally {
            $this->entityManager->saveEntity($goodsReceipt);
        }
    }
}
