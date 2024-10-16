<?php

namespace Isdoc\Tests\Traits;

use Isdoc\Enums\NoteTagName;
use Isdoc\Note;
use PHPUnit\Framework\TestCase;

class StringConversionTest extends TestCase

{
    /**
     * @test
     */
    public function testToString_withoutDeclaration(): void
    {
        $note = new Note(NoteTagName::NOTE);
        $string = $note->toString();
        $this->assertEquals('<note languageID=""></note>' . PHP_EOL, $string);
    }

    /**
     * @test
     */
    public function testToString_withDeclaration(): void
    {
        $note = new Note(NoteTagName::NOTE);
        $string = $note->toString(true);
        $this->assertEquals('<?xml version="1.0" encoding="utf-8"?>' . PHP_EOL . '<note languageID=""></note>' . PHP_EOL, $string);
    }
}
