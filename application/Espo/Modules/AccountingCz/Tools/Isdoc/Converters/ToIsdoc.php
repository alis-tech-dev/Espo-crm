<?php

namespace Espo\Modules\AccountingCz\Tools\Isdoc\Converters;

use Espo\ORM\EntityManager;
use Espo\Core\Utils\Config;
use Espo\Modules\Accounting\Entities\Invoice;
use Espo\Modules\AccountingCz\Tools\Isdoc\ToIsdoc as ToIsdocConverter;
use Isdoc\{Details,
    Invoice as IsdocInvoice,
    Note,
    PartyContact,
    PartyIdentification,
    Payment,
    PostalAddress,
    Country,
    PartyTaxScheme,
    ClassifiedTaxCategory,
    Item,
    InvoiceLine,
    TaxTotal,
    TaxSubTotal,
    TaxCategory,
    LegalMonetaryTotal,
    Contact};

class ToIsdoc implements ToIsdocConverter
{
    protected IsdocInvoice $isdoc;

    public function __construct(
        private readonly EntityManager $entityManager,
        private readonly Config $config,
    ) {}

    const COUNTRY_NAME_TO_COUNTRY_CODE = [
        'Rakouská republika' => 'AT',
        'Belgické království' => 'BE',
        'Bulharská republika' => 'BG',
        'Kyperská republika' => 'CY',
        'Česká republika' => 'CZ',
        'Chorvatská republika' => 'HR',
        'Dánské království' => 'DK',
        'Estonská republika' => 'EE',
        'Finská republika' => 'FI',
        'Francouzská republika' => 'FR',
        'Spolková republika Německo' => 'DE',
        'Řecká republika' => 'GR',
        'Maďarsko' => 'HU',
        'Irsko' => 'IE',
        'Italská republika' => 'IT',
        'Litevská republika' => 'LV',
        'Lichtenštejnské knížectví' => 'LT',
        'Lucemburské velkovévodství' => 'LU',
        'Maltská republika' => 'MT',
        'Nizozemské království' => 'NL',
        'Polská republika' => 'PL',
        'Portugalská republika' => 'PT',
        'Rumunsko' => 'RO',
        'Slovenská republika' => 'SK',
        'Slovinská republika' => 'SI',
        'Španělské království' => 'ES',
        'Švédské království' => 'SE',
        'Spojené království Velké Británie a Severního Irska' => 'GB',
    ];
    const PAYMENT_TYPE = [
        'bank' => 42,
        'card' => 48,
        'cash' => 10,
        'cod' => 50
    ];
    public function convert(Invoice $invoice): IsdocInvoice {
        $this->isdoc = new IsdocInvoice();

        $this->setBasicInfo($invoice);

        $supplierParty = $this->getSupplierParty();
        $this->isdoc->setAccountingSupplierParty($supplierParty);

        $customerParty = $this->getCustomerParty($invoice);
        $this->isdoc->setAccountingCustomerParty($customerParty);

        $invoiceLines = $this->getInvoiceLines($invoice);
        $this->isdoc->setInvoiceLines($invoiceLines);

        $taxTotal = $this->getTaxTotal($invoice);
        $this->isdoc->setTaxTotal($taxTotal);

        $legalMonetaryTotal = $this->getLegalMonetaryTotal($invoice);
        $this->isdoc->setLegalMonetaryTotal($legalMonetaryTotal);

        $paymentMeans = $this->getPayments($invoice);
        $this->isdoc->setPayments($paymentMeans);

        return $this->isdoc;
    }

    protected function setBasicInfo(Invoice $invoice): void {
        $this->isdoc->setId($invoice->get('number'));
        $this->isdoc->setIssueDate($invoice->get('dateInvoiced'));
        $this->isdoc->setTaxPointDate($invoice->get("duzp"));
        $this->isdoc->setVatApplicable($this->isdoc->getVatApplicable());
        $this->isdoc->setLocalCurrencyCode($invoice->get("amountCurrency"));
        $this->isdoc->setCurrRate($this->config->get('currencyRates')[$invoice->get("amountCurrency")] ?? 1);
        $note = ((new Note("ElectronicPossibilityAgreementReference"))->setLanguageId("cs"));
        $this->isdoc->setElectronicPossibilityAgreementReference($note);
        /*$note = ((new Note("note"))->setNote($invoice->get('note'))->setLanguageId("cs"));

        $this->isdoc->setNote($note);*/
        //$this->isdoc->setRefCurrRate(1); // TODO
    }

