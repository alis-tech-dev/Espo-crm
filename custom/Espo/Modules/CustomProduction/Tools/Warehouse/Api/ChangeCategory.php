<?php

namespace Espo\Modules\CustomProduction\Tools\Warehouse\Api;

use Espo\Core\Api\Action;
use Espo\Core\Api\Request;
use Espo\Core\Api\Response;
use Espo\Core\Api\ResponseComposer;
use Espo\Core\Exceptions\BadRequest;
use Espo\ORM\EntityManager;

class ChangeCategory implements Action
{
    public function __construct(
        private readonly EntityManager $entityManager
    )
    {
    }
    public function process(Request $request): Response
    {
        try {
            $this->entityManager->getTransactionManager()->start();
            $id = $request->getRouteParam('id') ?? throw new BadRequest('ID not found');
            $categoryId = $request->getRouteParam('categoryId') ?? throw new BadRequest('ID not found');

            $warehouse = $this->entityManager->getRDBRepository('Warehouse')
                ->where('id', $id)
                ->findOne();
            $productId = $warehouse->get('productId');

            $product = $this->entityManager->getRepository('Product')
                ->where('id', $productId)
                ->findOne();

            $product->set('categoryId', $categoryId);
            $this->entityManager->saveEntity($product);
            $this->entityManager->getTransactionManager()->commit();
            return ResponseComposer::json(['status' => 'Success']);
        } catch (\Exception $e) {
            $this->entityManager->getTransactionManager()->rollback();
            throw new BadRequest($e);
        }
    }
}