<?php

namespace Espo\Modules\Main\Classes\Select\GoodsIssue\Where\ItemConverters;

use Espo\Core\ORM\EntityManager;
use Espo\Core\Select\Where\Item;
use Espo\Core\Select\Where\ItemConverter;
use Espo\ORM\Query\Part\WhereItem as WhereClauseItem;
use Espo\ORM\Query\SelectBuilder as QueryBuilder;
use Espo\ORM\Query\Part\Condition as Cond;
use Espo\ORM\Query\Part\Expression;
use Espo\ORM\Query\Part\Join;
use PDO;

class ItemsLinkedWith implements ItemConverter
{
    public function __construct(
        private readonly EntityManager $entityManager
    ) {}

    public function convert(QueryBuilder $queryBuilder, Item $item): WhereClauseItem
    {
        $ids = $item->getValue();

        $query = $this
            ->entityManager
            ->getQueryBuilder()
            ->select('productId')
            ->distinct()
            ->from('WarehouseItem')
            ->where('id', $ids)
            ->build();

        $productIds = $this
            ->entityManager
            ->getQueryExecutor()
            ->execute($query)
            ->fetchAll(PDO::FETCH_COLUMN);

        return Cond::in(
            Cond::column('id'),
            QueryBuilder::create()
                ->select('id')
                ->from('GoodsIssue')
                ->leftJoin(
                    Join::create('WarehouseItem', 'WarehouseItem')
                        ->withConditions(
                            Cond::equal(
                                Cond::column("WarehouseItem.parentId"),
                                Cond::column('id')
                            ),
                            Cond::equal(
                                Cond::column("WarehouseItem.parentType"),
                                Expression::value('GoodsIssue')
                            )
                        )
                )
                ->leftJoin(
                    Join::create('Product', 'Product')
                        ->withConditions(
                            Cond::equal(
                                Cond::column("WarehouseItem.productId"),
                                Cond::column('Product.id')
                            ),
                        )
                )
                ->where('Product.id', $productIds)
                ->build()
        );
    }
}
