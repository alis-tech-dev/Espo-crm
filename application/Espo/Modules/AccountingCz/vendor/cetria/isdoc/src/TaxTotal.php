<?php

namespace Isdoc;

use Isdoc\IsdocSimpleXMLElement;
use Isdoc\Interfaces\RenderableInterface;

/**
 * Daňová rekapitulace
 */
class TaxTotal implements RenderableInterface
{
    use \Isdoc\Traits\StringConversion;

    protected $taxSubsTotal = [];
    protected $taxAmountCurr = null;
    protected $taxAmount = null;

    protected $hasForeignCurrency = null;

    /**
     * @param bool $hasForeignCurrency Je doklad vystavený v cizí měně?
     */
    function __construct(bool $hasForeignCurrency)
    {
        $this->hasForeignCurrency = $hasForeignCurrency;
    }


    /** Sumář jedné daňové sazby
     * @param array $taxSubsTotal array of TaxTotal class
     * @return static
     */
    public function setTaxSubsTotal(array $taxSubsTotal): TaxTotal
    {
        $this->taxSubsTotal = $taxSubsTotal;
        return $this;
    }

    /** Částka v cizí měně
     * @return static
     */
    public function setTaxAmountCurr(?float $taxAmountCurr): TaxTotal
    {
        $this->taxAmountCurr = $taxAmountCurr;
        return $this;
    }

    /** Částka
     * @return static
     */
    public function setTaxAmount(?float $taxAmount): TaxTotal
    {
        $this->taxAmount = $taxAmount;
        return $this;
    }

    public function toXmlElement(): IsdocSimpleXMLElement
    {
        $this->validateForeignCurrValues();
        $taxTotal = new IsdocSimpleXMLElement('<TaxTotal></TaxTotal>');

        foreach ($this->taxSubsTotal as $taxSubTotal) {
            $taxTotal->appendSimpleXMLElement($taxSubTotal->toXmlElement());
        }

        $taxTotal->addChildOptional('TaxAmountCurr', $this->taxAmountCurr);
        $taxTotal->addChildOptional('TaxAmount', $this->taxAmount);
        return $taxTotal;
    }

    protected function validateForeignCurrValues(): void
    {
        if ($this->hasForeignCurrency && $this->taxAmountCurr === null) {
            throw new \Exception('Nevyplněný element: TaxAmountCurr v objektu TaxTotal. Doklad vystavený v cizí měně musí obsahovat v cizí měně i všechny finanční elementy (elementy končící na Curr).');
        } elseif (!$this->hasForeignCurrency && $this->taxAmountCurr !== null) {
            throw new \Exception('Doklad vystavený v tuzemské měně nesmí obsahovat žádný element v cizí měně. Element: TaxAmountCurr nesmí mít hodnotu v objektu TaxTotal. Pokud neexistuje element ForeignCurrencyCode, pak nesmí existovat žádný element pro cizí měnu, tj. element končící na Curr.');
        }
    }
}
