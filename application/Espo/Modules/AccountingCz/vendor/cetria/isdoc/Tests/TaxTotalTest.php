<?php

namespace Isdoc\Tests;

use Isdoc\TaxTotal;
use PHPUnit\Framework\TestCase;
use Cetria\Helpers\Reflection\Reflection;

class TaxTotalTest extends TestCase
{
    /**
     * @test
     */
    public function testSetTaxSubsTotal(): void
    {
        $taxTotal = new TaxTotal(false);
        $expectedProperty = [];
        $taxTotal->setTaxSubsTotal($expectedProperty);
        $property = Reflection::getHiddenProperty($taxTotal, 'taxSubsTotal');
        $this->assertEquals($expectedProperty, $property);
    }

    /**
     * @test
     */
    public function testSetTaxAmountCurr(): void
    {
        $taxTotal = new TaxTotal(true);
        $expectedProperty = 999;
        $taxTotal->setTaxAmountCurr($expectedProperty);
        $property = Reflection::getHiddenProperty($taxTotal, 'taxAmountCurr');
        $this->assertEquals($expectedProperty, $property);
    }

    /**
     * @test
     */
    public function testSetTaxAmount(): void
    {
        $taxTotal = new TaxTotal(false);
        $expectedProperty = 999;
        $taxTotal->setTaxAmount($expectedProperty);
        $property = Reflection::getHiddenProperty($taxTotal, 'taxAmount');
        $this->assertEquals($expectedProperty, $property);
    }

    /**
     * @test
     */
    public function testValidateForeignCurrValues_foreignValid(): void
    {
        $taxTotal = new TaxTotal(true);
        $taxTotal->setTaxAmountCurr(0);
        $method = Reflection::getHiddenMethod($taxTotal, 'validateForeignCurrValues');
        $method->invoke($taxTotal);
        $this->addToAssertionCount(1);
    }

    /**
     * @test
     */
    public function testValidateForeignCurrValues_foreignInvalid(): void
    {
        $taxTotal = new TaxTotal(true);
        $method = Reflection::getHiddenMethod($taxTotal, 'validateForeignCurrValues');
        $this->expectException(\Exception::class);
        $method->invoke($taxTotal);
    }

    /**
     * @test
     */
    public function testValidateForeignCurrValues_domesticValid(): void
    {
        $taxTotal = new TaxTotal(false);
        $method = Reflection::getHiddenMethod($taxTotal, 'validateForeignCurrValues');
        $method->invoke($taxTotal);
        $this->addToAssertionCount(1);
    }

    /**
     * @test
     */
    public function testValidateForeignCurrValues_domesticInvalid(): void
    {
        $taxTotal = new TaxTotal(false);
        $taxTotal->setTaxAmountCurr(0);
        $method = Reflection::getHiddenMethod($taxTotal, 'validateForeignCurrValues');
        $this->expectException(\Exception::class);
        $method->invoke($taxTotal);
    }
}
