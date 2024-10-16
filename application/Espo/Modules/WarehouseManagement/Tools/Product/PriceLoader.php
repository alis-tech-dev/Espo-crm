<?php

namespace Espo\Modules\WarehouseManagement\Tools\Product;

use Espo\Core\Currency\ConfigDataProvider;
use Espo\Core\Field\Currency;
use Espo\Modules\ProductBase\Entities\Product;
use Espo\Modules\WarehouseManagement\Entities\{
    Warehouse,
    WarehouseItem};
use Espo\ORM\EntityManager;
use Espo\ORM\Query\Part\{
    Condition as Cond,
    Expression as Expr,
    Join};
use Espo\ORM\Query\Select;

class PriceLoader
{
    public function __construct(
        private readonly EntityManager $entityManager,
        private readonly ConfigDataProvider $configDataProvider,
    ) {
    }

    public function getAveragePrice(Product $product): Currency
    {
        $baseQuery = $this->getBaseQuery($product);

        $averagePriceQuery = $this->entityManager
            ->getQueryBuilder()
            ->clone($baseQuery)
            ->select(
                Expr::divide(
                    Expr::sum(
                        Expr::multiply(Cond::column('quantity'), Cond::column('priceConverted')),
                    ),
                    Expr::nullIf(Expr::sum(Cond::column('quantity')), 0) // prevents division by zero as anything / NULL = NULL
                )
            )
            ->build();

        return $this->fetchResult($averagePriceQuery);
    }

    public function getTotalPrice(Product $product): Currency
    {
        $baseQuery = $this->getBaseQuery($product);

        $totalPriceQuery = $this->entityManager
            ->getQueryBuilder()
            ->clone($baseQuery)
            ->select(
                Expr::sum(
                    Expr::multiply(Cond::column('quantity'), Cond::column('priceConverted'))
                )
            )
            ->build();

        return $this->fetchResult($totalPriceQuery);
    }

    private function getBaseQuery(Product $product): Select
    {
        return $this->entityManager
            ->getQueryBuilder()
            ->select()
            ->from(WarehouseItem::ENTITY_TYPE)
            ->join(
                Join::createWithTableTarget(Warehouse::ENTITY_TYPE, 'warehouse')->withConditions(
                    Cond::and(
                        Cond::equal(Cond::column('parentType'), Warehouse::ENTITY_TYPE),
                        Cond::equal(Cond::column('warehouse.id'), Cond::column('parentId')),
                        Cond::equal(Cond::column('warehouse.deleted'), false),
                    )
                )
            )
            ->where(
                Cond::and(
                    Cond::equal(Cond::column('productId'), $product->getId()),
                    Cond::equal(Cond::column('deleted'), false),
                )
            )
            ->build();
    }

    private function fetchResult(Select $query): Currency
    {
        $price = $this->entityManager
            ->getQueryExecutor()
            ->execute($query)
            ->fetchColumn() ?? 0.0;

        $defaultCurrency = $this->configDataProvider->getDefaultCurrency();

        return Currency::create($price, $defaultCurrency);
    }
}
