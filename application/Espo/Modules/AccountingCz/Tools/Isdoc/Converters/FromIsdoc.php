<?php

namespace Espo\Modules\AccountingCz\Tools\Isdoc\Converters;

use Espo\ORM\EntityManager;
use Espo\Core\Utils\Config;
use Espo\Modules\Accounting\Entities\Invoice;
use Espo\Modules\AccountingCz\Tools\Isdoc\FromIsdoc as FromIsdocConverter;
use Isdoc\{
    Invoice as IsdocInvoice,
};

class FromIsdoc implements FromIsdocConverter
{
    public function __construct(
        private readonly EntityManager $entityManager,
        private readonly Config $config,
    ) {}

    public function convert(IsdocInvoice $isdoc): Invoice
    {
        $invoice = $this->entityManager->getNewEntity("Invoice");
        $isdocXml = $isdoc->toXmlElement();
        $GLOBALS["log"]->debug(json_encode($isdocXml));
        $invoice->set([
            "name" => (string)$isdocXml->id,
            "amountCurrency" => (string)$isdocXml->LocalCurrencyCode,
            "dateInvoiced" => (string)$isdocXml->IssueDate ,
            "dueDate" => (string)$isdocXml->PaymentMeans->Payment->Details->PaymentDueDate,
            "constantSymbol" => (string)$isdocXml->PaymentMeans->Payment->Details->ConstantSymbol,
            "variableSymbol" => (string)$isdocXml->PaymentMeans->Payment->Details->VariableSymbol,
            "duzp" => (string)$isdocXml->TaxPointDate,
            "note" => (string)$isdocXml->Note,

        ]);
        $account = $this->entityManager->getRDBRepository("Account")
            ->where([
                "OR" =>[
                    "vatId" => (string)$isdocXml->AccountingCustomerParty->Party->PartyTaxScheme->CompanyID,
                    "sicCode" => (string)$isdocXml->AccountingCustomerParty->Party->PartyIdentification->ID
                ]
            ])
            ->findOne();
        if ($account){
            $invoice->set("accountId", $account->get('id'));
            // Billing address
            $invoice->set([
                "billingAddressStreet" => $account->get('billingAddressStreet'),
                "billingAddressCity" => $account->get('billingAddressCity'),
                "billingAddressState" => $account->get('billingAddressState'),
                "billingAddressCountry" => $account->get('billingAddressCountry'),
                "billingAddressPostalCode" => $account->get('billingAddressPostalCode'),
            ]);

            // Shipping address
            $invoice->set([
                "shippingAddressStreet" => $account->get('shippingAddressStreet'),
                "shippingAddressCity" => $account->get('shippingAddressCity'),
                "shippingAddressState" => $account->get('shippingAddressState'),
                "shippingAddressCountry" => $account->get('shippingAddressCountry'),
                "shippingAddressPostalCode" => $account->get('shippingAddressPostalCode'),
            ]);
        }
        $itemsRecordList = [];
        foreach ($isdocXml->InvoiceLines->InvoiceLine as $invoiceItems){
            $itemsRecordList[] = (object)[
                "name" => (string)$invoiceItems->Item->Description,
                "quantity" => (float)$invoiceItems->InvoicedQuantity,
                "unitPrice" => (float)$invoiceItems->UnitPrice,
                "amount" => (float)$invoiceItems->UnitPrice,
                "taxRate" => (float)$invoiceItems->ClassifiedTaxCategory->Percent,
                "withTax" => $invoiceItems->ClassifiedTaxCategory->VATCalculationMethod==1,
                "basisCurrency" => (string)$isdocXml->LocalCurrencyCode,
                "vatCurrency" => (string)$isdocXml->LocalCurrencyCode,
                "totalCurrency" => (string)$isdocXml->LocalCurrencyCode,
            ];
        }
        $GLOBALS["log"]->debug(print_r($itemsRecordList,true));
        $invoice->set("itemsRecordList", $itemsRecordList);

        return $invoice;
    }
}

