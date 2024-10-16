<?php

namespace Isdoc;

use SimpleXMLElement;

class IsdocSimpleXMLElement extends SimpleXMLElement
{
    /**
     * Přidává XML do SimpleXMLElement objektu
     *
     * @param string $xml
     * @return bool XML string přidán
     * @see \Tests\IsdocSimpleXMLElementTest
     */
    public function appendXML(string $xml): bool
    {
        // ověření, zdali je co přidat
        if ($nodata = !strlen($xml) or $this[0] == NULL) {
            return $nodata;
        }

        // přidání XML
        $node     = dom_import_simplexml($this);
        $fragment = $node->ownerDocument->createDocumentFragment();
        $fragment->appendXML($xml);

        return (bool)$node->appendChild($fragment);
    }

    /**
     * Přidává SimpleXMLElement jako XML do SimpleXMLElement objektu
     *
     * @param SimpleXMLElement|IsdocSimpleXMLElement $child
     * @return bool SimpleXMLElement přidán
     * @see \Tests\IsdocSimpleXMLElementTest
     */
    public function appendSimpleXMLElement($child): bool
    {
        // vložení attributu
        if ($child->xpath('.') != array($child)) {
            $this[$child->getName()] = (string)$child;
            return true;
        }
        
        $xml = $child->asXML();

        // odstranění XML deklarace z hlavičky
        if ($child->xpath('/*') == array($child)) {
            $pos = strpos($xml, "\n");
            $xml = substr($xml, $pos + 1);
        }

        return $this->appendXML($xml);
    }

    /**
     * Přidává child <element> do SimpleXMLElement objektu pouze pokud parametr $value není null. 
     * 
     * @param string $qualifiedName Jméno child elementu k přidání
     * @param string $value Hodnota child <element>
     * @param string $namespace Namespace, do kterého child <element> náleží
     * @return static|null
     * @see \Tests\IsdocSimpleXMLElementTest
     */
    public function addChildOptional(string $qualifiedName, ?string $value = null, ?string $namespace = null)
    {
        if ($value != null) {
            $child = $this->addChild($qualifiedName, $value, $namespace);
            return $child;
        }
        return $this;
    }
}
