<?php

namespace Espo\Modules\Production\Controllers;

use Espo\Core\Api\Request;
use Espo\Core\Exceptions\BadRequest;
use stdClass;


class ProductionOrder extends \Espo\Core\Templates\Controllers\Base
{
    public function getActionChildrenOf(Request $request): stdClass
    {
        $id = $request->getQueryParam('id') ?? throw new BadRequest();

        return $this->getRecordService()->getChildrenOf($id);
    }
}
