<?php

namespace Espo\Modules\WarehouseManagement\Tools\Stock;

use Espo\Core\Exceptions\{
    BadRequest,
    Error,
    Forbidden};
use Espo\Core\Select\{
    SelectBuilderFactory,
    Where\Item as WhereItem};
use Espo\Core\Utils\Config;
use Espo\Core\Utils\FieldUtil;
use Espo\Modules\ProductBase\Entities\Product;
use Espo\Modules\WarehouseManagement\Entities\{
    GoodsIssue,
    WarehouseItem};
use Espo\ORM\EntityManager;
use Espo\ORM\Query\{
    Part\Condition as Cond,
    Part\Expression,
    Part\Expression\Util as ExprUtil,
    Part\Join,
    Select,
    SelectBuilder};

class StockHelper
{

    /** @var string[] */
    private array $stockableTypes = [];

    public function __construct(
        private readonly EntityManager $entityManager,
        private readonly Config $config,
        private readonly SelectBuilderFactory $selectBuilderFactory,
        private readonly FieldUtil $fieldUtil,
    ) {
    }

    public function isProductStockable(Product $product): bool
    {
        if (!$this->stockableTypes) {
            $this->stockableTypes = $this->entityManager
                ->getDefs()
                ->getEntity(Product::ENTITY_TYPE)
                ->getField('type')
                ->getParam('stockableTypes') ?? [];
        }

        return in_array($product->getType(), $this->stockableTypes, true);
    }

    public function getGroupByAttributes(): array
    {
        $fields = $this->config->get('warehouseGroupByFieldList') ?? [];
        $fields[] = 'product';

        $groupByAttributes = [];

        foreach ($fields as $field) {
            $attributes = $this->fieldUtil->getActualAttributeList(WarehouseItem::ENTITY_TYPE, $field);
            foreach ($attributes as $attribute) {
                $groupByAttributes[] = $attribute;
            }
        }

        return $groupByAttributes;
    }

    /**
     * @throws BadRequest
     * @throws Forbidden
     * @throws Error
     */
    public function buildIdentificationQueryFromData(array $attributes): Select
    {
        $selectBuilder = $this->selectBuilderFactory->create()
            ->from(WarehouseItem::ENTITY_TYPE);

        foreach ($attributes as $field => $value) {
            $selectBuilder->withWhere(
                WhereItem::createBuilder()
                    ->setType(WhereItem\Type::EQUALS)
                    ->setAttribute($field)
                    ->setValue($value)
                    ->build()
            );
        }

        return $selectBuilder->build();
    }

    /**
     * Prepares WarehouseItem query builder for getting reserved quantity.
     *
     * @param SelectBuilder $queryBuilder WarehouseItem query builder to join the goods issues to
     * @param string        $alias        The alias to use for the joined reserved goods issues
     *
     * @return Expression The expression that sums the quantity of the reserved goods issues
     */
    public function prepareReservedQuantityExpression(SelectBuilder $queryBuilder, string $alias = 'reservedGoodsIssue'): Expression
    {
        if (!$queryBuilder->hasJoinAlias($alias)) {
            $queryBuilder
                ->join(
                    Join::create(GoodsIssue::ENTITY_TYPE, $alias)
                        ->withConditions(
                            Cond::and(
                                Cond::equal(Cond::column("{$alias}.id"), Cond::column('parentId')),
                                Cond::equal(Cond::column("{$alias}.status"), GoodsIssue::STATUS_RESERVED),
                                Cond::equal(Cond::column("{$alias}.deleted"), false),
                            ),
                        )
                )
                ->where(
                    Cond::equal(
                        Cond::column('parentType'),
                        GoodsIssue::ENTITY_TYPE
                    )
                );
        }

        return ExprUtil::composeFunction('SUM', Expression::column('quantity'));
    }
}
