<?php

namespace Isdoc;

use Isdoc\TaxCategory;
use Isdoc\IsdocSimpleXMLElement;
use Isdoc\Interfaces\RenderableInterface;


/**
 * Sumář jedné daňové sazby
 */
class TaxSubTotal implements RenderableInterface
{
    use \Isdoc\Traits\StringConversion;

    protected $taxableAmountCurr = null;
    protected $taxableAmount = null;
    protected $taxAmountCurr = null;
    protected $taxAmount = null;
    protected $taxInclusiveAmountCurr = null;
    protected $taxInclusiveAmount = null;
    protected $alreadyClaimedTaxableAmountCurr = null;
    protected $alreadyClaimedTaxableAmount = null;
    protected $alreadyClaimedTaxAmountCurr = null;
    protected $alreadyClaimedTaxAmount = null;
    protected $alreadyClaimedTaxInclusiveAmountCurr = null;
    protected $alreadyClaimedTaxInclusiveAmount = null;
    protected $differenceTaxableAmountCurr = null;
    protected $differenceTaxableAmount = null;
    protected $differenceTaxAmountCurr = null;
    protected $differenceTaxAmount = null;
    protected $differenceTaxInclusiveAmountCurr = null;
    protected $differenceTaxInclusiveAmount = null;
    protected $taxCategory = null;

    protected $hasForeignCurrency = null;

    /**
     * @param bool $hasForeignCurrency Je doklad vystavený v cizí měně?
     */
    function __construct(bool $hasForeignCurrency)
    {
        $this->hasForeignCurrency = $hasForeignCurrency;
    }

    /**
     * Základ v sazbě v cizí měně
     * @return static 
     */
    public function setTaxableAmountCurr(?float $taxableAmountCurr): TaxSubTotal
    {
        $this->taxableAmountCurr = $taxableAmountCurr;
        return $this;
    }

    /** Základ v sazbě v tuzemské měně
     * @return static
     */
    public function setTaxableAmount(?float $taxableAmount): TaxSubTotal
    {
        $this->taxableAmount = $taxableAmount;
        return $this;
    }

    /**
     * Daň v sazbě v cizí měně,
     * @return static
     */
    public function setTaxAmountCurr(?float $taxAmountCurr): TaxSubTotal
    {
        $this->taxAmountCurr = $taxAmountCurr;
        return $this;
    }

    /** Daň v sazbě v tuzemské měně
     * @return static
     */
    public function setTaxAmount(?float $taxAmount): TaxSubTotal
    {
        $this->taxAmount = $taxAmount;
        return $this;
    }

    /** Částka s daní v sazbě v cizí měně
     * @return static
     */
    public function setTaxInclusiveAmountCurr(?float $taxInclusiveAmountCurr): TaxSubTotal
    {
        $this->taxInclusiveAmountCurr = $taxInclusiveAmountCurr;
        return $this;
    }

    /** Částka s daní v sazbě v tuzemské měně
     * @return static
     */
    public function setTaxInclusiveAmount(?float $taxInclusiveAmount): TaxSubTotal
    {
        $this->taxInclusiveAmount = $taxInclusiveAmount;
        return $this;
    }

    /**  Na záloze již uplatněno, základ v sazbě v cizí měně
     * @return static
     */
    public function setAlreadyClaimedTaxableAmountCurr(?float $alreadyClaimedTaxableAmountCurr): TaxSubTotal
    {
        $this->alreadyClaimedTaxableAmountCurr = $alreadyClaimedTaxableAmountCurr;
        return $this;
    }

    /**  Na záloze již uplatněno, základ v sazbě v tuzemské měně
     * @return static
     */
    public function setAlreadyClaimedTaxableAmount(?float $alreadyClaimedTaxableAmount): TaxSubTotal
    {
        $this->alreadyClaimedTaxableAmount = $alreadyClaimedTaxableAmount;
        return $this;
    }

