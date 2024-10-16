<?php

namespace Isdoc;

use Isdoc\IsdocSimpleXMLElement;
use Isdoc\Interfaces\RenderableInterface;

/**
 * Detaily o platbě
 */
class Details implements RenderableInterface
{
    use \Isdoc\Traits\StringConversion;
    use \Isdoc\Traits\DateValidation;
    protected $hasBankDetails = null;

    protected $documentId = null;
    protected $issueDate = null;
    protected $paymentDueDate = null;
    protected $id = null;
    protected $bankCode = null;
    protected $name = null;
    protected $iban = null;
    protected $bic = null;
    protected $variableSymbol = null;
    protected $constantSymbol = null;
    protected $specificSymbol = null;

    function __construct(bool $hasBankDetails)
    {
        $this->hasBankDetails = $hasBankDetails;
    }

    /** Identifikátor svázaného dokladu, například pokladní účtenky
     * @return static
     */
    public function setDocumentId(?string $documentId): Details
    {
        $this->documentId = $documentId;
        return $this;
    }

    /** Datum vystavení
     * @param string $issueDate (formát YYYY-MM-DD)
     * @return static
     */
    public function setIssueDate(?string $issueDate): Details
    {
        if (!\is_null($issueDate)) $this->validateDate($issueDate);
        $this->issueDate = $issueDate;
        return $this;
    }

    /** Datum splatnosti
     * @param string $paymentDueDate (formát YYYY-MM-DD)
     * @return static
     */
    public function setPaymentDueDate(?string $paymentDueDate): Details
    {
        if (!\is_null($paymentDueDate)) $this->validateDate($paymentDueDate);
        $this->paymentDueDate = $paymentDueDate;
        return $this;
    }

    /** Číslo účtu lokální banky
     * @return static
     */
    public function setId(?string $id): Details
    {
        if (!\is_null($id)) $this->validateNumeric($id, 'DocumentID');
        $this->id = $id;
        return $this;
    }

    /** Kód lokální banky
     * @return static
     */
    public function setBankCode(?string $bankCode): Details
    {
        if (!\is_null($bankCode)) $this->validateNumeric($bankCode, 'BankCode');
        $this->bankCode = $bankCode;
        return $this;
    }

    /** Název banky
     * @return static
     */
    public function setName(?string $name): Details
    {
        $this->name = $name;
        return $this;
    }

    /** Mezinárodní číslo účtu (IBAN)
     * @return static
     */
    public function setIban(?string $iban): Details
    {
        $this->iban = $iban;
        return $this;
    }


    /** Kód banky podle ISO 9362, tzv. SWIFT kód
     * @return static
     */
    public function setBic(?string $bic): Details
    {
        $this->bic = $bic;
        return $this;
    }

    /** Variabilní symbol
     * @return static
     */
    public function setVariableSymbol(?string $variableSymbol): Details
    {
        if (!\is_null($variableSymbol)) $this->validateNumeric($variableSymbol, 'VariableSymbol');
        $this->variableSymbol = $variableSymbol;
        return $this;
    }

    /** Konstantní symbol
     * @return static
     */
    public function setConstantSymbol(?string $constantSymbol): Details
    {
        if (!\is_null($constantSymbol)) $this->validateNumeric($constantSymbol, 'ConstantSymbol');
        $this->constantSymbol = $constantSymbol;
        return $this;
    }

    /** Specificiký symbol
     * @return static
     */
    public function setSpecificSymbol(?string $specificSymbol): Details
    {
        if (!\is_null($specificSymbol)) $this->validateNumeric($specificSymbol, 'SpecificSymbol');
        $this->specificSymbol = $specificSymbol;
        return $this;
    }

    private function validateNumeric(string $string, string $elementName): void 
    {
        if (!ctype_digit($string))
        {
            throw new \Exception("Element <$elementName> v objektu Details musí obsahovat pouze celá čísla.");
        }
    }

    public function toXmlElement(): IsdocSimpleXMLElement
    {
        $details = new IsdocSimpleXMLElement('<Details></Details>');

        if (!$this->hasBankDetails) {
            $details->addChild('DocumentID', $this->documentId);
            $details->addChild('IssueDate', $this->issueDate);
        } else {
            $details->addChild('PaymentDueDate', $this->paymentDueDate);
            $details->addChild('ID', $this->id);
            $details->addChild('BankCode', $this->bankCode);
            $details->addChild('Name', $this->name);
            $details->addChild('IBAN', $this->iban);
            $details->addChild('BIC', $this->bic);
            $details->addChildOptional('VariableSymbol', $this->variableSymbol);
            $details->addChildOptional('ConstantSymbol', $this->constantSymbol);
            $details->addChildOptional('SpecificSymbol', $this->specificSymbol);
        }
        return $details;
    }
}
