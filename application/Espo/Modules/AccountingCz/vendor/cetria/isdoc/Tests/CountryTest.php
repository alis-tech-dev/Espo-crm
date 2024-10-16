<?php

namespace Tests\Core\Unit\App\Isdoc;

use Isdoc\Country;
use Isdoc\Enums\CountryCode;
use Cetria\Helpers\Reflection\Reflection;
use PHPUnit\Framework\TestCase;

class CountryTest extends TestCase
{
    /**
     * @test
     */
    public function testSetIdenficationCode(): void
    {
        $country = new Country();
        $expectedProperty = CountryCode::CZ;
        $country->setIdentificationCode($expectedProperty);
        $property = Reflection::getHiddenProperty($country, 'identificationCode');
        $this->assertEquals($expectedProperty, $property);
    }

    /**
     * @test
     */
    public function testSetIdenficationCode_invalid(): void
    {
        $country = new Country();
        $this->expectException(\Exception::class);
        $country->setIdentificationCode('test');
    }

    /**
     * @test
     */
    public function testSetName(): void
    {
        $country = new Country();
        $expectedProperty = CountryCode::getNameFromCode(CountryCode::CZ);
        $country->setIdentificationCode(CountryCode::CZ);
        $property = Reflection::getHiddenProperty($country, 'name');
        $this->assertEquals($expectedProperty, $property);
    }
}
