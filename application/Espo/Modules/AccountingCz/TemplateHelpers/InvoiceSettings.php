<?php

namespace Espo\Modules\AccountingCz\TemplateHelpers;

use Espo\Core\Htmlizer\Helper;
use Espo\Core\Htmlizer\Helper\Data;
use Espo\Core\Htmlizer\Helper\Result;
use Espo\Core\Utils\Config;

class InvoiceSettings implements Helper
{
    private const LOG_PREFIX = "InvoiceSettings Template Helper: ";
    private const ALLOWED_FIELDS = [
        'companyName',
        'companyWebsite',
        'companyEmail',
        'companyPhoneNumber',
        'companySicCode',
        'companyVatId',
        'companyBankAccount',
        'companyIban',
        'companyVatPayer',
        'companyRegisteredIn',
        'companyBillingAddressStreet',
        'companyBillingAddressCity',
        'companyBillingAddressState',
        'companyBillingAddressCountry',
        'companyBillingAddressPostalCode',
        'companyShippingAddressStreet',
        'companyShippingAddressCity',
        'companyShippingAddressState',
        'companyShippingAddressCountry',
        'companyShippingAddressPostalCode'
    ];

    public function __construct(private readonly Config $config) {}

    public function render(Data $data): Result
    {
        $field = $data->getArgumentList()[0] ?? '';

        $emptyResult = Result::createSafeString('');

        if(empty($field)) {
            $GLOBALS['log']->warning(self::LOG_PREFIX . "Missing field option");
            return $emptyResult;
        }

        if(!in_array($field, self::ALLOWED_FIELDS, true)) {
            $GLOBALS['log']->warning(self::LOG_PREFIX . "Unsupported field: " . $field);
            return $emptyResult;
        }

        $value = $this->config->get($field);

        if(empty($value)) {
            $GLOBALS['log']->warning(self::LOG_PREFIX . "Empty value for field: " . $field);
            return $emptyResult;
        }

        if(is_bool($value)) {
            return Result::create($value);
        }

        if(!is_string($value)) {
            $GLOBALS['log']->warning(self::LOG_PREFIX . "Value for field: " . $field . " is not a string");
            return $emptyResult;
        }

        return Result::createSafeString($value);
    }
}
