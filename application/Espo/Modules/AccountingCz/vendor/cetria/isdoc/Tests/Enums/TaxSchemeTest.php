<?php

namespace Isdoc\Tests\Enums;

use Isdoc\Enums\TaxScheme;
use PHPUnit\Framework\TestCase;

class TaxSchemeTest extends TestCase
{
    /**
     * @test
     */
    public function testValidate_invalid(): void
    {
        $this->expectException(\Exception::class);
        TaxScheme::validate('test');
    }

    /**
     * @test
     */
    public function testValidate_null(): void
    {
        $this->assertEquals(null,TaxScheme::validate(null));
    }

    /**
     * @test
     */
    public function testValidate_emptyString(): void
    {
        $this->assertEquals('',TaxScheme::validate(''));
    }
}
