<?php

namespace Espo\Modules\WarehouseManagement\Tools\Product\StockInfo;

use Espo\Core\Acl;
use Espo\Core\Exceptions\{
    BadRequest,
    Error,
    Forbidden,
    ForbiddenSilent
};
use Espo\Core\FieldProcessing\ListLoadProcessor;
use Espo\Core\FieldProcessing\Loader\Params as FieldLoaderParams;
use Espo\Core\Record\ServiceContainer as RecordServiceContainer;
use Espo\Core\Select\{
    SearchParams,
    SelectBuilderFactory,
    Where\Item,
    Where\ItemBuilder
};
use Espo\Modules\ProductBase\Entities\Product;
use Espo\Modules\WarehouseManagement\Entities\{
    Warehouse,
    WarehouseItem
};
use Espo\Modules\WarehouseManagement\Services\WarehouseItem as WarehouseItemService;
use Espo\ORM\{
    EntityManager,
    Query\Part\Condition as Cond,
    Query\Part\Join
};

class Service
{
    public function __construct(
        private readonly EntityManager $entityManager,
        private readonly Acl $acl,
        private readonly SelectBuilderFactory $selectBuilderFactory,
        private readonly ListLoadProcessor $listLoadProcessor,
        private readonly RecordServiceContainer $recordServiceContainer,
    ) {
    }

    /**
     * @throws BadRequest
     * @throws Forbidden
     * @throws Error
     * @throws ForbiddenSilent
     */
    public function getStockInfo(string $productId, SearchParams $searchParams): Result
    {
        if (!$this->acl->checkScope(Product::ENTITY_TYPE, Acl\Table::ACTION_READ)) {
            throw new ForbiddenSilent();
        }

        $query = $this->selectBuilderFactory
            ->create()
            ->from(WarehouseItem::ENTITY_TYPE)
            ->withStrictAccessControl()
            ->withSearchParams($searchParams)
            ->withWhere(
                ItemBuilder::create()
                    ->setAttribute('productId')
                    ->setType(Item\Type::EQUALS)
                    ->setValue($productId)
                    ->build()
            )
            ->withWhere(
                ItemBuilder::create()
                    ->setAttribute('parentType')
                    ->setType(Item\Type::EQUALS)
                    ->setValue(Warehouse::ENTITY_TYPE)
                    ->build()
            )
            ->build();

        $collection = $this->entityManager
            ->getCollectionFactory()
            ->create(WarehouseItem::ENTITY_TYPE);

        $warehouses = $this->entityManager
            ->getRDBRepositoryByClass(Warehouse::class)
            ->join(Join::createWithRelationTarget('items'))
            ->where(Cond::equal(Cond::column('items.productId'), $productId))
            ->distinct()
            ->find();

        $additionalData = (object)[
            'groupList' => [],
        ];

        $repository = $this->entityManager->getRDBRepositoryByClass(WarehouseItem::class);

        /** @var WarehouseItemService $warehouseItemService */
        $warehouseItemService = $this->recordServiceContainer->get(WarehouseItem::ENTITY_TYPE);

        /** @var Warehouse $warehouse */
        foreach ($warehouses as $warehouse) {
            $warehouseItemsQuery = $this->entityManager
                ->getQueryBuilder()
                ->select()
                ->clone($query)
                ->where(Cond::equal(Cond::column('parentId'), $warehouse->getId()))
                ->build();

            $groupData = (object)[
                'warehouse' => $warehouse->getValueMap(),
            ];

            $subCollection = $repository->clone($warehouseItemsQuery)->find();
            $subCount = $repository->clone($warehouseItemsQuery)->count();

            $loadProcessorParams = FieldLoaderParams::create()->withSelect($searchParams->getSelect());

            foreach ($subCollection as $item) {
                $this->listLoadProcessor->process($item, $loadProcessorParams);

                $warehouseItemService->loadWarehouseQuantities($item);
                $warehouseItemService->prepareEntityForOutput($item);

                $collection[] = $item;
            }

            $groupData->list = $subCollection->getValueMapList();
            $groupData->total = $subCount;

            $additionalData->groupList[] = $groupData;
        }

        $count = $repository->clone($query)->count();

        return new Result($collection, $count, $additionalData);
    }
}
