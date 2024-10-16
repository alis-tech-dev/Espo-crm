<?php

namespace Isdoc\Tests;

use PHPUnit\Framework\TestCase;
use Isdoc\TaxCategory;
use Isdoc\TaxSubTotal;
use Cetria\Helpers\Reflection\Reflection;

class TaxSubTotalTest extends TestCase
{
    /**
     * @test
     */
    public function testSetTaxableAmountCurr(): void
    {
        $taxSubTotal = new TaxSubTotal(true);
        $expectedProperty = 999;
        $taxSubTotal->setTaxableAmountCurr($expectedProperty);
        $property = Reflection::getHiddenProperty($taxSubTotal, 'taxableAmountCurr');
        $this->assertEquals($expectedProperty, $property);
    }

    /**
     * @test
     */
    public function testSetTaxableAmount(): void
    {
        $taxSubTotal = new TaxSubTotal(false);
        $expectedProperty = 999;
        $taxSubTotal->setTaxableAmount($expectedProperty);
        $property = Reflection::getHiddenProperty($taxSubTotal, 'taxableAmount');
        $this->assertEquals($expectedProperty, $property);
    }

    /**
     * @test
     */
    public function testSetTaxAmountCurr(): void
    {
        $taxSubTotal = new TaxSubTotal(true);
        $expectedProperty = 999;
        $taxSubTotal->setTaxAmountCurr($expectedProperty);
        $property = Reflection::getHiddenProperty($taxSubTotal, 'taxAmountCurr');
        $this->assertEquals($expectedProperty, $property);
    }

    /**
     * @test
     */
    public function testSetTaxAmount(): void
    {
        $taxSubTotal = new TaxSubTotal(false);
        $expectedProperty = 999;
        $taxSubTotal->setTaxAmount($expectedProperty);
        $property = Reflection::getHiddenProperty($taxSubTotal, 'taxAmount');
        $this->assertEquals($expectedProperty, $property);
    }

    /**
     * @test
     */
    public function testSetTaxInclusiveAmountCurr(): void
    {
        $taxSubTotal = new TaxSubTotal(true);
        $expectedProperty = 999;
        $taxSubTotal->setTaxInclusiveAmountCurr($expectedProperty);
        $property = Reflection::getHiddenProperty($taxSubTotal, 'taxInclusiveAmountCurr');
        $this->assertEquals($expectedProperty, $property);
    }

    /**
     * @test
     */
    public function testSetTaxInclusiveAmount(): void
    {
        $taxSubTotal = new TaxSubTotal(false);
        $expectedProperty = 999;
        $taxSubTotal->setTaxInclusiveAmount($expectedProperty);
        $property = Reflection::getHiddenProperty($taxSubTotal, 'taxInclusiveAmount');
        $this->assertEquals($expectedProperty, $property);
    }

    /**
     * @test
     */
    public function testSetAlreadyClaimedTaxableAmountCurr(): void
    {
        $taxSubTotal = new TaxSubTotal(true);
        $expectedProperty = 999;
        $taxSubTotal->setAlreadyClaimedTaxableAmountCurr($expectedProperty);
        $property = Reflection::getHiddenProperty($taxSubTotal, 'alreadyClaimedTaxableAmountCurr');
        $this->assertEquals($expectedProperty, $property);
    }

    /**
     * @test
     */
    public function testSetAlreadyClaimedTaxableAmount(): void
    {
        $taxSubTotal = new TaxSubTotal(false);
        $expectedProperty = 999;
        $taxSubTotal->setAlreadyClaimedTaxableAmount($expectedProperty);
        $property = Reflection::getHiddenProperty($taxSubTotal, 'alreadyClaimedTaxableAmount');
        $this->assertEquals($expectedProperty, $property);
    }

    /**
     * @test
     */
    public function testSetAlreadyClaimedTaxAmountCurr(): void
    {
        $taxSubTotal = new TaxSubTotal(true);
        $expectedProperty = 999;
        $taxSubTotal->setAlreadyClaimedTaxAmountCurr($expectedProperty);
        $property = Reflection::getHiddenProperty($taxSubTotal, 'alreadyClaimedTaxAmountCurr');
        $this->assertEquals($expectedProperty, $property);
    }

    /**
     * @test
     */
    public function testSetAlreadyClaimedTaxAmount(): void
    {
        $taxSubTotal = new TaxSubTotal(false);
        $expectedProperty = 999;
        $taxSubTotal->setAlreadyClaimedTaxAmount($expectedProperty);
        $property = Reflection::getHiddenProperty($taxSubTotal, 'alreadyClaimedTaxAmount');
        $this->assertEquals($expectedProperty, $property);
    }

    /**
     * @test
     */
    public function testSetAlreadyClaimedTaxInclusiveAmountCurr(): void
    {
        $taxSubTotal = new TaxSubTotal(true);
        $expectedProperty = 999;
        $taxSubTotal->setAlreadyClaimedTaxInclusiveAmountCurr($expectedProperty);
        $property = Reflection::getHiddenProperty($taxSubTotal, 'alreadyClaimedTaxInclusiveAmountCurr');
        $this->assertEquals($expectedProperty, $property);
    }

    /**
     * @test
     */
    public function testSetAlreadyClaimedTaxInclusiveAmount(): void
    {
        $taxSubTotal = new TaxSubTotal(false);
        $expectedProperty = 999;
        $taxSubTotal->setAlreadyClaimedTaxInclusiveAmount($expectedProperty);
        $property = Reflection::getHiddenProperty($taxSubTotal, 'alreadyClaimedTaxInclusiveAmount');
        $this->assertEquals($expectedProperty, $property);
    }

