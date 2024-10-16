<?php

namespace Isdoc\Tests\Enums;

use PHPUnit\Framework\TestCase;
use Isdoc\Enums\DocumentType;

class DocumentTypeTest extends TestCase
{
    /**
     * @test
     */
    public function testValidate(): void
    {
        $value = DocumentType::validate(DocumentType::PROFORMA);
        $this->assertEquals(DocumentType::PROFORMA, $value);
    }

    /**
     * @test
     */
    public function testValidate_invalid(): void
    {
        $this->expectException(\Exception::class);
        DocumentType::validate(123);
    }
}
