<?php

namespace Isdoc\Tests;

use PHPUnit\Framework\TestCase;
use Isdoc\LegalMonetaryTotal;
use Cetria\Helpers\Reflection\Reflection;

class LegalMonetaryTotalTest extends TestCase
{
    /**
     * @test
     */
    public function testSetTaxExclusiveAmountCurr(): void
    {
        $legalMonetaryTotal = $this->setLegalMonetaryTotal(true);
        $expectedProperty = 999;
        $legalMonetaryTotal->setTaxExclusiveAmountCurr($expectedProperty);
        $property = Reflection::getHiddenProperty($legalMonetaryTotal, 'taxExclusiveAmountCurr');
        $this->assertEquals($expectedProperty, $property);
    }

    /**
     * @test
     */
    public function testSetTaxExclusiveAmount(): void
    {
        $legalMonetaryTotal = $this->setLegalMonetaryTotal(false);
        $expectedProperty = 999;
        $legalMonetaryTotal->setTaxExclusiveAmount($expectedProperty);
        $property = Reflection::getHiddenProperty($legalMonetaryTotal, 'taxExclusiveAmount');
        $this->assertEquals($expectedProperty, $property);
    }

    /**
     * @test
     */
    public function testSetTaxInclusiveAmountCurr(): void
    {
        $legalMonetaryTotal = $this->setLegalMonetaryTotal(true);
        $expectedProperty = 999;
        $legalMonetaryTotal->setTaxInclusiveAmountCurr($expectedProperty);
        $property = Reflection::getHiddenProperty($legalMonetaryTotal, 'taxInclusiveAmountCurr');
        $this->assertEquals($expectedProperty, $property);
    }

    /**
     * @test
     */
    public function testSetTaxInclusiveAmount(): void
    {
        $legalMonetaryTotal = $this->setLegalMonetaryTotal(false);
        $expectedProperty = 999;
        $legalMonetaryTotal->setTaxInclusiveAmount($expectedProperty);
        $property = Reflection::getHiddenProperty($legalMonetaryTotal, 'taxInclusiveAmount');
        $this->assertEquals($expectedProperty, $property);
    }

    /**
     * @test
     */
    public function testSetAlreadyClaimedTaxExclusiveAmountCurr(): void
    {
        $legalMonetaryTotal = $this->setLegalMonetaryTotal(true);
        $expectedProperty = 999;
        $legalMonetaryTotal->setAlreadyClaimedTaxExclusiveAmountCurr($expectedProperty);
        $property = Reflection::getHiddenProperty($legalMonetaryTotal, 'alreadyClaimedTaxExclusiveAmountCurr');
        $this->assertEquals($expectedProperty, $property);
    }

    /**
     * @test
     */
    public function testSetAlreadyClaimedTaxExclusiveAmount(): void
    {
        $legalMonetaryTotal = $this->setLegalMonetaryTotal(false);
        $expectedProperty = 999;
        $legalMonetaryTotal->setAlreadyClaimedTaxExclusiveAmount($expectedProperty);
        $property = Reflection::getHiddenProperty($legalMonetaryTotal, 'alreadyClaimedTaxExclusiveAmount');
        $this->assertEquals($expectedProperty, $property);
    }

    /**
     * @test
     */
    public function testSetAlreadyClaimedTaxInclusiveAmountCurr(): void
    {
        $legalMonetaryTotal = $this->setLegalMonetaryTotal(true);
        $expectedProperty = 999;
        $legalMonetaryTotal->setAlreadyClaimedTaxInclusiveAmountCurr($expectedProperty);
        $property = Reflection::getHiddenProperty($legalMonetaryTotal, 'alreadyClaimedTaxInclusiveAmountCurr');
        $this->assertEquals($expectedProperty, $property);
    }

