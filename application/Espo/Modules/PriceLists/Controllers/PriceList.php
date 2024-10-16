<?php

namespace Espo\Modules\PriceLists\Controllers;

use Espo\Core\Api\{
    Request,
};
use Espo\Core\Exceptions\BadRequest;
use stdClass;

class PriceList extends \Espo\Core\Templates\Controllers\Base
{
    /**
     * @throws BadRequest
     */
    public function getActionGetAttributesForEmail(Request $request): stdClass
    {
        $id = $request->getQueryParam('id');
        $templateId = $request->getQueryParam('templateId');

        if (!$id || !$templateId) {
            throw new BadRequest();
        }

        return $this->getRecordService()->getAttributesForEmail($id, $templateId);
    }
}
