<?php

namespace Isdoc\Tests;

use PHPUnit\Framework\TestCase;
use Isdoc\PartyTaxScheme;
use Cetria\Helpers\Reflection\Reflection;
use Isdoc\Enums\TaxScheme;

class PartyTaxSchemeTest extends TestCase
{
    /**
     * @test
     */
    public function testSetCompanyId(): void
    {
        $partyTaxScheme = new PartyTaxScheme();
        $expectedProperty = 'CZ00001111';
        $partyTaxScheme->setCompanyId($expectedProperty);
        $property = Reflection::getHiddenProperty($partyTaxScheme, 'companyId');
        $this->assertEquals($expectedProperty, $property);
    }

    /**
     * @test
     */
    public function testSetTaxScheme(): void
    {
        $partyTaxScheme = new PartyTaxScheme();
        $expectedProperty = TaxScheme::VAT;
        $partyTaxScheme->setTaxScheme($expectedProperty);
        $property = Reflection::getHiddenProperty($partyTaxScheme, 'taxScheme');
        $this->assertEquals($expectedProperty, $property);
    }

        /**
     * @test
     */
    public function testSetTaxScheme_invalid(): void
    {
        $partyTaxScheme = new PartyTaxScheme();
        $expectedProperty = 'test';
        $this->expectException(\Exception::class);
        $partyTaxScheme->setTaxScheme($expectedProperty);
    }
}