    /**  Na záloze již uplatněno, daň v sazbě v cizí měně
     * @return static
     */
    public function setAlreadyClaimedTaxAmountCurr(?float $alreadyClaimedTaxAmountCurr): TaxSubTotal
    {
        $this->alreadyClaimedTaxAmountCurr = $alreadyClaimedTaxAmountCurr;
        return $this;
    }

    /**  Na záloze již uplatněno, daň v sazbě v tuzemské měně
     * @return static
     */
    public function setAlreadyClaimedTaxAmount(?float $alreadyClaimedTaxAmount): TaxSubTotal
    {
        $this->alreadyClaimedTaxAmount = $alreadyClaimedTaxAmount;
        return $this;
    }

    /**  Na záloze již uplatněno, s daní v sazbě v cizí měně
     * @return static
     */
    public function setAlreadyClaimedTaxInclusiveAmountCurr(?float $alreadyClaimedTaxInclusiveAmountCurr): TaxSubTotal
    {
        $this->alreadyClaimedTaxInclusiveAmountCurr = $alreadyClaimedTaxInclusiveAmountCurr;
        return $this;
    }

    /**  Na záloze již uplatněno, s daní v sazbě v tuzemské měně
     * @return static
     */
    public function setAlreadyClaimedTaxInclusiveAmount(?float $alreadyClaimedTaxInclusiveAmount): TaxSubTotal
    {
        $this->alreadyClaimedTaxInclusiveAmount = $alreadyClaimedTaxInclusiveAmount;
        return $this;
    }

    /**  Rozdíl, základ v cizí měně
     * @return static
     */
    public function setDifferenceTaxableAmountCurr(?float $differenceTaxableAmountCurr): TaxSubTotal
    {
        $this->differenceTaxableAmountCurr = $differenceTaxableAmountCurr;
        return $this;
    }

    /**  Rozdíl, základ v tuzemské měně
     * @return static
     */
    public function setDifferenceTaxableAmount(?float $differenceTaxableAmount): TaxSubTotal
    {
        $this->differenceTaxableAmount = $differenceTaxableAmount;
        return $this;
    }

    /**  Rozdíl, daň v cizí měně
     * @return static
     */
    public function setDifferenceTaxAmountCurr(?float $differenceTaxAmountCurr): TaxSubTotal
    {
        $this->differenceTaxAmountCurr = $differenceTaxAmountCurr;
        return $this;
    }

    /**  Rozdíl, daň v tuzemské měně
     * @return static
     */
    public function setDifferenceTaxAmount(?float $differenceTaxAmount): TaxSubTotal
    {
        $this->differenceTaxAmount = $differenceTaxAmount;
        return $this;
    }

    /**  Rozdíl, s daní v cizí měně
     * @return static
     */
    public function setDifferenceTaxInclusiveAmountCurr(?float $differenceTaxInclusiveAmountCurr): TaxSubTotal
    {
        $this->differenceTaxInclusiveAmountCurr = $differenceTaxInclusiveAmountCurr;
        return $this;
    }

    /**  Rozdíl, s daní v tuzemské měně
     * @return static
     */
    public function setDifferenceTaxInclusiveAmount(?float $differenceTaxInclusiveAmount): TaxSubTotal
    {
        $this->differenceTaxInclusiveAmount = $differenceTaxInclusiveAmount;
        return $this;
    }

    /**  Daňová sazba
     * @return static
     */
    public function setTaxCategory(TaxCategory $taxCategory): TaxSubTotal
    {
        $this->taxCategory = $taxCategory;
        return $this;
    }


