<?php

namespace Espo\Modules\Production\Hooks\WorkPerformed;

use Espo\Core\FieldProcessing\ReadLoadProcessor;
use Espo\Core\Hook\Hook\AfterSave;
use Espo\Core\Hook\Hook\BeforeSave;
use Espo\ORM\Entity;
use Espo\ORM\Repository\Option\SaveOptions;
use Espo\Core\ORM\EntityManager;
use Espo\Modules\WarehouseManagement\Services\GoodsReceipt as GoodsReceiptService;
use Espo\Modules\WarehouseManagement\Entities\GoodsReceipt as GoodsReceiptEntity;
use Espo\Modules\Production\Services\ProductionOrder as ProductionOrderService;
use Espo\Core\Record\CreateParams;
use Espo\Core\Record\ReadParams;

class ChangeStatuses implements AfterSave
{
    public function __construct(
        private readonly EntityManager $entityManager,
        private readonly ProductionOrderService $productionOrderService,
        private readonly GoodsReceiptService $goodsReceiptService
    ) {
    }

    // TODO: this should probably be an afterRelate hook
    public function afterSave(Entity $entity, SaveOptions $options): void
    {
        $productionOrder = $this
            ->productionOrderService
            ->read($entity->get('productionOrderId'), ReadParams::create());

        $status = $productionOrder->get('status');

        // First check if we can complete
        if ($productionOrder->get('quantityPlanned') <= $productionOrder->get('quantityProduced')) {
            $productionOrder->set('productionStatus', 'Completed');

            $this->entityManager->saveEntity($productionOrder);
            // Only then check if status is draft
        } else if ($status === 'Draft') {
            $productionOrder->set('status', 'Ongoing');

            $this->entityManager->saveEntity($productionOrder);
        }
    }
}
