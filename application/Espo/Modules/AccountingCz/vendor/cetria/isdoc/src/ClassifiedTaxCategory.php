<?php

namespace Isdoc;

use Isdoc\Interfaces\RenderableInterface;
use Isdoc\IsdocSimpleXMLElement;
use Isdoc\Enums\VatCalculationMethod;

/**
 * Složená položka DPH
 */
class ClassifiedTaxCategory implements RenderableInterface
{
    use Traits\StringConversion;

    protected $percent = null;
    protected $vatCalculationMethod = null;
    protected $vatApplicable = null;

    /** Procentní sazba DPH
     * @return static
     */
    public function setPercent(float $percent): ClassifiedTaxCategory
    {
        $this->percent = $percent;
        return $this;
    }

    /** Způsob výpočtu DPH 
     * @param int $vatCalculationMethod (0 = zdola, 1 = shora)
     * @return static
     */
    public function setVatCalculationMethod(int $vatCalculationMethod): ClassifiedTaxCategory
    {
        $this->vatCalculationMethod = VatCalculationMethod::validate($vatCalculationMethod);
        return $this;
    }

    /** Je předmětem DPH
     * @return static
     */
    public function setVatApplicable(bool $vatApplicable): ClassifiedTaxCategory
    {
        $this->vatApplicable = $vatApplicable;
        return $this;
    }

    public function getVatApplicable(): string
    {
        $this->vatApplicable == true ? $vatApplicable = 'true' : $vatApplicable = 'false';
        return $vatApplicable;
    }

    public function toXmlElement(): IsdocSimpleXMLElement
    {
        $classifiedTaxCategory = new IsdocSimpleXMLElement('<ClassifiedTaxCategory></ClassifiedTaxCategory>');
        $classifiedTaxCategory->addChild('Percent', $this->percent);
        $classifiedTaxCategory->addChild('VATCalculationMethod', $this->vatCalculationMethod);
        $classifiedTaxCategory->addChildOptional('VATApplicable', $this->getVatApplicable());
        return $classifiedTaxCategory;
    }
}