    protected function getSupplierParty(): PartyContact {
        $partyIdentification = (new PartyIdentification())
            ->setId($this->config->get("companySicCode"));

        $country = (new Country())
            ->setIdentificationCode(self::COUNTRY_NAME_TO_COUNTRY_CODE[$this->config->get('companyBillingAddressCountry')] ?? 'CZ');

        $postalAddress = (new PostalAddress())
            ->setStreetName($this->config->get("companyBillingAddressStreet"))
            ->setBuildingNumber($this->config->get("companyBillingAddressStreetNumber"))
            ->setCityName($this->config->get("companyBillingAddressCity"))
            ->setPostalZone($this->config->get("companyBillingAddressPostalCode"))
            ->setCountry($country);

        $partyContact = (new PartyContact())
            ->setName($this->config->get("companyName"))
            ->setPartyIdentification($partyIdentification)
            ->setPostalAddress($postalAddress);

        return $partyContact;
    }

    protected function getCustomerParty(Invoice $invoice): PartyContact {
        $partyIdentification = (new PartyIdentification());

        $account = $this->entityManager
            ->getRDBRepository(Invoice::ENTITY_TYPE)
            ->getRelation($invoice, "account")
            ->findOne();

        if($account) {
            $partyIdentification->setId($account->get("sicCode"));
        }

        $country = (new Country())
            ->setIdentificationCode(self::COUNTRY_NAME_TO_COUNTRY_CODE[$this->config->get('billingAddressCountry')] ?? 'CZ');

        $postalAddress = (new PostalAddress())
            ->setStreetName($invoice->get("billingAddressStreet")) // TOD
            ->setBuildingNumber($invoice->get("billingAddressStreetNumber")) // TOD
            ->setCityName($invoice->get("billingAddressCity"))
            ->setPostalZone($invoice->get("billingAddressPostalCode"))
            ->setCountry($country);

        $partyContact = (new PartyContact())
            ->setPartyIdentification($partyIdentification)
            ->setPostalAddress($postalAddress);

        if($account) {
            $partyContact->setName($account->get("name"));
            $vatId = $account->get("vatId");

            $partyTaxSchemes = [];

            if($vatId) {
                $partyTaxSchemes[] = (new PartyTaxScheme())
                    ->setCompanyID($vatId)
                    ->setTaxScheme("VAT"); // TODO TIN?
            }

            $partyContact->setPartyTaxSchemes($partyTaxSchemes);
            $contact = (new Contact())
                ->setName($account->get("name"))
                ->setElectronicMail($account->get("emailAddress"))
                ->setTelephone($account->get("phoneNumber"));

            $partyContact->setContact($contact);
        }


        return $partyContact;
    }

    protected function getInvoiceLines(Invoice $invoice): array {
        $items = $this->entityManager
            ->getRDBRepository(Invoice::ENTITY_TYPE)
            ->getRelation($invoice, "items")
            ->find();

        $invoiceLines = [];

        foreach($items as $item) {
            $invoiceLine = (new InvoiceLine(false))

                ->setInvoicedQuantity($item->get("quantity"), $item->get("unit") ?? "")
                ->setLineExtensionAmount($item->get("amount"))
                ->setLineExtensionAmountTaxInclusive($item->get("amount")+($item->get("amount")*($item->get("taxRate")/100)))
                ->setLineExtensionTaxAmount($item->get("amount")*($item->get("taxRate")/100))


                ->setUnitPrice($item->get("unitPrice"))
                ->setUnitPriceTaxInclusive($item->get("unitPrice")*($item->get("taxRate")/100))

                ->setClassifiedTaxCategory(
                    (new ClassifiedTaxCategory())
                        ->setPercent($item->get("taxRate"))
                        ->setVatApplicable($this->isdoc->getVatApplicable())
                        ->setVatCalculationMethod($item->get('withTax')?1:0)
                )

                ->setItem((new Item())->setDescription($item->get("name")));

            $invoiceLines[] = $invoiceLine;
        }

        return $invoiceLines;
    }

