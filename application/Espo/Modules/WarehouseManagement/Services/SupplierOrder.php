<?php

namespace Espo\Modules\WarehouseManagement\Services;

use Espo\Core\Exceptions\BadRequest;
use Espo\Core\Exceptions\Forbidden;
use Espo\Modules\WarehouseManagement\Tools\GenerateSupplierOrderXlsx;

class SupplierOrder extends \Espo\Core\Templates\Services\BasePlus
{
    public function getTotalAmount(string $id): float
    {

        $entity = $this->entityManager->getEntity('SupplierOrder', $id);

        if (!$entity) {
            throw new BadRequest();
        }

        $items = [];

        foreach ($entity->get('items') as $item) {
            if ($item->get('productId')) {
                $items[] =  [
                    "productId" => $item->get('productId'),
                    "quantity" => $item->get('quantity')
                ];
            }
        }

        $products = $this->entityManager->getRDBRepository('Product')->where([
            'id' => array_column($items, 'productId')
        ])->find();

        foreach ($products as $product) {

            $items = array_map(function ($item) use ($product) {
                if ($item['productId'] === $product->get('id')) {
                    $item['purchasePrice'] = $product->get('purchasePrice') ?? 0;
                }
                return $item;
            }, $items);
        }

        $totalAmount = 0;

        foreach ($items as $item) {

            $totalAmount += $item['purchasePrice'] * $item['quantity'];
        }

        return $totalAmount;
    }

    public function generateXlsx(string $id): string
    {
        if (!$this->acl->checkScope($this->entityType)) {
            throw new Forbidden();
        }

        $generator = $this->injectableFactory->create(GenerateSupplierOrderXlsx::class);
        return $generator->generate($id);
    }
}
