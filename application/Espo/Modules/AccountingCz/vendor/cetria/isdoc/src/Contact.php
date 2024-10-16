<?php

namespace Isdoc;

use Isdoc\Interfaces\RenderableInterface;
use Isdoc\IsdocSimpleXMLElement;

/**
 * Kontaktní osoba
 */
class Contact implements RenderableInterface
{
    use \Isdoc\Traits\StringConversion;
    
    protected $name = null;
    protected $telephone = null;
    protected $electronicMail = null;

    /**
     * @return static
     */
    public function setName(?string $name): Contact
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return static
     */
    public function setTelephone(?string $telephone): Contact
    {
        $this->telephone = $telephone;
        return $this;
    }

    /**
     * @return static
     */
    public function setElectronicMail(?string $electronicMail): Contact
    {
        $this->electronicMail = $electronicMail;
        return $this;
    }

    public function toXmlElement(): IsdocSimpleXMLElement
    {
        $contact = new IsdocSimpleXMLElement('<Contact></Contact>');
        $contact->addChildOptional('Name', $this->name);
        $contact->addChildOptional('Telephone', $this->telephone);
        $contact->addChildOptional('ElectronicMail', $this->electronicMail);
        return $contact;
    }
}
