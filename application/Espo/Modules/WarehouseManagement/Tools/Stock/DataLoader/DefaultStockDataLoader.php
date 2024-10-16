<?php

namespace Espo\Modules\WarehouseManagement\Tools\Stock\DataLoader;

use Espo\Core\Exceptions\{
    BadRequest,
    Error,
    Forbidden};
use Espo\Modules\WarehouseManagement\Entities\{
    Warehouse,
    WarehouseItem};
use Espo\Modules\WarehouseManagement\Tools\Stock\InformationProvider\Factory as StockInformationProviderFactory;
use Espo\Modules\WarehouseManagement\Tools\Stock\StockHelper;
use Espo\ORM\EntityManager;
use Espo\ORM\Query\Part\Condition as Cond;

class DefaultStockDataLoader implements StockDataLoader
{
    public function __construct(
        private readonly EntityManager $entityManager,
        private readonly StockInformationProviderFactory $informationProviderFactory,
        private readonly StockHelper $stockHelper,
    ) {
    }

    /**
     * @throws BadRequest
     * @throws Forbidden
     * @throws Error
     */
    public function loadWarehouseItemQuantities(WarehouseItem $item): void
    {
        if (!$item->isWarehouseItem()) {
            throw new \RuntimeException("StockDataLoader: Item does not belong to warehouse");
        }

        if ($item->isNew()) {
            $item->set('quantityReserved', $item->get('quantityReserved') ?? 0);
            $item->set('quantityAvailable', $item->get('quantityAvailable') ?? 0);

            return;
        }

        $warehouse = $this->entityManager
            ->getRDBRepository(WarehouseItem::ENTITY_TYPE)
            ->getRelation($item, 'parent')
            ->findOne();

        if (!$warehouse) {
            throw new \RuntimeException("StockDataLoader: Warehouse is not set");
        }

        assert($warehouse instanceof Warehouse);

        $informationProvider = $this->informationProviderFactory->create($warehouse->getType());
        $mapping = $informationProvider->getItemAttributeMappingForRemove();
        $data = [];

        foreach ($mapping as $warehouseKey => $goodsIssueKey) {
            $data[$goodsIssueKey] = $item->get($warehouseKey);
        }

        $identificationQuery = $this->stockHelper->buildIdentificationQueryFromData($data);

        $queryBuilder = $this->entityManager
            ->getQueryBuilder()
            ->select()
            ->clone($identificationQuery);

        $alias = 'reservedGoodsIssue';
        $expression = $this->stockHelper->prepareReservedQuantityExpression($queryBuilder, $alias);

        $queryBuilder->where(
            Cond::equal(
                Cond::column("$alias.warehouseId"),
                $warehouse->getId(),
            )
        );

        $query = $queryBuilder->select($expression)->build();

        $quantity = $this->entityManager
            ->getQueryExecutor()
            ->execute($query)
            ->fetchColumn() ?? 0;

        $item->set('quantityReserved', $quantity);
        $item->set('quantityAvailable', $item->getQuantity() - $quantity);
    }
}
