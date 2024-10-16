<?php

namespace Isdoc\Tests;

use Isdoc\Details;
use Isdoc\Payment;
use PHPUnit\Framework\TestCase;
use Isdoc\Enums\PaymentMeansCode;
use Cetria\Helpers\Reflection\Reflection;

class PaymentTest extends TestCase
{
    /**
     * @test
     */
    public function testSetPaidAmount(): void
    {
        $payment = $this->setPayment(false);
        $expectedProperty = 50;
        $payment->setPaidAmount($expectedProperty);
        $property = Reflection::getHiddenProperty($payment, 'paidAmount');
        $this->assertEquals($expectedProperty, $property);
    }

    /**
     * @test
     */
    public function testSetPaymentMeansCode(): void
    {
        $payment = $this->setPayment(false);
        $expectedProperty = PaymentMeansCode::BANK_TRANSFER;
        $payment->setPaymentMeansCode($expectedProperty);
        $property = Reflection::getHiddenProperty($payment, 'paymentMeansCode');
        $this->assertEquals($expectedProperty, $property);
    }

    /**
     * @test
     */
    public function testSetPaymentMeansCode_invalid(): void
    {
        $payment = $this->setPayment(false);
        $expectedProperty = 123456789;
        $this->expectException(\Exception::class);
        $payment->setPaymentMeansCode($expectedProperty);
    }

    /**
     * @test
     */
    public function testSetDetails(): void
    {
        $payment  = $this->setPayment(false);
        $expectedProperty = new Details(true);
        $payment->setDetails($expectedProperty);
        $property = Reflection::getHiddenProperty($payment, 'details');
        $this->assertEquals($expectedProperty, $property);
    }

    protected function setPayment(bool $hasPartialPayment): Payment
    {
        return new Payment($hasPartialPayment);
    }
}
