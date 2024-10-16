<?php

namespace Isdoc\Tests\Enums;

use PHPUnit\Framework\TestCase;
use Isdoc\Enums\CurrencyCode;

class CurrencyCodeTest extends TestCase
{
    /**
     * @test
     */
    public function testValidate(): void
    {
        $value = CurrencyCode::validate(CurrencyCode::EUR);
        $this->assertEquals(CurrencyCode::EUR, $value);
    }

    /**
     * @test
     */
    public function testValidate_invalid(): void
    {
        $this->expectException(\Exception::class);
        CurrencyCode::validate('test');
    }
}
