<?php

namespace Isdoc\Interfaces;

use Isdoc\IsdocSimpleXMLElement;

interface RenderableInterface
{
    /**
     * Vytvoří z atributů Invoice objektu nový objekt IsdocSimpleXMLElement.
     */
    public function toXmlElement(): IsdocSimpleXMLElement;

    /**
     * Vytvoří z Invoice objektu XML string
     */
    public function toString(): string;
}
