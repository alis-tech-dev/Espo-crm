<?php

namespace Espo\Modules\Production\Hooks\WorkPerformed;

use Espo\Core\Hook\Hook\BeforeSave;
use Espo\Core\Record\CreateParams;
use Espo\ORM\Entity;
use Espo\ORM\Repository\Option\SaveOptions;
use Espo\Modules\WarehouseManagement\Services\GoodsIssue as GoodsIssueService;
use Espo\Modules\WarehouseManagement\Entities\GoodsIssue as GoodsIssueEntity;
use Espo\Core\ORM\EntityManager;
use LogicException;

class CreateGoodsIssue implements BeforeSave
{
    public function __construct(
        private readonly EntityManager $entityManager,
        private readonly GoodsIssueService $goodsIssueService
    ){}

    public function beforeSave(Entity $entity, SaveOptions $options): void
    {
        $productionOrderId = $entity->get('productionOrderId') ?? throw new LogicException();
        $productionOrder = $this->entityManager->getEntityById('ProductionOrder', $productionOrderId) ?? throw new LogicException();

        $items = [];

        $operationId = $entity->get('operationId') ?? throw new LogicException();
        $operation = $this->entityManager->getEntityById('ProductionModelOperation', $operationId) ?? throw new LogicException();

        $materials = $this
            ->entityManager
            ->getRDBRepository('ProductionModelOperation')
            ->getRelation($operation, 'productionModelItems')
            ->find();

        foreach ($materials as $material) {
            $items[] = (object)[
                'productId' => $material->get('productId'),
                'quantity' => $material->get('quantity') * $entity->get('producedAmount')
            ];
        }

        $this->goodsIssueService->create((object)[
            'name' => 'Výdejka k výrobnímu příkazu',
            'status' => GoodsIssueEntity::STATUS_PROCESSING, //TODO change to STATUS_PROCESSING
            'warehouseId' => $productionOrder->get('materialWarehouseId'),
            'parentId' => $productionOrder->getId(),
            'parentType' => $productionOrder->getEntityType(),
            'selectedItemsRecordList' => $items
        ], CreateParams::create());
    }
}