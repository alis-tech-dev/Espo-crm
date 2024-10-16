<?php

namespace Isdoc;

use Isdoc\Note;
use Isdoc\TaxTotal;
use Isdoc\InvoiceLine;
use Isdoc\PartyContact;
use Isdoc\Enums\CurrencyCode;
use Isdoc\Enums\DocumentType;
use Isdoc\LegalMonetaryTotal;
use Isdoc\IsdocSimpleXMLElement;


class Invoice
implements
    Interfaces\InvoiceInterface,
    Interfaces\RenderableInterface
{
    use Traits\StringConversion;
    use Traits\DateValidation;

    protected $documentType = DocumentType::INVOICE;
    protected $id = null;
    protected $uuid = null;
    protected $issueDate = null;
    protected $taxPointDate = null;
    protected $vatApplicable = null;
    protected $currRate = 1;
    protected $refCurrRate = 1;
    protected $electronicPossibilityAgreementReference = null;
    protected $setElectronicPossibilityAgreementReferenceLanguageId = null;
    protected $note = null;
    protected $localCurrencyCode = null;
    protected $foreignCurrencyCode = null;
    protected $originalDocumentReferences = [];
    protected $accountingSupplierParty = null;
    protected $accountingCustomerParty = null;
    protected $payments = [];
    protected $taxTotal = null;
    protected $legalMonetaryTotal = null;
    protected $invoiceLines = [];

    /**
     * automaticky nastavuje UUID
     */
    function __construct()
    {
        $this->uuid = $this->generateUuid();
    }

    /**
     * @return static
     */
    public function setDocumentType(int $documentType): Invoice
    {
        $this->documentType = DocumentType::validate($documentType);
        return $this;
    }

    /**
     * @return static
     */
    public function setId(?string $id): Invoice
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return static
     */
    public function setIssueDate(?string $issueDate): Invoice //obema datum dat nejakou validaci, nebo nechat jen string?
    {
        if (!\is_null($issueDate)) $this->validateDate($issueDate);
        $this->issueDate = $issueDate;
        return $this;
    }

    /**
     * @return static
     */
    public function setTaxPointDate(?string $taxPointDate): Invoice //obema datum dat nejakou validaci, nebo nechat jen string?
    {
        if (!\is_null($taxPointDate)) $this->validateDate($taxPointDate);
        $this->taxPointDate = $taxPointDate;
        return $this;
    }

    /**
     * @return static
     */
    public function setVatApplicable(bool $vatApplicable): Invoice
    {
        $this->vatApplicable = $vatApplicable;
        return $this;
    }

    public function getVatApplicable(): string
    {
        $this->vatApplicable == true ? $vatApplicable = 'true' : $vatApplicable = 'false';
        return $vatApplicable;
    }

    /**
     * @return static
     */
    public function setElectronicPossibilityAgreementReference(Note $electronicPossibilityAgreementReference): Invoice
    {
        $this->electronicPossibilityAgreementReference = $electronicPossibilityAgreementReference;
        return $this;
    }

    /**
     * @return static
     */
    public function setNote(Note $note): Invoice
    {
        $this->note = $note;
        return $this;
    }

    /**
     * @return static
     */
    public function setLocalCurrencyCode(string $currencyCode): Invoice
    {
        $this->localCurrencyCode = CurrencyCode::validate($currencyCode);
        return $this;
    }

    /**
     * @return static
     */
    public function setForeignCurrencyCode(string $currencyCode): Invoice
    {
        $this->foreignCurrencyCode = CurrencyCode::validate($currencyCode);
        return $this;
    }

    /**
     * @return static
     */
    public function setCurrRate(float $currRate): Invoice
    {
        $this->currRate = $currRate;
        return $this;
    }

    /**
     * @return static
     */
    public function setRefCurrRate(float $refCurrRate): Invoice
    {
        $this->refCurrRate = $refCurrRate;
        return $this;
    }

    /**
     * @return static
     */
    public function setAccountingSupplierParty(PartyContact $party): Invoice
    {
        $this->accountingSupplierParty = $party;
        return $this;
    }

    /**
     * @return static
     */
    public function setAccountingCustomerParty(PartyContact $party): Invoice
    {
        $this->accountingCustomerParty = $party;
        return $this;
    }

    /**
     * @return static
     */
    public function setOriginalDocumentReferences(array $originalDocumentReferences): Invoice
    {
        $this->originalDocumentReferences = $originalDocumentReferences;
        return $this;
    }

    /**
     * @return static
     */
    public function setInvoiceLines(array $invoiceLines): Invoice
    {
        $this->invoiceLines = $invoiceLines;
        return $this;
    }

    /**
     * @return static
     */
    public function setTaxTotal(TaxTotal $taxTotal): Invoice
    {
        $this->taxTotal = $taxTotal;
        return $this;
    }

    /**
     * @return static
     */
    public function setLegalMonetaryTotal(LegalMonetaryTotal $legalMonetaryTotal): Invoice
    {
        $this->legalMonetaryTotal = $legalMonetaryTotal;
        return $this;
    }

    /** 
     * @return static
     */
    public function setPayments(array $payments): Invoice
    {
        $this->payments = $payments;
        return $this;
    }

    public function generateUuid(): string
    {
        if (function_exists('com_create_guid') === true) {
            return trim(com_create_guid(), '{}');
        }

        return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
    }

    public function toXmlElement(): IsdocSimpleXMLElement
    {
        $invoice = new IsdocSimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><Invoice></Invoice>');
        $invoice->addAttribute('version', '6.0.1'); //mela by to byt verze 6.0.2, jenze ISDOCReader sezere jen 6.0.1
        $invoice->addAttribute('xmlns', 'http://isdoc.cz/namespace/2013');
        $invoice->addChild('DocumentType', $this->documentType);
        $invoice->addChild('ID', $this->id);
        $invoice->addChild('UUID', $this->uuid);
        $invoice->addChild('IssueDate', $this->issueDate);
        $invoice->addChildOptional('TaxPointDate', $this->taxPointDate);
        $invoice->addChild('VATApplicable', $this->getVatApplicable());

        if (\is_null($this->electronicPossibilityAgreementReference)) $this->electronicPossibilityAgreementReference = new Note('ElectronicPossibilityAgreementReference');
        $invoice->appendSimpleXMLElement($this->electronicPossibilityAgreementReference->toXmlElement());

        if (!\is_null($this->note)) $invoice->appendSimpleXMLElement($this->note->toXmlElement());

        $invoice->addChild('LocalCurrencyCode', $this->localCurrencyCode);
        $hasForeignCurrency = false;
        $invoice->addChildOptional('ForeignCurrencyCode', $this->foreignCurrencyCode);
        $invoice->addChild('CurrRate', $this->currRate);
        $invoice->addChild('RefCurrRate', $this->refCurrRate);

        if (!\is_null($this->foreignCurrencyCode)) $hasForeignCurrency = true;

        $this->validateCurrRates();
        $this->validateCurrencyCodes();

        if (\is_null($this->accountingSupplierParty)) $this->accountingSupplierParty = new PartyContact();
        $accountingSupplierPartyChild = $invoice->addChild("AccountingSupplierParty");
        $accountingSupplierPartyChild->appendSimpleXMLElement($this->accountingSupplierParty->toXmlElement());

        if (\is_null($this->accountingCustomerParty)) $this->accountingCustomerParty = new PartyContact();
        $accountingCustomerPartyChild = $invoice->addChild("AccountingCustomerParty");
        $accountingCustomerPartyChild->appendSimpleXMLElement($this->accountingCustomerParty->toXmlElement());

        $this->validateOriginalDocumentReferences();

        if (!empty($this->originalDocumentReferences)) {
            $originalDocumentReferencesChild = $invoice->addChild("OriginalDocumentReferences");
            foreach ($this->originalDocumentReferences as $originalDocumentReference) {
                $originalDocumentReferencesChild->appendSimpleXMLElement($originalDocumentReference->toXmlElement());
            }
        }

        $invoiceLines = $invoice->addChild('InvoiceLines');
        foreach ($this->invoiceLines as $invoiceLine) {
            $invoiceLines->appendSimpleXMLElement($invoiceLine->toXmlElement());
            $this->validateVatApplicable($invoiceLine);
        }

        if (\is_null($this->taxTotal)) $this->taxTotal = new \Isdoc\TaxTotal($hasForeignCurrency);
        $invoice->appendSimpleXMLElement($this->taxTotal->toXmlElement());

        if (\is_null($this->legalMonetaryTotal)) $this->legalMonetaryTotal = new LegalMonetaryTotal($hasForeignCurrency);
        $invoice->appendSimpleXMLElement($this->legalMonetaryTotal->toXmlElement());

        if (!empty($this->payments)) {
            $paymentMeans = $invoice->addChild('PaymentMeans');
            foreach ($this->payments as $payment) {
                $paymentMeans->appendSimpleXMLElement($payment->toXmlElement());
            }
        }

        return $invoice;
    }

    public function toIsdocFile(string $fullFilePath): void
    {
        $dom = $this->formatXml();
        $filePath = $this->validateFilePath($fullFilePath);
        $dom->save($filePath, LIBXML_NOEMPTYTAG); //LIBXML_NOEMPTYTAG - dela oba tagy "<foo></foo>" pro prazdny element (misto <foo/>)
    }

    private function validateFilePath(string $fullFilePath): string
    {
        if (!str_ends_with(($fullFilePath), '.isdoc')) return "$fullFilePath.isdoc";
        return $fullFilePath;
    }

    private function validateCurrRates(): void
    {
        if (
            \is_null($this->foreignCurrencyCode) &&
            ($this->currRate != 1 || $this->refCurrRate != 1)
        ) {
            throw new \Exception('Doklad vystavený v tuzemské měně musí mít položky s kursem (CurrRate i RefCurrRate) rovny hodnotě 1.');
        }
    }

    private function validateCurrencyCodes(): void
    {
        if (!\is_null($this->foreignCurrencyCode) && $this->foreignCurrencyCode == $this->localCurrencyCode) {
            throw new \Exception('Doklad vystavený v zahraniční měně nesmí mít měnu lokální(LocalCurrencyCode) a zahraniční(ForeignCurrencyCode) shodnou.');
        }
    }

    private function validateOriginalDocumentReferences(): void
    {
        if (($this->documentType == DocumentType::CORRECTING_INVOICE ||
            $this->documentType == DocumentType::CORRECTING_INVOICE_REVERSE ||
            $this->documentType == DocumentType::CORRECTION_PAYMENT) && empty($this->originalDocumentReferences)) {
            throw new \Exception('Dokument s DocumentType:' . $this->documentType . ' musí mít vazbu na původní doklad (tj. OriginalDocumentReference attribut).');
        }
    }

    private function validateVatApplicable(InvoiceLine $invoiceLine): void
    {
        if ($this->getVatApplicable() == 'false' && $invoiceLine->getClassifiedTaxCategoryVatApplicable() != 'false') {
            throw new \Exception('Je-li doklad nedaňový (element VATApplicable v Invoice obsahuje hodnotu false), musejí být i všechny jeho řádkové položky nedaňové, tedy element VATApplicable uvnitř elementu ClassifiedTaxCategory rovněž musí mít hodnotu false.');
        }
    }
}
