<?php

namespace Espo\Modules\Main\Tools\Api\WarehouseItem;

use Espo\Core\Api\Action;
use Espo\Core\Api\Request;
use Espo\Core\Api\Response;
use Espo\Core\Api\ResponseComposer;
use Espo\Core\Exceptions\BadRequest;
use Espo\Core\ORM\EntityManager;


class UpdateItems implements Action
{
    public function __construct(
        private EntityManager $entityManager
    )
    {
    }
    public function process(Request $request): Response
    {
        $id = $request->getRouteParam('id') ?? throw new BadRequest('Id not found');
        $quantityStr = $request->getRouteParam('quantity') ?? throw new BadRequest('Quantity not found');
        $quantity = intval($quantityStr);
        $item = $this->entityManager->getRDBRepository('SupplierOrderItem')
            ->where('id', $id)
            ->findOne();

        $item->set('deliveredQuantity', $quantity);
        $item->set('deliveredBefore', $quantity);
        $this->entityManager->saveEntity($item);

        return ResponseComposer::json(['status'=> "Success"]);

    }
}