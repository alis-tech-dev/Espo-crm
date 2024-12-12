<?php

namespace Espo\Modules\Accounting\Controllers;

use Espo\Core\Api\Request;
use Espo\Core\Api\Response;
use Espo\Modules\Autocrm\Classes\Abstract\Controllers\Item;
use stdClass;

class SupplierInvoiceItem extends Item
{
    public function postActionCreate(Request $request, Response $response): stdClass
    {
        if ($this->getEntityType() !== 'SupplierInvoiceItem') {
            throw new \Espo\Core\Exceptions\Forbidden();
        }

        $data = $request->getParsedBody();
        $params = $this->createParamsFetcher->fetch($request);

        $entity = $this->getRecordService()->create($data, $params);

        return $entity->getValueMap();
    }

    protected function getEntityType(): string
    {
        return 'SupplierInvoiceItem';
    }
}
