<?php

namespace Espo\Modules\Production\Services;

use Espo\Core\Record\ReadParams;
use Espo\Core\Select\SearchParams;
use Espo\Modules\ProductBase\Entities\Product;
use Espo\Core\Select\Where\Item as WhereItem;
use stdClass;

class ProductionOrder extends \Espo\Core\Templates\Services\Base
{
    public function getChildrenOf(string $productId): stdClass
    {


        $product = $this->recordServiceContainer->get(Product::ENTITY_TYPE)->read($productId, ReadParams::create());

        $defaultProductionModel = $this
            ->entityManager
            ->getRDBRepository(Product::ENTITY_TYPE)
            ->getRelation($product, 'defaultProductionModel')
            ->findOne();

        if (!$defaultProductionModel) {
            return (object) [
                'total' => 0,
                'list' => [],
            ];
        }

        $GLOBALS['log']->debug($defaultProductionModel->getId());

        $bills = $this
            ->entityManager
            ->getRDBRepository('ProductionModel')
            ->getRelation($defaultProductionModel, 'billOfMaterials')
            ->find();

        $productIds = [];

        foreach ($bills as $bill) {
            $productIds[] = $bill->get('productId');
        }

        $GLOBALS['log']->debug('rkmgrg', $productIds);

        $searchParams = SearchParams
            ::create()
            ->withWhereAdded(
                WhereItem
                    ::createBuilder()
                    ->setAttribute('product')
                    ->setType(WhereItem\Type::IS_LINKED_WITH)
                    ->setValue($productIds)
                    ->build()
            );

        $recordCollection = $this->find($searchParams);

        $GLOBALS['log']->debug('rkmgrg', $recordCollection->getValueMapList());

        return (object) [
            'total' => $recordCollection->getTotal(),
            'list' => $recordCollection->getValueMapList(),
        ];
    }
}
