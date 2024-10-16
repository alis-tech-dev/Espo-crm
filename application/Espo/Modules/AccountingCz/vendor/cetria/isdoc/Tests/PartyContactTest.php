<?php

namespace Isdoc\Tests;

use Isdoc\Contact;
use Isdoc\PartyContact;
use Isdoc\PostalAddress;
use Isdoc\PartyIdentification;
use PHPUnit\Framework\TestCase;
use Cetria\Helpers\Reflection\Reflection;

class PartyContactTest extends TestCase
{
    /**
     * @test
     */
    public function testSetPartyIdentification(): void
    {
        $partyContact = new PartyContact();
        $expectedProperty = new PartyIdentification();
        $partyContact->setPartyIdentification($expectedProperty);
        $property = Reflection::getHiddenProperty($partyContact, 'partyIdentification');
        $this->assertEquals($expectedProperty, $property);
    }

    /**
     * @test
     */
    public function testSetName(): void
    {
        $partyContact = new PartyContact();
        $expectedProperty = 'gigaprint';
        $partyContact->setName($expectedProperty);
        $property = Reflection::getHiddenProperty($partyContact, 'name');
        $this->assertEquals($expectedProperty, $property);
    }

    /**
     * @test
     */
    public function testSetPostalAddress(): void
    {
        $partyContact = new PartyContact();
        $expectedProperty = new PostalAddress();
        $partyContact->setPostalAddress($expectedProperty);
        $property = Reflection::getHiddenProperty($partyContact, 'postalAddress');
        $this->assertEquals($expectedProperty, $property);
    }

    /**
     * @test
     */
    public function testSetPartyTaxSchemes(): void
    {
        $partyContact = new PartyContact();
        $expectedProperty = [];
        $partyContact->setPartyTaxSchemes($expectedProperty);
        $property = Reflection::getHiddenProperty($partyContact, 'partyTaxSchemes');
        $this->assertEquals($expectedProperty, $property);
    }

    /**
     * @test
     */
    public function testSetContact(): void
    {
        $partyContact = new PartyContact();
        $expectedProperty = new Contact();
        $partyContact->setContact($expectedProperty);
        $property = Reflection::getHiddenProperty($partyContact, 'contact');
        $this->assertEquals($expectedProperty, $property);
    }
}