    /**
     * @test
     */
    public function testSetDifferenceTaxableAmountCurr(): void
    {
        $taxSubTotal = new TaxSubTotal(true);
        $expectedProperty = 999;
        $taxSubTotal->setDifferenceTaxableAmountCurr($expectedProperty);
        $property = Reflection::getHiddenProperty($taxSubTotal, 'differenceTaxableAmountCurr');
        $this->assertEquals($expectedProperty, $property);
    }

    /**
     * @test
     */
    public function testSetDifferenceTaxableAmount(): void
    {
        $taxSubTotal = new TaxSubTotal(false);
        $expectedProperty = 999;
        $taxSubTotal->setDifferenceTaxableAmount($expectedProperty);
        $property = Reflection::getHiddenProperty($taxSubTotal, 'differenceTaxableAmount');
        $this->assertEquals($expectedProperty, $property);
    }

    /**
     * @test
     */
    public function testSetDifferenceTaxAmountCurr(): void
    {
        $taxSubTotal = new TaxSubTotal(true);
        $expectedProperty = 999;
        $taxSubTotal->setDifferenceTaxAmountCurr($expectedProperty);
        $property = Reflection::getHiddenProperty($taxSubTotal, 'differenceTaxAmountCurr');
        $this->assertEquals($expectedProperty, $property);
    }

    /**
     * @test
     */
    public function testSetDifferenceTaxAmount(): void
    {
        $taxSubTotal = new TaxSubTotal(false);
        $expectedProperty = 999;
        $taxSubTotal->setDifferenceTaxAmount($expectedProperty);
        $property = Reflection::getHiddenProperty($taxSubTotal, 'differenceTaxAmount');
        $this->assertEquals($expectedProperty, $property);
    }

    /**
     * @test
     */
    public function testSetDifferenceTaxInclusiveAmountCurr(): void
    {
        $taxSubTotal = new TaxSubTotal(true);
        $expectedProperty = 999;
        $taxSubTotal->setDifferenceTaxInclusiveAmountCurr($expectedProperty);
        $property = Reflection::getHiddenProperty($taxSubTotal, 'differenceTaxInclusiveAmountCurr');
        $this->assertEquals($expectedProperty, $property);
    }

    /**
     * @test
     */
    public function testSetDifferenceTaxInclusiveAmount(): void
    {
        $taxSubTotal = new TaxSubTotal(false);
        $expectedProperty = 999;
        $taxSubTotal->setDifferenceTaxInclusiveAmount($expectedProperty);
        $property = Reflection::getHiddenProperty($taxSubTotal, 'differenceTaxInclusiveAmount');
        $this->assertEquals($expectedProperty, $property);
    }

    /**
     * @test
     */
    public function testSetTaxCategory(): void
    {
        $taxSubTotal = new TaxSubTotal(true);
        $expectedProperty = new TaxCategory();
        $taxSubTotal->setTaxCategory($expectedProperty);
        $property = Reflection::getHiddenProperty($taxSubTotal, 'taxCategory');
        $this->assertEquals($expectedProperty, $property);
    }

    /**
     * @test
     */
    public function testValidateForeignCurrValues_foreignValid(): void
    {
        $taxSubTotal = new TaxSubTotal(true);
        $taxSubTotal->setTaxableAmountCurr(0);
        $taxSubTotal->setTaxAmountCurr(0);
        $taxSubTotal->setTaxInclusiveAmountCurr(0);
        $taxSubTotal->setAlreadyClaimedTaxableAmountCurr(0);
        $taxSubTotal->setAlreadyClaimedTaxAmountCurr(0);
        $taxSubTotal->setAlreadyClaimedTaxInclusiveAmountCurr(0);
        $taxSubTotal->setDifferenceTaxableAmountCurr(0);
        $taxSubTotal->setDifferenceTaxAmountCurr(0);
        $taxSubTotal->setDifferenceTaxInclusiveAmountCurr(0);

        $method = Reflection::getHiddenMethod($taxSubTotal, 'validateForeignCurrValues');
        $method->invoke($taxSubTotal);
        $this->addToAssertionCount(1);
    }

    /**
     * @test
     */
    public function testValidateForeignCurrValues_foreignInvalid(): void
    {
        $taxSubTotal = new TaxSubTotal(true);
        $method = Reflection::getHiddenMethod($taxSubTotal, 'validateForeignCurrValues');
        $this->expectException(\Exception::class);
        $method->invoke($taxSubTotal);
    }

    /**
     * @test
     */
    public function testValidateForeignCurrValues_domesticValid(): void
    {
        $taxSubTotal = new TaxSubTotal(false);
        $method = Reflection::getHiddenMethod($taxSubTotal, 'validateForeignCurrValues');
        $method->invoke($taxSubTotal);
        $this->addToAssertionCount(1);
    }

    /**
     * @test
     */
    public function testValidateForeignCurrValues_domesticInvalid(): void
    {
        $taxSubTotal = new TaxSubTotal(false);
        $taxSubTotal->setTaxAmountCurr(0);
        $method = Reflection::getHiddenMethod($taxSubTotal, 'validateForeignCurrValues');
        $this->expectException(\Exception::class);
        $method->invoke($taxSubTotal);
    }
}
