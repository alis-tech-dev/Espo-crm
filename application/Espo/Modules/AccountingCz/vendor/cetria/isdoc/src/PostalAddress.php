<?php

namespace Isdoc;

use Isdoc\Country;
use Isdoc\IsdocSimpleXMLElement;
use Isdoc\Interfaces\RenderableInterface;

/**
 * Poštovní adresa
 */
class PostalAddress implements RenderableInterface
{
    use \Isdoc\Traits\StringConversion;

    protected $streetName = null;
    protected $buildingNumber = null;
    protected $cityName = null;
    protected $postalZone = null;
    protected $country = null;

    /**
     * @return static
     */
    public function setStreetName(?string $streetName): PostalAddress
    {
        $this->streetName = $streetName;
        return $this;
    }

    /** 
     * @return static
     */
    public function setBuildingNumber(?string $buildingNumber): PostalAddress
    {
        $this->buildingNumber = $buildingNumber;
        return $this;
    }


    /** 
     * @return static
     */
    public function setCityName(?string $cityName): PostalAddress
    {
        $this->cityName = $cityName;
        return $this;
    }

    /** PSČ
     * @return static
     */
    public function setPostalZone(?string $postalZone): PostalAddress
    {
        $this->postalZone = $postalZone;
        return $this;
    }

    /** 
     * @return static
     */
    public function setCountry(Country $country): PostalAddress
    {
        $this->country = $country;
        return $this;
    }

    public function toXmlElement(): IsdocSimpleXMLElement
    {
        $postalAddress = new IsdocSimpleXMLElement('<PostalAddress></PostalAddress>');
        $postalAddress->addChild('StreetName', $this->streetName);
        $postalAddress->addChild('BuildingNumber', $this->buildingNumber);
        $postalAddress->addChild('CityName', $this->cityName);
        $postalAddress->addChild('PostalZone', $this->postalZone);
        if (\is_null($this->country)) $this->country = new Country();
        $postalAddress->appendSimpleXMLElement($this->country->toXmlElement());
        return $postalAddress;
    }
}
