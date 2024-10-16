<?php

namespace Isdoc;

use Isdoc\IsdocSimpleXMLElement;
use Isdoc\Enums\LanguageCode;
use Isdoc\Enums\NoteTagName;
use Isdoc\Interfaces\RenderableInterface;

/**
 * Poznámka
 */
class Note implements RenderableInterface
{
    use \Isdoc\Traits\StringConversion;

    protected $tagName = null;
    protected $note = null;
    protected $languageId = null;
    

    /**
     * název XML tagu
     */
    function __construct(string $tagName)
    {
        $this->tagName = NoteTagName::validate($tagName);
    }

    /**
     * @return static
     */
    public function setNote(?string $note): Note
    {
        $this->note = $note;
        return $this;
    }
    
    /**
     * @param string $languageId Kód z množiny jazykových kódů (ISO 639-1 language codes)
     * @return static
     */
    public function setLanguageId(string $languageId): Note 
    {
        $this->languageId = LanguageCode::validate($languageId);
        return $this;
    }

    /**
     * @param string $tagName Název XML tagu 
     */
    public function toXmlElement(): IsdocSimpleXMLElement
    {
        $note = new IsdocSimpleXMLElement("<$this->tagName>$this->note</$this->tagName>");
        $note->addAttribute('languageID',$this->languageId);
        return $note;
    }
}