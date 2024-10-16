<?php

namespace Isdoc;

use Isdoc\Enums\TaxScheme;
use Isdoc\IsdocSimpleXMLElement;
use Isdoc\Interfaces\RenderableInterface;

/**
 * Daňové údaje. Element je možné použít vícekrát a určit více identifikátorů, např. DIČ a IČ DPH na Slovensku.
 */
class PartyTaxScheme implements RenderableInterface
{
    use \Isdoc\Traits\StringConversion;

    protected $companyId = null;
    protected $taxScheme = null;

    /** DIČ
     * @return static
     */
    public function setCompanyId(?string $companyId): PartyTaxScheme
    {
        $this->companyId = $companyId;
        return $this;
    }

    /** Daňové schéma. Nejpoužívanější schémata jsou: VAT (daň z přidané hodnoty, používá se v ČR pro DIČ a na Slovensku pro IČ DPH) a TIN (používá se na Slovensku pro DIČ).
     * @return static
     */
    public function setTaxScheme(?string $taxScheme): PartyTaxScheme
    {
        $this->taxScheme = TaxScheme::validate($taxScheme);
        return $this;
    }

    public function toXmlElement(): IsdocSimpleXMLElement
    {
        $contact = new IsdocSimpleXMLElement('<PartyTaxScheme></PartyTaxScheme>');
        $contact->addChild('CompanyID',$this->companyId); 
        $contact->addChild('TaxScheme',$this->taxScheme); 
        return $contact;
    }
}
