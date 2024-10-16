<?php

namespace Isdoc\Tests;

use PHPUnit\Framework\TestCase;
use Isdoc\OriginalDocumentReference;
use Cetria\Helpers\Reflection\Reflection;

class OriginalDocumentReferenceTest extends TestCase
{
    /**
     * @test
     */
    public function testSetId(): void
    {
        $originalDocumentReference = new OriginalDocumentReference('123');
        $expectedProperty = '246';
        $originalDocumentReference->setId($expectedProperty);
        $property = Reflection::getHiddenProperty($originalDocumentReference, 'id');
        $this->assertEquals($expectedProperty, $property);
    }

    /**
     * @test
     */
    public function testSetIssueDate(): void
    {
        $originalDocumentReference = new OriginalDocumentReference('123');
        $expectedProperty = \Carbon\Carbon::now()->format('Y-m-d');
        $originalDocumentReference->setIssueDate($expectedProperty);
        $property = Reflection::getHiddenProperty($originalDocumentReference, 'issueDate');
        $this->assertEquals($expectedProperty, $property);
    }

    /**
     * @test
     */
    public function testSetUuid(): void
    {
        $originalDocumentReference = new OriginalDocumentReference('123');
        $expectedProperty = 'uuid-string';
        $originalDocumentReference->setUuid($expectedProperty);
        $property = Reflection::getHiddenProperty($originalDocumentReference, 'uuid');
        $this->assertEquals($expectedProperty, $property);
    }

}
