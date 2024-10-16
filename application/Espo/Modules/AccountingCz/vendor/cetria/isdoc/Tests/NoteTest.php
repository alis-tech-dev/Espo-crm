<?php

namespace Isdoc\Tests;

use Isdoc\Note;
use PHPUnit\Framework\TestCase;
use Isdoc\Enums\LanguageCode;
use Isdoc\Enums\NoteTagName;
use Cetria\Helpers\Reflection\Reflection;

class NoteTest extends TestCase
{
    /**
     * @test
     */
    public function testSetNote(): void
    {
        $note = new Note(NoteTagName::NOTE);
        $note->setNote('test');
        $property = Reflection::getHiddenProperty($note, 'note');
        $this->assertEquals('test', $property);
    }

    /**
     * @test
     */
    public function testSetLanguageId(): void
    {
        $note = new Note(NoteTagName::NOTE);
        $note->setLanguageId(LanguageCode::CS);
        $property = Reflection::getHiddenProperty($note, 'languageId');
        $this->assertEquals(LanguageCode::CS, $property);
    }

    /**
     * @test
     */
    public function testSetLanguageId_incorrect(): void
    {
        $note = new Note(NoteTagName::NOTE);
        $this->expectException(\Exception::class);
        $note->setLanguageId('blbost');
    }
}