    /**
     * @test
     */
    public function testSetAlreadyClaimedTaxInclusiveAmount(): void
    {
        $legalMonetaryTotal = $this->setLegalMonetaryTotal(false);
        $expectedProperty = 999;
        $legalMonetaryTotal->setAlreadyClaimedTaxInclusiveAmount($expectedProperty);
        $property = Reflection::getHiddenProperty($legalMonetaryTotal, 'alreadyClaimedTaxInclusiveAmount');
        $this->assertEquals($expectedProperty, $property);
    }

    /**
     * @test
     */
    public function testSetDifferenceTaxExclusiveAmountCurr(): void
    {
        $legalMonetaryTotal = $this->setLegalMonetaryTotal(true);
        $expectedProperty = 999;
        $legalMonetaryTotal->setDifferenceTaxExclusiveAmountCurr($expectedProperty);
        $property = Reflection::getHiddenProperty($legalMonetaryTotal, 'differenceTaxExclusiveAmountCurr');
        $this->assertEquals($expectedProperty, $property);
    }

    /**
     * @test
     */
    public function testSetDifferenceTaxExclusiveAmount(): void
    {
        $legalMonetaryTotal = $this->setLegalMonetaryTotal(false);
        $expectedProperty = 999;
        $legalMonetaryTotal->setDifferenceTaxExclusiveAmount($expectedProperty);
        $property = Reflection::getHiddenProperty($legalMonetaryTotal, 'differenceTaxExclusiveAmount');
        $this->assertEquals($expectedProperty, $property);
    }

    /**
     * @test
     */
    public function testSetDifferenceTaxInclusiveAmountCurr(): void
    {
        $legalMonetaryTotal = $this->setLegalMonetaryTotal(true);
        $expectedProperty = 999;
        $legalMonetaryTotal->setDifferenceTaxInclusiveAmountCurr($expectedProperty);
        $property = Reflection::getHiddenProperty($legalMonetaryTotal, 'differenceTaxInclusiveAmountCurr');
        $this->assertEquals($expectedProperty, $property);
    }

    /**
     * @test
     */
    public function testSetDifferenceTaxInclusiveAmount(): void
    {
        $legalMonetaryTotal = $this->setLegalMonetaryTotal(false);
        $expectedProperty = 999;
        $legalMonetaryTotal->setDifferenceTaxInclusiveAmount($expectedProperty);
        $property = Reflection::getHiddenProperty($legalMonetaryTotal, 'differenceTaxInclusiveAmount');
        $this->assertEquals($expectedProperty, $property);
    }

    /**
     * @test
     */
    public function testSetPayableRoundingAmountCurr(): void
    {
        $legalMonetaryTotal = $this->setLegalMonetaryTotal(true);
        $expectedProperty = 999;
        $legalMonetaryTotal->setPayableRoundingAmountCurr($expectedProperty);
        $property = Reflection::getHiddenProperty($legalMonetaryTotal, 'payableRoundingAmountCurr');
        $this->assertEquals($expectedProperty, $property);
    }

    /**
     * @test
     */
    public function testSetPayableRoundingAmount(): void
    {
        $legalMonetaryTotal = $this->setLegalMonetaryTotal(false);
        $expectedProperty = 999;
        $legalMonetaryTotal->setPayableRoundingAmount($expectedProperty);
        $property = Reflection::getHiddenProperty($legalMonetaryTotal, 'payableRoundingAmount');
        $this->assertEquals($expectedProperty, $property);
    }

    /**
     * @test
     */
    public function testSetPaidDepositsAmountCurr(): void
    {
        $legalMonetaryTotal = $this->setLegalMonetaryTotal(true);
        $expectedProperty = 999;
        $legalMonetaryTotal->setPaidDepositsAmountCurr($expectedProperty);
        $property = Reflection::getHiddenProperty($legalMonetaryTotal, 'paidDepositsAmountCurr');
        $this->assertEquals($expectedProperty, $property);
    }

