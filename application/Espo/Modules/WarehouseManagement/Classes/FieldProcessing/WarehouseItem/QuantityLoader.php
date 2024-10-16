<?php

namespace Espo\Modules\WarehouseManagement\Classes\FieldProcessing\WarehouseItem;


use Espo\Core\FieldProcessing\{
    Loader,
    Loader\Params
};
use Espo\Modules\WarehouseManagement\Entities\WarehouseItem;
use Espo\Modules\WarehouseManagement\Services\WarehouseItem as WarehouseItemService;
use Espo\ORM\{
    Entity
};

class QuantityLoader implements Loader
{
    public function __construct(
        private readonly WarehouseItemService $warehouseItemService,
    ) {
    }

    public function process(Entity $entity, Params $params): void
    {
        assert($entity instanceof WarehouseItem);

        if (!$entity->isWarehouseItem()) {
            return;
        }

        $this->warehouseItemService->loadWarehouseQuantities($entity);
    }
}
