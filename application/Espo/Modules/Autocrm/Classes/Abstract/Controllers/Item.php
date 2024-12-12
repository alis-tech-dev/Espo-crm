<?php

namespace Espo\Modules\Autocrm\Classes\Abstract\Controllers;

use AsyncAws\Core\Sts\ValueObject\Tag;
use Espo\Core\Api\{
    Request,
    Response,
};
use Espo\Core\Exceptions\Forbidden;
use stdClass;

class Item extends \Espo\Core\Templates\Controllers\Base
{
    public function postActionCreate(Request $request, Response $response): stdClass
    {
        throw new Forbidden();
    }

    /**
     * @throws Forbidden
     */
    public function actionCreate($params, $data, $request)
    {
        throw new Forbidden();
    }
}
