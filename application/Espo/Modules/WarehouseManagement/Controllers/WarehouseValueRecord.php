<?php

namespace Espo\Modules\WarehouseManagement\Controllers;

use Espo\Core\Exceptions\Forbidden;
use Espo\Core\Api\Request;
use Espo\Core\Api\Response;

use stdClass;

class WarehouseValueRecord extends \Espo\Core\Templates\Controllers\Base
{
    public function postActionCreate(Request $request, Response $response): stdClass {
        throw new Forbidden();
    }

    public function putActionUpdate(Request $request, Response $response): stdClass {
        throw new Forbidden();
    }
}
