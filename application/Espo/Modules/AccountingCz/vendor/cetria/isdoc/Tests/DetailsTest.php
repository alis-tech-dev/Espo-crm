<?php

namespace Isdoc\Tests;

use Isdoc\Details;
use PHPUnit\Framework\TestCase;
use Cetria\Helpers\Reflection\Reflection;

class DetailsTest extends TestCase
{
    /**
     * @test
     */
    public function testSetDocumentId(): void
    {
        $details = $this->setDetails(true);
        $expectedProperty = '123';
        $details->setDocumentId($expectedProperty);
        $property = Reflection::getHiddenProperty($details, 'documentId');
        $this->assertEquals($expectedProperty, $property);
    }

    /**
     * @test
     */
    public function testSetIssueDate(): void
    {
        $details = $this->setDetails(true);
        $expectedProperty = \Carbon\Carbon::now()->format('Y-m-d');
        $details->setIssueDate($expectedProperty);
        $property = Reflection::getHiddenProperty($details, 'issueDate');
        $this->assertEquals($expectedProperty, $property);
    }

    /**
     * @test
     */
    public function testSetPaymentDueDate(): void
    {
        $details = $this->setDetails(true);
        $expectedProperty = \Carbon\Carbon::now()->format('Y-m-d');
        $details->setPaymentDueDate($expectedProperty);
        $property = Reflection::getHiddenProperty($details, 'paymentDueDate');
        $this->assertEquals($expectedProperty, $property);
    }

    /**
     * @test
     */
    public function testSetId(): void
    {
        $details = $this->setDetails(true);
        $expectedProperty = '123';
        $details->setId($expectedProperty);
        $property = Reflection::getHiddenProperty($details, 'id');
        $this->assertEquals($expectedProperty, $property);
    }

     /**
     * @test
     */
    public function testValidateNumeric_invalid(): void
    {
        $details = $this->setDetails(true);
        $method = Reflection::getHiddenMethod($details,'validateNumeric');
        $this->expectException(\Exception::class);
        $method->invokeArgs($details,['0123546789ABCD','test']);
    }

    /**
     * @test
     */
    public function testSetBankCode(): void
    {
        $details = $this->setDetails(true);
        $expectedProperty = '123';
        $details->setBankCode($expectedProperty);
        $property = Reflection::getHiddenProperty($details, 'bankCode');
        $this->assertEquals($expectedProperty, $property);
    }


    /**
     * @test
     */
    public function testSetName(): void
    {
        $details = $this->setDetails(true);
        $expectedProperty = 'banka123';
        $details->setName($expectedProperty);
        $property = Reflection::getHiddenProperty($details, 'name');
        $this->assertEquals($expectedProperty, $property);
    }

    /**
     * @test
     */
    public function testIban(): void
    {
        $details = $this->setDetails(true);
        $expectedProperty = '123';
        $details->setIban($expectedProperty);
        $property = Reflection::getHiddenProperty($details, 'iban');
        $this->assertEquals($expectedProperty, $property);
    }

    /**
     * @test
     */
    public function testBic(): void
    {
        $details = $this->setDetails(true);
        $expectedProperty = '123';
        $details->setBic($expectedProperty);
        $property = Reflection::getHiddenProperty($details, 'bic');
        $this->assertEquals($expectedProperty, $property);
    }

    /**
     * @test
     */
    public function testSetVariableSymbol(): void
    {
        $details = $this->setDetails(true);
        $expectedProperty = '0123';
        $details->setVariableSymbol($expectedProperty);
        $property = Reflection::getHiddenProperty($details, 'variableSymbol');
        $this->assertEquals($expectedProperty, $property);
    }

    /**
     * @test
     */
    public function testSetConstantSymbol(): void
    {
        $details = $this->setDetails(true);
        $expectedProperty = '0123';
        $details->setConstantSymbol($expectedProperty);
        $property = Reflection::getHiddenProperty($details, 'constantSymbol');
        $this->assertEquals($expectedProperty, $property);
    }

    /**
     * @test
     */
    public function testSetSpecificSymbol(): void
    {
        $details = $this->setDetails(true);
        $expectedProperty = '0123';
        $details->setSpecificSymbol($expectedProperty);
        $property = Reflection::getHiddenProperty($details, 'specificSymbol');
        $this->assertEquals($expectedProperty, $property);
    }

    protected function setDetails(bool $hasBankDetails): Details
    {
        return new Details($hasBankDetails);
    }
}
