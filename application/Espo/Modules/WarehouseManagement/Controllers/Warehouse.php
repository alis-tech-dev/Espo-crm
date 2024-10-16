<?php

namespace Espo\Modules\WarehouseManagement\Controllers;

use Espo\Core\Api\Request;
use Espo\Core\Api\Response;
use Espo\Modules\WarehouseManagement\Classes\StockLoading\Service;
use Espo\Core\Exceptions\BadRequest;
use stdClass;

class Warehouse extends \Espo\Core\Templates\Controllers\Base
{

    /**
     * @throws BadRequest
     */
    public function getActionItems(Request $request, Response $response): stdClass
    {
        $id = $request->getRouteParam('id');

        $searchParams = $this->fetchSearchParamsFromRequest($request);

        if (empty($id)) {
            throw new BadRequest();
        }

        return $this->getStockLoaderService()->load($id, $searchParams);
    }

    public function getStockLoaderService(): Service
    {
        return $this->injectableFactory->create(Service::class);
    }
}
