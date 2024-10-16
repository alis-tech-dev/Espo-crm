<?php

namespace Isdoc\Tests;

use Isdoc\Enums\NoteTagName;
use PHPUnit\Framework\TestCase;

class NoteTagNameTest extends TestCase
{
    /**
     * @test
     */
    public function testValidate(): void
    {
        $value = NoteTagName::validate(NoteTagName::NOTE);
        $this->assertEquals(NoteTagName::NOTE, $value);
    }

    /**
     * @test
     */
    public function testValidate_invalid(): void
    {
        $this->expectException(\Exception::class);
        NoteTagName::validate('test');
    }
}