    protected function getTaxTotal(Invoice $invoice): TaxTotal {
        $taxTotal = new TaxTotal(false);

        $total = 0.0;
        $summaryVatRates = $this->entityManager
            ->getRDBRepository(Invoice::ENTITY_TYPE)
            ->getRelation($invoice, "summaryVatRates")
            ->find();
        $taxSubTotalList = [];
        foreach ($summaryVatRates as $summaryVatRate) {
            $GLOBALS["log"]->debug(json_encode($summaryVatRate->get("basis")));
            $taxSubTotal = (new TaxSubTotal(false)); // TOD

            $taxSubTotal->setTaxableAmount($summaryVatRate->get("basis"));
            $taxSubTotal->setTaxAmount($summaryVatRate->get("vat"));
            $taxSubTotal->setTaxInclusiveAmount($summaryVatRate->get("basis")+$summaryVatRate->get("vat"));
            $total += $summaryVatRate->get("basis")+$summaryVatRate->get("vat");
            $taxSubTotal->setAlreadyClaimedTaxableAmount(0.0); // TODO ?
            $taxSubTotal->setAlreadyClaimedTaxAmount(0.0); // TODO ?
            $taxSubTotal->setAlreadyClaimedTaxInclusiveAmount(0.0); // TODO ?

            $taxSubTotal->setDifferenceTaxableAmount(0.0); // TODO ?
            $taxSubTotal->setDifferenceTaxAmount(0.0); // TODO ?
            $taxSubTotal->setDifferenceTaxInclusiveAmount(0.0); // TODO ?

            $taxCategory = (new TaxCategory())
                ->setPercent($summaryVatRate->get("taxRate") ?? 0)
                ->setTaxScheme("VAT"); // TODO

            $taxSubTotal->setTaxCategory($taxCategory);
            $taxSubTotalList[] = $taxSubTotal;
        }
        $taxTotal->setTaxAmount($total);
        $taxTotal->setTaxSubsTotal($taxSubTotalList);


        return $taxTotal;
    }

    protected function getLegalMonetaryTotal(Invoice $invoice): LegalMonetaryTotal {
        $legalMonetaryTotal = new LegalMonetaryTotal(false); // TOD

        $legalMonetaryTotal->setTaxExclusiveAmount($invoice->get("amount")); // TOD
        $legalMonetaryTotal->setTaxInclusiveAmount($invoice->get("grandTotalAmount")); // TOD

        $legalMonetaryTotal->setAlreadyClaimedTaxExclusiveAmount(0.0); // TODO ?
        $legalMonetaryTotal->setAlreadyClaimedTaxInclusiveAmount(0.0); // TODO ?

        $legalMonetaryTotal->setDifferenceTaxExclusiveAmount(0.0); // TODO ?
        $legalMonetaryTotal->setDifferenceTaxInclusiveAmount(0.0); // TODO ?

        //$legalMonetaryTotal->setPayableRoundingAmount(0.0); // TODO ?

        $legalMonetaryTotal->setPaidDepositsAmount(0.0); // TODO ?

        $legalMonetaryTotal->setPayableAmount($invoice->get("grandTotalAmount")); // TOD

        return $legalMonetaryTotal;
    }

    protected function getPayments(Invoice $invoice): array {
        $details = (new Details(true))
            //->setName("Banka") //TODO
            ->setConstantSymbol($invoice->get("constantSymbol"))
            ->setVariableSymbol($invoice->get("variableSymbol"))
            ->setPaymentDueDate($invoice->get("dueDate"));


        $paymment = (new Payment(false))
        ->setPaymentMeansCode(self::PAYMENT_TYPE[$invoice->get('paymentMethod')]??42)
        ->setPaidAmount($invoice->get("grandTotalAmount"))
        ->setDetails($details);

        return [$paymment];
    }
}

