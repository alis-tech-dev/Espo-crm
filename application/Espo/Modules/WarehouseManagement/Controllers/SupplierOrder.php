<?php

namespace Espo\Modules\WarehouseManagement\Controllers;

use Espo\Core\Api\Request;
use Espo\Core\Exceptions\BadRequest;
use Espo\Core\Api\Response;
use stdClass;

class SupplierOrder extends \Espo\Core\Templates\Controllers\BasePlus
{
    public function actionGetTotalAmount(Request $request)
    {

        $id = $request->getQueryParam('id') ?? null;

        if (!$id) {
            throw new BadRequest();
        }

        $totalAmount = $this->getRecordService()->getTotalAmount($id);

        return (object) [
            'totalAmount' => number_format($totalAmount, 2, ',', ' ') . ' Kč',
        ];
    }

    /**
     * @throws BadRequest
     */
    public function getActionGenerateXlsx(Request $request, Response $response): stdClass
    {
        $id = $request->getQueryParam('id');

        if (!$id) {
            throw new BadRequest();
        }

        return (object)[
            'id' => $this->getRecordService()->generateXlsx($id),
        ];
    }
}
