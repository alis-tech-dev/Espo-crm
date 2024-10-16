<?php

namespace Espo\Modules\WarehouseManagement\Classes\FieldProcessing\Warehouse;

use Espo\Core\FieldProcessing\{
    Loader,
    Loader\Params
};
use Espo\Modules\WarehouseManagement\Entities\Warehouse;
use Espo\ORM\{
    Entity,
    EntityManager,
    Query\Part\Condition as Cond,
    Query\Part\Expression as Expr,
    Query\Part\Join
};

class TotalValueLoader implements Loader
{
    public function __construct(
        private readonly EntityManager $entityManager,
    ) {
    }

    public function process(Entity $entity, Params $params): void
    {
        $query = $this->entityManager
            ->getQueryBuilder()
            ->select(
                Expr::sum(
                    Expr::multiply(Cond::column('items.quantity'), Cond::column('items.priceConverted')),
                )
            )
            ->from(Warehouse::ENTITY_TYPE)
            ->join(Join::createWithRelationTarget('items'))
            ->where(Cond::equal(Cond::column('id'), $entity->getId()))
            ->build();

        $totalValue = $this->entityManager
            ->getQueryExecutor()
            ->execute($query)
            ->fetchColumn() ?? 0;

        $entity->set('totalValue', $totalValue);
    }
}
