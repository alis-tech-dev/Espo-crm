<?php

namespace Espo\Modules\Main\Tools\Api\WarehouseItem;

use Espo\Core\Api\Action;
use Espo\Core\Api\Request;
use Espo\Core\Api\Response;
use Espo\Core\Api\ResponseComposer;
use Espo\Core\Exceptions\BadRequest;
use Espo\Core\ORM\EntityManager;

class TakeItems implements Action
{
    public function __construct(
        private EntityManager $entityManager
    )
    {
    }

    public function process(Request $request): Response
    {
        $id = $request->getRouteParam('id') ?? throw new BadRequest('Параметр ID відсутній');

        $warehouseItems = $this->getWarehouseItemsByParentId($id);

        $warehouse = $this->entityManager->getRDBRepository('Warehouse')
            ->where('id', $id)
            ->findOne();

        $warehouse->set('quantity', $warehouseItems[0]);
        $warehouse->set('availableQuantity', $warehouseItems[1]);
        $this->entityManager->saveEntity($warehouse, ['skipPriceCalculation' => true]);


        return ResponseComposer::json(['count'=> $warehouseItems]);
    }

    private function getWarehouseItemsByParentId(string $parentId): array
    {
        $result = [];
        $available = [];
        $warehouseItems = $this->entityManager->getRDBRepository('WarehouseItem')->where('parentId', $parentId)->find();

        foreach ($warehouseItems as $item) {
            if ($item->get('isReserved') === false) {
                $available[] = $item;
            }
            $result[] = $item;
        }

        return [count($result), count($available)];
    }
}