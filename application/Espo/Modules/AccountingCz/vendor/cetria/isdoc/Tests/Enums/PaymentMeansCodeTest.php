<?php

namespace Isdoc\Tests\Enums;

use PHPUnit\Framework\TestCase;
use Isdoc\Enums\PaymentMeansCode;


class PaymentMeansCodeTest extends TestCase
{

    /**
     * @test
     */
    public function testValidate(): void
    {
        $value = PaymentMeansCode::validate(PaymentMeansCode::CASH);
        $this->assertEquals(PaymentMeansCode::CASH, $value);
    }

    /**
     * @test
     */
    public function testValidate_invalid(): void
    {
        $this->expectException(\Exception::class);
        PaymentMeansCode::validate(123);
    }
}