    /**
     * @test
     */
    public function testSetPaidDepositsAmount(): void
    {
        $legalMonetaryTotal = $this->setLegalMonetaryTotal(false);
        $expectedProperty = 999;
        $legalMonetaryTotal->setPaidDepositsAmount($expectedProperty);
        $property = Reflection::getHiddenProperty($legalMonetaryTotal, 'paidDepositsAmount');
        $this->assertEquals($expectedProperty, $property);
    }

    /**
     * @test
     */
    public function testSetPayableAmountCurr(): void
    {
        $legalMonetaryTotal = $this->setLegalMonetaryTotal(true);
        $expectedProperty = 999;
        $legalMonetaryTotal->setPayableAmountCurr($expectedProperty);
        $property = Reflection::getHiddenProperty($legalMonetaryTotal, 'payableAmountCurr');
        $this->assertEquals($expectedProperty, $property);
    }

    /**
     * @test
     */
    public function testSetPayableAmount(): void
    {
        $legalMonetaryTotal = $this->setLegalMonetaryTotal(false);
        $expectedProperty = 999;
        $legalMonetaryTotal->setPayableAmount($expectedProperty);
        $property = Reflection::getHiddenProperty($legalMonetaryTotal, 'payableAmount');
        $this->assertEquals($expectedProperty, $property);
    }

    /**
     * @test
     */
    public function testValidateForeignCurrValues_foreignValid(): void
    {
        $legalMonetaryTotal = $this->setLegalMonetaryTotal(true);
        $legalMonetaryTotal->setTaxExclusiveAmountCurr(0);
        $legalMonetaryTotal->setTaxInclusiveAmountCurr(0);
        $legalMonetaryTotal->setAlreadyClaimedTaxExclusiveAmountCurr(0);
        $legalMonetaryTotal->setAlreadyClaimedTaxInclusiveAmountCurr(0);
        $legalMonetaryTotal->setDifferenceTaxExclusiveAmountCurr(0);
        $legalMonetaryTotal->setDifferenceTaxInclusiveAmountCurr(0);
        $legalMonetaryTotal->setPayableRoundingAmountCurr(0);
        $legalMonetaryTotal->setPaidDepositsAmountCurr(0);
        $legalMonetaryTotal->setPayableAmountCurr(0);
        $method = Reflection::getHiddenMethod($legalMonetaryTotal, 'validateForeignCurrValues');
        $method->invoke($legalMonetaryTotal);
        $this->addToAssertionCount(1);
    }

    /**
     * @test
     */
    public function testValidateForeignCurrValues_foreignInvalid(): void
    {
        $legalMonetaryTotal = $this->setLegalMonetaryTotal(true);
        $method = Reflection::getHiddenMethod($legalMonetaryTotal, 'validateForeignCurrValues');
        $this->expectException(\Exception::class);
        $method->invoke($legalMonetaryTotal);
    }

    /**
     * @test
     */
    public function testValidateForeignCurrValues_domesticValid(): void
    {
        $legalMonetaryTotal = $this->setLegalMonetaryTotal(false);
        $method = Reflection::getHiddenMethod($legalMonetaryTotal, 'validateForeignCurrValues');
        $method->invoke($legalMonetaryTotal);
        $this->addToAssertionCount(1);
    }

    /**
     * @test
     */
    public function testValidateForeignCurrValues_domesticInvalid(): void
    {
        $legalMonetaryTotal = $this->setLegalMonetaryTotal(false);
        $legalMonetaryTotal->setTaxInclusiveAmountCurr(0);
        $method = Reflection::getHiddenMethod($legalMonetaryTotal, 'validateForeignCurrValues');
        $this->expectException(\Exception::class);
        $method->invoke($legalMonetaryTotal);
    }

    private function setLegalMonetaryTotal(bool $hasForeignCurrency): LegalMonetaryTotal
    {
        return new LegalMonetaryTotal($hasForeignCurrency);
    }
}
