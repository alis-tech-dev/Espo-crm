<?php

namespace Isdoc\Tests;

use Isdoc\Item;
use PHPUnit\Framework\TestCase;
use Isdoc\InvoiceLine;
use Isdoc\ClassifiedTaxCategory;
use Cetria\Helpers\Reflection\Reflection;

class InvoiceLineTest extends TestCase
{
    /**
     * @test
     */
    public function testSetId(): void
    {
        $invoiceLine = new InvoiceLine(false);
        $expectedProperty = '123456789';
        $invoiceLine->setId($expectedProperty);
        $property = Reflection::getHiddenProperty($invoiceLine, 'id');
        $this->assertEquals($expectedProperty, $property);
    }

    /**
     * @test
     */
    public function testSetId__invalid(): void
    {
        $invoiceLine = new InvoiceLine(false);
        $expectedProperty = '123456899999999999999999999999999999999999999999999'; // >36 znaků
        $this->expectException(\Exception::class);
        $invoiceLine->setId($expectedProperty);
    }

    /**
     * @test
     */
    public function testSetInvoicedQuantity(): void
    {
        $invoiceLine = new InvoiceLine(false);
        $invoiceLine->setInvoicedQuantity(10, 'např. kusů');
        $quantity = Reflection::getHiddenProperty($invoiceLine, 'invoicedQuantity');
        $this->assertEquals(10, $quantity);
        $quantityUnityCode = Reflection::getHiddenProperty($invoiceLine, 'invoicedQuantityUnitCode');
        $this->assertEquals('např. kusů', $quantityUnityCode);
    }

    /**
     * @test
     */
    public function testSetLineExtensionAmountCurr(): void
    {
        $invoiceLine = new InvoiceLine(true);
        $expectedProperty = 999;
        $invoiceLine->setLineExtensionAmountCurr($expectedProperty);
        $property = Reflection::getHiddenProperty($invoiceLine, 'lineExtensionAmountCurr');
        $this->assertEquals($expectedProperty, $property);
    }

    /**
     * @test
     */
    public function testSetLineExtensionAmount(): void
    {
        $invoiceLine = new InvoiceLine(false);
        $expectedProperty = 999;
        $invoiceLine->setLineExtensionAmount($expectedProperty);
        $property = Reflection::getHiddenProperty($invoiceLine, 'lineExtensionAmount');
        $this->assertEquals($expectedProperty, $property);
    }

    /**
     * @test
     */
    public function testSetLineExtensionAmountTaxInclusiveCurr(): void
    {
        $invoiceLine = new InvoiceLine(true);
        $expectedProperty = 999;
        $invoiceLine->setLineExtensionAmountTaxInclusiveCurr($expectedProperty);
        $property = Reflection::getHiddenProperty($invoiceLine, 'lineExtensionAmountTaxInclusiveCurr');
        $this->assertEquals($expectedProperty, $property);
    }

    /**
     * @test
     */
    public function testSetLineExtensionAmountTaxInclusive(): void
    {
        $invoiceLine = new InvoiceLine(false);
        $expectedProperty = 999;
        $invoiceLine->setLineExtensionAmountTaxInclusive($expectedProperty);
        $property = Reflection::getHiddenProperty($invoiceLine, 'lineExtensionAmountTaxInclusive');
        $this->assertEquals($expectedProperty, $property);
    }

    /**
     * @test
     */
    public function testSetUnitPrice(): void
    {
        $invoiceLine = new InvoiceLine(false);
        $expectedProperty = 999;
        $invoiceLine->setUnitPrice($expectedProperty);
        $property = Reflection::getHiddenProperty($invoiceLine, 'unitPrice');
        $this->assertEquals($expectedProperty, $property);
    }

    /**
     * @test
     */
    public function testSetUnitPriceTaxInclusive(): void
    {
        $invoiceLine = new InvoiceLine(false);
        $expectedProperty = 999;
        $invoiceLine->setUnitPriceTaxInclusive($expectedProperty);
        $property = Reflection::getHiddenProperty($invoiceLine, 'unitPriceTaxInclusive');
        $this->assertEquals($expectedProperty, $property);
    }

    /**
     * @test
     */
    public function testSetClassifiedTaxCategory(): void
    {
        $invoiceLine = new InvoiceLine(false);
        $expectedProperty = new ClassifiedTaxCategory();
        $invoiceLine->setClassifiedTaxCategory($expectedProperty);
        $property = Reflection::getHiddenProperty($invoiceLine, 'classifiedTaxCategory');
        $this->assertEquals($expectedProperty, $property);
    }

    /**
     * @test
     */
    public function testSetItem(): void
    {
        $invoiceLine = new InvoiceLine(false);
        $expectedProperty = new Item();
        $invoiceLine->setItem($expectedProperty);
        $property = Reflection::getHiddenProperty($invoiceLine, 'item');
        $this->assertEquals($expectedProperty, $property);
    }

    /**
     * @test
     */
    public function testValidateForeignCurrValues_foreignValid(): void
    {
        $invoiceLine = new InvoiceLine(true);
        $invoiceLine->setLineExtensionAmountCurr(0);
        $invoiceLine->setLineExtensionAmountTaxInclusiveCurr(0);
        $method = Reflection::getHiddenMethod($invoiceLine, 'validateForeignCurrValues');
        $method->invoke($invoiceLine);
        $this->addToAssertionCount(1);
    }

    /**
     * @test
     */
    public function testValidateForeignCurrValues_foriegnInvalid(): void
    {
        $invoiceLine = new InvoiceLine(true);
        $method = Reflection::getHiddenMethod($invoiceLine, 'validateForeignCurrValues');
        $this->expectException(\Exception::class);
        $method->invoke($invoiceLine);
    }

    /**
     * @test
     */
    public function testValidateForeignCurrValues_domesticValid(): void
    {
        $invoiceLine = new InvoiceLine(false);
        $method = Reflection::getHiddenMethod($invoiceLine, 'validateForeignCurrValues');
        $method->invoke($invoiceLine);
        $this->addToAssertionCount(1);
    }

    /**
     * @test
     */
    public function testValidateForeignCurrValues_domesticInvalid(): void
    {
        $invoiceLine = new InvoiceLine(false);
        $invoiceLine->setLineExtensionAmountCurr(0);
        $method = Reflection::getHiddenMethod($invoiceLine, 'validateForeignCurrValues');
        $this->expectException(\Exception::class);
        $method->invoke($invoiceLine);
    }

     /**
     * @test
     */
    public function testGetClassifiedTaxCategoryVatApplicable(): void
    {
        $classifiedTaxCategory = new ClassifiedTaxCategory();
        $invoiceLine = new InvoiceLine(false);
        $invoiceLine->setClassifiedTaxCategory($classifiedTaxCategory);
        $this->assertEquals('false',$invoiceLine->getClassifiedTaxCategoryVatApplicable());
    }
}
