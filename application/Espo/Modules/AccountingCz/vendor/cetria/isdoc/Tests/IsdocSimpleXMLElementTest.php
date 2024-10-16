<?php

namespace Isdoc\Tests;

use DOMDocument;
use PHPUnit\Framework\TestCase;
use Isdoc\IsdocSimpleXMLElement;

class IsdocSimpleXMLElementTest extends TestCase
{
    /**
     * @test
     */
    public function testAppendXML_emptyTag(): void
    {
        $parent = new IsdocSimpleXMLElement('<parent></parent>');
        $parent->appendXML('<child></child>');
        $childValue = $parent->xpath('/parent/child');
        $this->assertEquals('<child/>', $childValue[0]->asXml());
    }

    /**
     * @test
     */
    public function testAppendXML(): void
    {
        $parent = new IsdocSimpleXMLElement('<parent></parent>');
        $parent->appendXML('<child>test</child>');
        $childValue = $parent->xpath('/parent/child');
        $this->assertEquals('<child>test</child>', $childValue[0]->asXml());
    }


    /**
     * @test
     */
    public function testAppendSimpleXMLElement(): void
    {
        $parent = new IsdocSimpleXMLElement('<parent></parent>');
        $child = new IsdocSimpleXMLElement('<child></child>');
        $parent->appendSimpleXMLElement($child);
        $childValue = $parent->xpath('/parent/child');
        $this->assertEquals($child, $childValue[0]);
    }

    /**
     * @test
     */
    public function testAddChildOptional_childAdded(): void
    {
        $parent = new IsdocSimpleXMLElement('<parent></parent>');
        $parent->addChildOptional('childOptional', 'isSet');
        $child = $parent->xpath('/parent/childOptional');
        $this->assertEquals('isSet', $child[0]);
    }

    /**
     * @test
     */
    public function testAddChildOptional_childNotAdded(): void
    {
        $parent = new IsdocSimpleXMLElement('<parent></parent>');
        $parent->addChildOptional('childOptional', null);
        $child = $parent->xpath('/parent/childOptional');
        $this->assertEquals([], $child);
    }
}
