<?php

namespace Isdoc;

use Isdoc\Enums\TaxScheme;
use Isdoc\IsdocSimpleXMLElement;
use Isdoc\Interfaces\RenderableInterface;


/**
 * Daňová sazba
 */
class TaxCategory implements RenderableInterface
{
    use \Isdoc\Traits\StringConversion;

    protected $percent = null;
    protected $taxScheme = null;

    /** Procentní sazba daně
     * @return static
     */
    public function setPercent(?float $percent): TaxCategory
    {
        $this->percent = $percent;
        return $this;
    }

    /** Daňové schéma. Nejpoužívanější schémata jsou: VAT (daň z přidané hodnoty, používá se v ČR pro DIČ a na Slovensku pro IČ DPH) a TIN (používá se na Slovensku pro DIČ).
     * @return static
     */
    public function setTaxScheme(?string $taxScheme): TaxCategory
    {
        $this->taxScheme = TaxScheme::validate($taxScheme);
        return $this;
    }

    public function toXmlElement(): IsdocSimpleXMLElement
    {
        $taxCategory = new IsdocSimpleXMLElement('<TaxCategory></TaxCategory>');
        $taxCategory->addChild('Percent', $this->percent);
        $taxCategory->addChildOptional('TaxScheme', $this->taxScheme);
        return $taxCategory;
    }
}