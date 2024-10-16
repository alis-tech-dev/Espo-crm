<?php

namespace Isdoc\Tests;

use Isdoc\Country;
use PHPUnit\Framework\TestCase;
use Isdoc\PostalAddress;
use Cetria\Helpers\Reflection\Reflection;

class PostalAddressTest extends TestCase
{
    /**
     * @test
     */
    public function testSetStreetName(): void
    {
        $postalAddress = new PostalAddress();
        $expectedProperty = 'Zelená';
        $postalAddress->setStreetName($expectedProperty);
        $property = Reflection::getHiddenProperty($postalAddress, 'streetName');
        $this->assertEquals($expectedProperty, $property);
    }

    /**
     * @test
     */
    public function testSetBuildingNumber(): void
    {
        $postalAddress = new PostalAddress();
        $expectedProperty = '123';
        $postalAddress->setBuildingNumber($expectedProperty);
        $property = Reflection::getHiddenProperty($postalAddress, 'buildingNumber');
        $this->assertEquals($expectedProperty, $property);
    }

    /**
     * @test
     */
    public function testSetCityName(): void
    {
        $postalAddress = new PostalAddress();
        $expectedProperty = 'Zlín';
        $postalAddress->setCityName($expectedProperty);
        $property = Reflection::getHiddenProperty($postalAddress, 'cityName');
        $this->assertEquals($expectedProperty, $property);
    }

    /**
     * @test
     */
    public function testSetPostalZone(): void
    {
        $postalAddress = new PostalAddress();
        $expectedProperty = '76001';
        $postalAddress->setPostalZone($expectedProperty);
        $property = Reflection::getHiddenProperty($postalAddress, 'postalZone');
        $this->assertEquals($expectedProperty, $property);
    }

    /**
     * @test
     */
    public function testSetCountry(): void
    {
        $postalAddress = new PostalAddress();
        $expectedProperty = new Country();
        $postalAddress->setCountry($expectedProperty);
        $property = Reflection::getHiddenProperty($postalAddress, 'country');
        $this->assertEquals($expectedProperty, $property);
    }
}