    public function toXmlElement(): IsdocSimpleXMLElement
    {
        $this->validateForeignCurrValues();

        $taxSubTotal = new IsdocSimpleXMLElement('<TaxSubTotal></TaxSubTotal>');
        $taxSubTotal->addChildOptional('TaxableAmountCurr', $this->taxableAmountCurr);
        $taxSubTotal->addChild('TaxableAmount', $this->taxableAmount);
        $taxSubTotal->addChildOptional('TaxAmountCurr', $this->taxAmountCurr);
        $taxSubTotal->addChild('TaxAmount', $this->taxAmount);
        $taxSubTotal->addChildOptional('TaxInclusiveAmountCurr', $this->taxInclusiveAmountCurr);
        $taxSubTotal->addChild('TaxInclusiveAmount', $this->taxInclusiveAmount);
        $taxSubTotal->addChildOptional('AlreadyClaimedTaxableAmountCurr', $this->alreadyClaimedTaxableAmountCurr);
        $taxSubTotal->addChild('AlreadyClaimedTaxableAmount', $this->alreadyClaimedTaxableAmount);
        $taxSubTotal->addChildOptional('AlreadyClaimedTaxAmountCurr', $this->alreadyClaimedTaxAmountCurr);
        $taxSubTotal->addChild('AlreadyClaimedTaxAmount', $this->alreadyClaimedTaxAmount);
        $taxSubTotal->addChildOptional('AlreadyClaimedTaxInclusiveAmountCurr', $this->alreadyClaimedTaxInclusiveAmountCurr);
        $taxSubTotal->addChild('AlreadyClaimedTaxInclusiveAmount', $this->alreadyClaimedTaxInclusiveAmount);
        $taxSubTotal->addChildOptional('DifferenceTaxableAmountCurr', $this->differenceTaxableAmountCurr);
        $taxSubTotal->addChild('DifferenceTaxableAmount', $this->differenceTaxableAmount);
        $taxSubTotal->addChildOptional('DifferenceTaxAmountCurr', $this->differenceTaxAmountCurr);
        $taxSubTotal->addChild('DifferenceTaxAmount', $this->differenceTaxAmount);
        $taxSubTotal->addChildOptional('DifferenceTaxInclusiveAmountCurr', $this->differenceTaxInclusiveAmountCurr);
        $taxSubTotal->addChild('DifferenceTaxInclusiveAmount', $this->differenceTaxInclusiveAmount);

        if (\is_null($this->taxCategory)) $this->taxCategory = new TaxCategory();
        $taxSubTotal->appendSimpleXMLElement($this->taxCategory->toXmlElement());

        return $taxSubTotal;
    }

    protected function validateForeignCurrValues(): void
    {
        foreach ($this->getForeignCurrValues() as $key => $currValue) {
            if ($this->hasForeignCurrency && $currValue === null) {
                throw new \Exception('Nevyplněný element: ' . $key . ' v objektu TaxSubTotal. Doklad vystavený v cizí měně musí obsahovat v cizí měně i všechny finanční elementy (elementy končící na Curr).');
            } elseif (!$this->hasForeignCurrency && $currValue !== null) {
                throw new \Exception('Doklad vystavený v tuzemské měně nesmí obsahovat žádný element v cizí měně. Element ' . $key . ' nesmí mít hodnotu v objektu TaxSubTotal. Pokud neexistuje element ForeignCurrencyCode, pak nesmí existovat žádný element pro cizí měnu, tj. element končící na Curr.');
            }
        }
    }

    protected function getForeignCurrValues(): array
    {
        return [
            'TaxableAmountCurr' => $this->taxableAmountCurr,
            'TaxAmountCurr' => $this->taxAmountCurr,
            'TaxInclusiveAmountCurr' => $this->taxInclusiveAmountCurr,
            'AlreadyClaimedTaxableAmountCurr' => $this->alreadyClaimedTaxableAmountCurr,
            'AlreadyClaimedTaxAmountCurr' => $this->alreadyClaimedTaxAmountCurr,
            'AlreadyClaimedTaxInclusiveAmountCurr' => $this->alreadyClaimedTaxInclusiveAmountCurr,
            'DifferenceTaxableAmountCurr' => $this->differenceTaxableAmountCurr,
            'DifferenceTaxAmountCurr' => $this->differenceTaxAmountCurr,
            'DifferenceTaxInclusiveAmountCurr' => $this->differenceTaxInclusiveAmountCurr
        ];
    }
}
