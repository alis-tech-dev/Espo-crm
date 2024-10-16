<?php

namespace Isdoc;

use Isdoc\Interfaces\RenderableInterface;
use Isdoc\IsdocSimpleXMLElement;

/**
 * Informace o položce faktury
 */
class Item implements RenderableInterface
 { 
    use \Isdoc\Traits\StringConversion; 

    protected $description = null;


    /** Popis položky
     * @return static
     */
    public function setDescription(?string $description): Item
    {
        $this->description = $description;
        return $this;
    }

    public function toXmlElement(): IsdocSimpleXMLElement
    {
        $item = new IsdocSimpleXMLElement('<Item></Item>');
        $item->addChildOptional('Description',$this->description);
        return $item;
    }
}