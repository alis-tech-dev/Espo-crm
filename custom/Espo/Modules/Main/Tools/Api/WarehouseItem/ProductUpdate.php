<?php

namespace Espo\Modules\Main\Tools\Api\WarehouseItem;

use Espo\Core\Api\Action;
use Espo\Core\Api\Request;
use Espo\Core\Api\Response;
use Espo\Core\Api\ResponseComposer;
use Espo\Core\Exceptions\BadRequest;
use Espo\Core\ORM\EntityManager;


class ProductUpdate implements Action
{
    public function __construct(
        private EntityManager $entityManager
    )
    {
    }
    public function process(Request $request): Response
    {
        $id = $request->getRouteParam('id') ?? throw new BadRequest("ID not found.");
        $field = $request->getRouteParam('field') ?? throw new BadRequest("Field not found.");
        $value = $request->getRouteParam('value') ?? throw new BadRequest("Value not found");

        if ($field == 'category') {
            return ResponseComposer::json(['status' => 'Error']);
        } elseif ($field == 'productCode') {
            $field = 'name';
        } elseif ($field == 'productName') {
            $field = 'productCode';
        } elseif ($field == 'productType') {
            $field = 'type';
        }
        // TODO зробити логіку для attachments

        $warehouse = $this->entityManager->getRDBRepository('Warehouse')
            ->where('id', $id)
            ->findOne();
        $productId = $warehouse->get('productId');

        $product = $this->entityManager->getRDBRepository('Product')
            ->where('id', $productId)
            ->findOne();

        if ($product) {
            $product->set($field, $value);
            $this->entityManager->saveEntity($product);
            return ResponseComposer::json(['status' => 'Success']);
        } else {
            throw new BadRequest("Product not found.");
        }
    }
}