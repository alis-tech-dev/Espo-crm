<?php

namespace Espo\Modules\WarehouseManagement\Tools\Product\Api;

use Espo\Core\Api\{
    Action,
    Request,
    Response,
    ResponseComposer
};
use Espo\Core\Exceptions\BadRequest;
use Espo\Core\Record\SearchParamsFetcher;
use Espo\Modules\WarehouseManagement\Tools\Product\StockInfo\Service;

class GetStockInfo implements Action
{
    public function __construct(
        private readonly Service $service,
        private readonly SearchParamsFetcher $searchParamsFetcher,
    ) {
    }

    public function process(Request $request): Response
    {
        $id = $request->getRouteParam('id');

        if (!$id) {
            throw new BadRequest();
        }

        $searchParams = $this->searchParamsFetcher->fetch($request);
        $result = $this->service->getStockInfo($id, $searchParams);

        return ResponseComposer::json([
            'list' => $result->getCollection()->getValueMapList(),
            'total' => $result->getTotal(),
            'additionalData' => $result->getData(),
        ]);
    }
}
