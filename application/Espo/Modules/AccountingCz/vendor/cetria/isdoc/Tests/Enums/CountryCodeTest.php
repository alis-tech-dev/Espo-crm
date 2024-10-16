<?php

namespace Isdoc\Tests\Enums;

use PHPUnit\Framework\TestCase;
use Isdoc\Enums\CountryCode;

class CountryCodeTest extends TestCase
{

    /**
     * @test
     */
    public function testValidate(): void
    {
        $value = CountryCode::validate(CountryCode::CZ);
        $this->assertEquals(CountryCode::CZ, $value);
    }

    /**
     * @test
     */
    public function testValidate_invalid(): void
    {
        $this->expectException(\Exception::class);
        CountryCode::validate('test');
    }

    /**
     * @test
     */
    public function testGetNameFromCode(): void
    {
        $name = CountryCode::getNameFromCode(CountryCode::CZ);
        $this->assertEquals('Česká republika', $name);
    }

    /**
     * @test
     */
    public function testGetNameFromCode_invalid(): void
    {
        $this->expectException(\Exception::class);
        CountryCode::getNameFromCode('test');
    }
}
