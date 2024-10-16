<?php

namespace Isdoc;

use Isdoc\Interfaces\RenderableInterface;
use Isdoc\IsdocSimpleXMLElement;

/**
 * Jednotlivý řádek faktury
 */
class InvoiceLine implements RenderableInterface
{
    use \Isdoc\Traits\StringConversion;
    protected $hasForeignCurrency = null;

    /** maximální délka ID InvoiceLine */
    const ID36TYPE = 36;

    protected $id = null;
    protected $invoicedQuantity = null;
    protected $invoicedQuantityUnitCode = null;
    protected $lineExtensionAmountCurr = null;
    protected $lineExtensionAmount = null;
    protected $lineExtensionAmountTaxInclusiveCurr = null;
    protected $lineExtensionAmountTaxInclusive = null;
    protected $lineExtensionAmountTaxInclusiveBeforeDiscount = null;
    protected $lineExtensionTaxAmount = null;
    protected $unitPrice = null;
    protected $unitPriceTaxInclusive = null;
    protected $classifiedTaxCategory = null;
    protected $note = null;
    protected $vatNote = null;
    protected $item = null;

    /**
     * @param bool $hasForeignCurrency Je doklad vystavený v cizí měně?
     */
    function __construct(bool $hasForeignCurrency)
    {
        $this->hasForeignCurrency = $hasForeignCurrency;
    }


    /** Unikátní ID řádku dokladu 
     * @return static
     * @param string $id (s maximální délkou 36 znaků)
     */
    public function setId(?string $id): InvoiceLine
    {
        if (strlen($id) > self::ID36TYPE) {
            throw new \Exception("ID je příliš dlouhý string");
        }
        $this->id = $id;
        return $this;
    }

    /** Účtované množství
     * @param float $invoicedQuantity množství v jednotkách
     * @param string $unitCode jednotka, např "ks"
     * @return static
     */
    public function setInvoicedQuantity(float $invoicedQuantity, string $unitCode): InvoiceLine
    {
        $this->invoicedQuantity = $invoicedQuantity;
        $this->invoicedQuantityUnitCode = $unitCode;
        return $this;
    }

    /** Celková cena bez daně na řádku v cizí měně
     * @return static
     */
    public function setLineExtensionAmountCurr(?float $lineExtensionAmountCurr): InvoiceLine
    {
        $this->lineExtensionAmountCurr = $lineExtensionAmountCurr;
        return $this;
    }


    /** Celková cena bez daně na řádku v tuzemské měně
     * @return static
     */
    public function setLineExtensionAmount(?float $lineExtensionAmount): InvoiceLine
    {
        $this->lineExtensionAmount = $lineExtensionAmount;
        return $this;
    }

    /** Částka daně na řádku v tuzemské měně
     * @return static
     */
    public function setLineExtensionTaxAmount(?float $lineExtensionTaxAmount): InvoiceLine
    {
        $this->lineExtensionTaxAmount = $lineExtensionTaxAmount;
        return $this;
    }


    /** Celková cena včetně daně na řádku v cizí měně
     * @return static
     */
    public function setLineExtensionAmountTaxInclusiveCurr(?float $lineExtensionAmountTaxInclusiveCurr): InvoiceLine
    {
        $this->lineExtensionAmountTaxInclusiveCurr = $lineExtensionAmountTaxInclusiveCurr;
        return $this;
    }

    /** Celková cena včetně daně na řádku v tuzemské měně
     * @return static
     */
    public function setLineExtensionAmountTaxInclusive(?float $lineExtensionAmountTaxInclusive): InvoiceLine
    {
        $this->lineExtensionAmountTaxInclusive = $lineExtensionAmountTaxInclusive;
        return $this;
    }

    /** Jednotková cena bez daně na řádku v tuzemské měně
     * @return static
     */
    public function setUnitPrice(?float $unitPrice): InvoiceLine
    {
        $this->unitPrice = $unitPrice;
        return $this;
    }


    /** Jednotková cena s daní na řádku v tuzemské měně
     * @return static
     */
    public function setUnitPriceTaxInclusive(?float $unitPriceTaxInclusive): InvoiceLine
    {
        $this->unitPriceTaxInclusive = $unitPriceTaxInclusive;
        return $this;
    }

    /** Složená položka DPH
     * @return static 
     */
    public function setClassifiedTaxCategory(ClassifiedTaxCategory $classifiedTaxCategory): InvoiceLine
    {
        $this->classifiedTaxCategory = $classifiedTaxCategory;
        return $this;
    }

    /** Informace o položce faktury
     * @return static
     */
    public function setItem(Item $item): InvoiceLine
    {
        $this->item = $item;
        return $this;
    }

    public function getClassifiedTaxCategoryVatApplicable(): ?string
    {
        return $this->classifiedTaxCategory->getVatApplicable();
    }

    public function toXmlElement(): IsdocSimpleXMLElement
    {
        $this->validateForeignCurrValues();

        $invoiceLine = new IsdocSimpleXMLElement('<InvoiceLine></InvoiceLine>');
        $invoiceLine->addChild('ID', $this->id);
        $invoicedQuantity = $invoiceLine->addChild('InvoicedQuantity', $this->invoicedQuantity);
        $invoicedQuantity->addAttribute('unitCode', $this->invoicedQuantityUnitCode);
        $invoiceLine->addChildOptional('LineExtensionAmountCurr', $this->lineExtensionAmountCurr);
        $invoiceLine->addChild('LineExtensionAmount', $this->lineExtensionAmount);
        $invoiceLine->addChildOptional('LineExtensionAmountTaxInclusiveCurr', $this->lineExtensionAmountTaxInclusiveCurr);
        $invoiceLine->addChild('LineExtensionAmountTaxInclusive', $this->lineExtensionAmountTaxInclusive);
        $invoiceLine->addChild('LineExtensionTaxAmount', $this->lineExtensionTaxAmount);
        $invoiceLine->addChild('UnitPrice', $this->unitPrice);
        $invoiceLine->addChild('UnitPriceTaxInclusive', $this->unitPriceTaxInclusive);

        if (\is_null($this->classifiedTaxCategory)) $this->classifiedTaxCategory = new ClassifiedTaxCategory();
        $invoiceLine->appendSimpleXMLElement($this->classifiedTaxCategory->toXmlElement());

        if (!\is_null($this->item)) $invoiceLine->appendSimpleXMLElement($this->item->toXmlElement());

        return $invoiceLine;
    }

    protected function validateForeignCurrValues(): void
    {
        foreach ($this->getForeignCurrValues() as $key => $currValue) {
            if ($this->hasForeignCurrency && $currValue === null) {
                throw new \Exception('Nevyplněný element: ' . $key . ' v objektu InvoiceLine. Doklad vystavený v cizí měně musí obsahovat v cizí měně i všechny finanční elementy (elementy končící na Curr).');
            } elseif (!$this->hasForeignCurrency && $currValue !== null) {
                throw new \Exception('Doklad vystavený v tuzemské měně nesmí obsahovat žádný element v cizí měně. Element ' . $key . ' nesmí mít hodnotu v objektu InvoiceLine. Pokud neexistuje element ForeignCurrencyCode, pak nesmí existovat žádný element pro cizí měnu, tj. element končící na Curr.');
            }
        }
    }

    protected function getForeignCurrValues(): array
    {
        return [
            'LineExtensionAmountCurr' => $this->lineExtensionAmountCurr,
            'LineExtensionAmountTaxInclusiveCurr' => $this->lineExtensionAmountTaxInclusiveCurr
        ];
    }
}
