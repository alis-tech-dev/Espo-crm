<?php
//
//namespace Espo\Modules\Accounting\Controllers;
//
//class InvoiceItem extends \Espo\Modules\Autocrm\Classes\Abstract\Controllers\Item
//{
//}


namespace Espo\Modules\Accounting\Controllers;

use Espo\Core\Api\Request;
use Espo\Core\Api\Response;
use Espo\Modules\Autocrm\Classes\Abstract\Controllers\Item;
use stdClass;

class InvoiceItem extends Item
{
    public function postActionCreate(Request $request, Response $response): stdClass
    {
        if ($this->getEntityType() === 'InvoiceItem') {

            $data = $request->getParsedBody();
            $params = $this->createParamsFetcher->fetch($request);

            $entity = $this->getRecordService()->create($data, $params);
        }
        return $entity->getValueMap();
    }

    protected function getEntityType(): string
    {
        return 'InvoiceItem';
    }
}