<?php

namespace Isdoc\Tests\Enums;

use PHPUnit\Framework\TestCase;
use Isdoc\Enums\LanguageCode;

class LanguageCodeTest extends TestCase
{
    /**
     * @test
     */
    public function testValidate(): void
    {
        $value =  LanguageCode::validate(LanguageCode::CS);
        $this->assertEquals(LanguageCode::CS, $value);
    }

    /**
     * @test
     */
    public function testValidate_invalid(): void
    {
        $this->expectException(\Exception::class);
        LanguageCode::validate('test');
    }
}
