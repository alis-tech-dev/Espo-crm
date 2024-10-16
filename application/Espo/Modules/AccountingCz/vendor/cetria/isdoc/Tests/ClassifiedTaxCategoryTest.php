<?php

namespace Isdoc\Tests;

use PHPUnit\Framework\TestCase;
use Isdoc\ClassifiedTaxCategory;
use Cetria\Helpers\Reflection\Reflection;

class ClassifiedTaxCategoryTest extends TestCase
{
    /**
     * @test
     */
    public function testSetPercent(): void
    {
        $classifiedTaxCategory = new ClassifiedTaxCategory();
        $expectedProperty = 21;
        $classifiedTaxCategory->setPercent($expectedProperty);
        $property = Reflection::getHiddenProperty($classifiedTaxCategory, 'percent');
        $this->assertEquals($expectedProperty, $property);
    }

    /**
     * @test
     */
    public function testSetVatCalculationMethod(): void
    {
        $classifiedTaxCategory = new ClassifiedTaxCategory();
        $expectedProperty = 0;
        $classifiedTaxCategory->setVatCalculationMethod($expectedProperty);
        $property = Reflection::getHiddenProperty($classifiedTaxCategory, 'vatCalculationMethod');
        $this->assertEquals($expectedProperty, $property);
    }

    /**
     * @test
     */
    public function testSetVatCalculationMethod_invalid(): void
    {
        $classifiedTaxCategory = new ClassifiedTaxCategory();
        $expectedProperty = 2;
        $this->expectException(\Exception::class);
        $classifiedTaxCategory->setVatCalculationMethod($expectedProperty);
    }

    /**
     * @test
     */
    public function testSetVatApplicable(): void
    {
        $classifiedTaxCategory = new ClassifiedTaxCategory();
        $expectedProperty = true;
        $classifiedTaxCategory->setVatApplicable($expectedProperty);
        $property = Reflection::getHiddenProperty($classifiedTaxCategory, 'vatApplicable');
        $this->assertEquals($expectedProperty, $property);
    }

     /**
     * @test
     */
    public function testGetVatApplicable(): void
    {
        $classifiedTaxCategory = new ClassifiedTaxCategory();
        $this->assertEquals('false',$classifiedTaxCategory->getVatApplicable());
    }
}
