<?php

namespace Isdoc\Traits;

use DOMDocument;
use Isdoc\IsdocSimpleXMLElement;

trait StringConversion
{
    /**
     * vytvoří z objektu string
     * @param bool $withDeclaration false == odstraní ze stringu XML deklaraci (hlavičku, která identifikuje dokument jako XML) | true == ponechá hlavičku
     */
    public function toString(bool $withDeclaration = false): string
    {
        $dom = $this->formatXml();
        if ($withDeclaration) {
            return $dom->saveXML(null, LIBXML_NOEMPTYTAG);  //LIBXML_NOEMPTYTAG - dela oba tagy "<foo></foo>" pro prazdny element (misto <foo/>)
        } else {
            $result = "";
            foreach ($dom->childNodes as $node) {
                $result .= $dom->saveXML($node, LIBXML_NOEMPTYTAG) . "\n";
            }
            return $result;
        }
    }

    public abstract function toXmlElement(): IsdocSimpleXMLElement;

    /**
     * vytvoří z objektu DOMDocument s UTF-8 encodingem
     */
    protected function formatXml(): DOMDocument
    {
        $XMLElement = $this->toXmlElement();
        $XMLElementString = $XMLElement->asXML();
        $dom = new DOMDocument();
        $dom->loadXML($XMLElementString, LIBXML_NOBLANKS); //LIBXML_NOBLANKS - formatovani radku
        $dom->encoding = "utf-8"; //encoding kvuli diakritice
        $dom->formatOutput = true;
        return $dom;
    }
}
