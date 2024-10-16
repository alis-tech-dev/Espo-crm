<?php

namespace Isdoc\Tests;

use PHPUnit\Framework\TestCase;
use Isdoc\TaxCategory;
use Cetria\Helpers\Reflection\Reflection;
use Isdoc\Enums\TaxScheme;

class TaxCategoryTest extends TestCase
{
    /**
     * @test
     */
    public function testSetPercent(): void
    {
        $taxCategory = new TaxCategory();
        $expectedProperty = 21;
        $taxCategory->setPercent($expectedProperty);
        $property = Reflection::getHiddenProperty($taxCategory, 'percent');
        $this->assertEquals($expectedProperty, $property);
    }

    /**
     * @test
     */
    public function testTaxScheme(): void
    {
        $taxCategory = new TaxCategory();
        $expectedProperty = TaxScheme::VAT;
        $taxCategory->setTaxScheme($expectedProperty);
        $property = Reflection::getHiddenProperty($taxCategory, 'taxScheme');
        $this->assertEquals($expectedProperty, $property);
    }

    /**
     * @test
     */
    public function testTaxScheme_invalid(): void
    {
        $taxCategory = new TaxCategory();
        $expectedProperty = 'test';
        $this->expectException(\Exception::class);
        $taxCategory->setTaxScheme($expectedProperty);
    }
}
