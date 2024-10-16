<?php

namespace Espo\Modules\WarehouseManagement\Controllers;

use Espo\Core\Api\Request;
use Espo\Core\Api\Response;
use Espo\Core\Exceptions\Forbidden;
use stdClass;

class WarehouseItem extends \Espo\Core\Templates\Controllers\Base
{
    public function putActionUpdate(Request $request, Response $response): stdClass
    {
        $this->checkActionAccess('update', $request);

        return parent::putActionUpdate($request, $response);
    }

    public function deleteActionDelete(Request $request, Response $response): bool
    {
        $this->checkActionAccess('delete', $request);

        return parent::deleteActionDelete($request, $response);
    }

    /**
     * @throws Forbidden
     */
    private function checkActionAccess(string $action, Request $request): void
    {
        $id = $request->getRouteParam('id');

//        if (!$this->getRecordService()->checkControllerActionAccess($action, $id)) {
//            throw new Forbidden();
//        }
    }
}
