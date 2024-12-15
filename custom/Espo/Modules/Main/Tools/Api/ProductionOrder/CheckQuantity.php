<?php

namespace Espo\Modules\Main\Tools\Api\ProductionOrder;

use Espo\Core\Api\Action;
use Espo\Core\Api\Request;
use Espo\Core\Api\Response;
use Espo\Core\Api\ResponseComposer;
use Espo\Core\Exceptions\BadRequest;
use Espo\Core\ORM\EntityManager;

class CheckQuantity implements Action
{
    public function __construct(
        private EntityManager $entityManager
    )
    {
    }
    public function process(Request $request): Response
    {
        $id = $request->getRouteParam('id') ?? throw new BadRequest('Id not found');

        $item = $this->entityManager->getRDBRepository('ProductionModelItem')
            ->where('id', $id)
            ->findOne();

        $itemName = $item->get('name');

        $warehouse = $this->entityManager->getRDBRepository('Warehouse')
            ->where('name', $itemName)
            ->findOne();
        $warehouseId = $warehouse->getId();
        $availableQuantity = $warehouse->get('availableQuantity');
        $availablePv = $warehouse->get('availablePv');
        $availableBrno = $warehouse->get('availableBrno');

        $item->set('warehouseId', $warehouseId);
        $item->set('stockQuantity', $availableQuantity);
        $item->set('availablePvStock', $availablePv);
        $item->set('availableBrnoStock', $availableBrno);

        $quantity = $item->get('quantity');
        $stock = $item->get('stockQuantity');
        if ($stock == 0) {
            $item->set('stockQuantity', 0);
        }

        $this->entityManager->saveEntity($item);
        $total = $stock - $quantity;
        if ($total > 0) {
            return ResponseComposer::json(['status'=> "Success"]);
        } else {
            return ResponseComposer::json(['status'=> "Error"]);
        }
    }
}