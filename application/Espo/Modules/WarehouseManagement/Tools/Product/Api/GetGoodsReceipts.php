<?php

namespace Espo\Modules\WarehouseManagement\Tools\Product\Api;

use Espo\Core\Api\{
    Action,
    Request,
    Response,
    ResponseComposer
};
use Espo\Core\Exceptions\{
    BadRequest,
    NotFound
};
use Espo\Core\Record\SearchParamsFetcher;
use Espo\Core\Record\Select\ApplierClassNameListProvider;
use Espo\Core\Record\ServiceContainer as RecordServiceContainer;
use Espo\Core\Select\SelectBuilderFactory;
use Espo\Modules\ProductBase\Entities\Product;
use Espo\Modules\WarehouseManagement\Entities\GoodsReceipt;
use Espo\ORM\EntityManager;

class GetGoodsReceipts implements Action
{
    protected const SCOPE = GoodsReceipt::ENTITY_TYPE;
    protected const LINK = 'items';

    public function __construct(
        private readonly EntityManager $entityManager,
        private readonly SearchParamsFetcher $searchParamsFetcher,
        private readonly RecordServiceContainer $recordServiceContainer,
        private readonly SelectBuilderFactory $selectBuilderFactory,
        private readonly ApplierClassNameListProvider $applierClassNameListProvider,
    ) {
    }

    public function process(Request $request): Response
    {
        $id = $request->getRouteParam('id');

        if (!$id) {
            throw new BadRequest();
        }

        $product = $this->entityManager->getEntityById(Product::ENTITY_TYPE, $id);

        if (!$product) {
            throw new NotFound();
        }

        $searchParams = $this->searchParamsFetcher->fetch($request);
        $selectBuilder = $this->selectBuilderFactory->create();

        $query = $selectBuilder
            ->from(static::SCOPE)
            ->withStrictAccessControl()
            ->withSearchParams($searchParams)
            ->withAdditionalApplierClassNameList(
                $this->applierClassNameListProvider->get(static::SCOPE),
            )
            ->build();

        $link = static::LINK;

        $query = $this->entityManager
            ->getQueryBuilder()
            ->clone($query)
            ->select("SUM:{$link}.quantity", 'productTotalQuantity')
            ->join($link)
            ->where($link . '.productId', $id)
            ->group('id')
            ->having('id!=', null) // always true having, hotfix for count
            ->build();

        $service = $this->recordServiceContainer->get(static::SCOPE);
        $repository = $this->entityManager->getRDBRepository(static::SCOPE);
        $collection = $repository
            ->clone($query)
            ->group('id')
            ->find();

        foreach ($collection as $entity) {
            $service->prepareEntityForOutput($entity);
        }

        $total = $repository->clone($query)->count();

        return ResponseComposer::json([
            'total' => $total,
            'list' => $collection->getValueMapList(),
        ]);
    }
}
