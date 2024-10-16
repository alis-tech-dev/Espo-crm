<?php

namespace Isdoc;

use Isdoc\IsdocSimpleXMLElement;
use Isdoc\Enums\CountryCode;
use Isdoc\Interfaces\RenderableInterface;

class Country implements RenderableInterface
{
    use \Isdoc\Traits\StringConversion;

    protected $identificationCode = null;
    protected $name = null;

    /** Kód země podle ISO 3166-1 alpha-2
     * @param string $identificationCode Kód země podle ISO 3166-1 alpha-2
     * @return static
     */
    public function setIdentificationCode(string $identificationCode): Country
    {
        $this->identificationCode = CountryCode::validate($identificationCode);
        $this->setName();
        return $this;
    }

    /** Doplní název země podle identificationCode
     * @return static
     */
    private function setName(): void
    {
        $this->name = CountryCode::getNameFromCode($this->identificationCode);
    }

    /** 
     * @return static
     */
    public function toXmlElement(): IsdocSimpleXMLElement
    {
        $country = new IsdocSimpleXMLElement('<Country></Country>');
        $country->addChild('IdentificationCode', $this->identificationCode);
        $country->addChild('Name', $this->name);
        return $country;
    }
}
