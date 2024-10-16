<?php

namespace Espo\Modules\AccountingCz\Controllers;

use Espo\Core\Templates\Controllers\Base;
use Espo\Modules\AccountingCz\Services\Payment as Service;
use Espo\Core\Exceptions\BadRequest;
use Espo\Core\Utils\Util;
use Espo\Core\Api\{
    Request,
};

use stdClass;

class Payment extends Base
{
    private $invoiceRequiredFields = [
        'id',
        'paidOn',
        'amount',
        'markAsPaid',
        'variableSymbol'
    ];

    private $proformaInvoiceRequiredFields = [
        'id',
        'paidOn',
        'amount',
        'markAsPaid',
        'followupDocument',
        'variableSymbol'
    ];

    /**
     * @throws BadRequest
     */
    public function postActionCreatePayment(Request $request): stdClass
    {

        $data = $request->getParsedBody();

        if(empty($data->entityType)){
            throw new BadRequest('entityType is required');
        }

        $entityType = $data->entityType;

        foreach ($this->{Util::mbLowerCaseFirst($entityType).'RequiredFields'} as $requiredField) {
            
            if(!isset($data->$requiredField)){

                throw new BadRequest($requiredField . ' is required');

            }

        }

        $this->getPaymentService()->{'createPaymentFor'.$entityType}($data);

        return (object) [
            'success' => true,
        ];

    }

    private function getPaymentService(): Service
    {
        return $this->injectableFactory->create(Service::class);
    }

}
