<?php

namespace Isdoc\Tests\Enums;

use PHPUnit\Framework\TestCase;
use Isdoc\Enums\VatCalculationMethod;


class VatCalculationMethodTest extends TestCase
{
    /**
     * @test
     */
    public function testValidate(): void
    {
        $this->assertEquals(VatCalculationMethod::ZDOLA, VatCalculationMethod::validate(VatCalculationMethod::ZDOLA));
    }

    /**
     * @test
     */
    public function testValidate_invalid(): void
    {
        $this->expectException(\Exception::class);
        VatCalculationMethod::validate(123);
    }
}
