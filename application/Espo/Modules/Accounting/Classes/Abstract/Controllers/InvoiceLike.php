<?php

namespace Espo\Modules\Accounting\Classes\Abstract\Controllers;

use Espo\Core\Api\{
    Request,
};
use Espo\Core\Exceptions\BadRequest;
use stdClass;

class InvoiceLike extends \Espo\Core\Templates\Controllers\Base
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

    /**
     * @throws BadRequest
     */
    public function getActionGetConvertAttributesFor(Request $request): stdClass
    {
        $id = $request->getQueryParam('id');
        $scope = $request->getQueryParam('scope');

        if (!$id || !$scope) {
            throw new BadRequest();
        }

        return $this->getRecordService()->getConvertAttributesFor($scope, $id);
    }
}
