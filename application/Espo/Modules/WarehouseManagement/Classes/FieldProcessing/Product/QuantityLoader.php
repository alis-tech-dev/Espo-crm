<?php

namespace Espo\Modules\WarehouseManagement\Classes\FieldProcessing\Product;

use Espo\Core\FieldProcessing\{
    Loader,
    Loader\Params};
use Espo\Modules\WarehouseManagement\Entities\{
    Warehouse,
    WarehouseItem};
use Espo\Modules\WarehouseManagement\Tools\Stock\StockHelper;
use Espo\ORM\{
    Entity,
    EntityManager,
    Query\Part\Condition as Cond,
    Query\Part\Expression\Util,
    Query\Part\Join,
    Query\Query};

class QuantityLoader implements Loader
{
    public function __construct(
        private readonly EntityManager $entityManager,
        private readonly StockHelper $stockHelper,
    ) {
    }

    public function process(Entity $entity, Params $params): void
    {
        $reservedQueryBuilder = $this->entityManager
            ->getQueryBuilder()
            ->select()
            ->from(WarehouseItem::ENTITY_TYPE)
            ->where(
                Cond::and(
                    Cond::equal(Cond::column('productId'), $entity->getId()),
                    Cond::equal(Cond::column('deleted'), false),
                )
            );
        $warehouseQueryBuilder = clone $reservedQueryBuilder;

        $reservedQuantityExpr = $this->stockHelper->prepareReservedQuantityExpression($reservedQueryBuilder);
        $reservedQueryBuilder->select($reservedQuantityExpr);

        $warehouseQueryBuilder
            ->select(Util::composeFunction('SUM', Cond::column('quantity')))
            ->join(
                Join::createWithTableTarget(Warehouse::ENTITY_TYPE, 'warehouse')
                    ->withConditions(
                        Cond::and(
                            Cond::equal(Cond::column("warehouse.id"), Cond::column('parentId')),
                            Cond::equal(Cond::column("warehouse.deleted"), false),
                        ),
                    )
            )
            ->where(Cond::equal(Cond::column('parentType'), Warehouse::ENTITY_TYPE));

        $reservedQuantity = $this->getValue($reservedQueryBuilder->build());
        $warehouseQuantity = $this->getValue($warehouseQueryBuilder->build());
        $availableQuantity = $warehouseQuantity - $reservedQuantity;

        $entity->set([
            'totalReservedQuantity' => $reservedQuantity,
            'totalWarehouseQuantity' => $warehouseQuantity,
            'totalAvailableQuantity' => $availableQuantity,
        ]);
    }

    private function getValue(Query $query): ?float
    {
        return $this->entityManager
            ->getQueryExecutor()
            ->execute($query)
            ->fetchColumn() ?? 0.0;
    }
}
