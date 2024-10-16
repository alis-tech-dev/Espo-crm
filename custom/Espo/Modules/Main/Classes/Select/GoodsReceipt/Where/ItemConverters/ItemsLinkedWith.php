<?php

namespace Espo\Modules\Main\Classes\Select\GoodsReceipt\Where\ItemConverters;

use Espo\Core\Select\Where\Item;
use Espo\Core\Select\Where\ItemConverter;
use Espo\Entities\User;
use Espo\ORM\Query\Part\WhereClause;
use Espo\ORM\Query\Part\WhereItem as WhereClauseItem;
use Espo\ORM\Query\SelectBuilder as QueryBuilder;
use Espo\ORM\Query\Part\Condition as Cond;
use Espo\ORM\Query\Part\Expression;
use Espo\ORM\Query\Part\Join;


class ItemsLinkedWith implements ItemConverter
{
    public function convert(QueryBuilder $queryBuilder, Item $item): WhereClauseItem
    {
        $ids = $item->getValue();

        return Cond::in(
            Cond::column('id'),
            QueryBuilder::create()
                ->select('id')
                ->from('GoodsReceipt')
                ->leftJoin(
                    Join::create('WarehouseItem', 'WarehouseItem')
                        ->withConditions(
                            Cond::equal(
                                Cond::column("WarehouseItem.parentId"),
                                Cond::column('id')
                            ),
                            Cond::equal(
                                Cond::column("WarehouseItem.parentType"),
                                Expression::value('GoodsReceipt')
                            )
                        )
                )
                ->where('WarehouseItem.id', $ids)
                ->build()
        );
    }
}
