<?php

namespace Isdoc\Tests;

use Isdoc\Contact;
use PHPUnit\Framework\TestCase;
use Cetria\Helpers\Reflection\Reflection;

class ContactTest extends TestCase
{
    /**
     * @test
     */
    public function testSetName(): void
    {
        $contact = new Contact();
        $expectedProperty = 'pepa zdepa';
        $contact->setName($expectedProperty);
        $property = Reflection::getHiddenProperty($contact, 'name');
        $this->assertEquals($expectedProperty, $property);
    }

    /**
     * @test
     */
    public function testSetTelephone(): void
    {
        $contact = new Contact();
        $expectedProperty = '123456789';
        $contact->setTelephone($expectedProperty);
        $property = Reflection::getHiddenProperty($contact, 'telephone');
        $this->assertEquals($expectedProperty, $property);
    }

    /**
     * @test
     */
    public function testSetElectronicMail(): void
    {
        $contact = new Contact();
        $expectedProperty = 'pepazdepa@google.com';
        $contact->setElectronicMail($expectedProperty);
        $property = Reflection::getHiddenProperty($contact, 'electronicMail');
        $this->assertEquals($expectedProperty, $property);
    }
}
