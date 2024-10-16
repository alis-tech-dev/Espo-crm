<?php

namespace Isdoc;

use Isdoc\PostalAddress;
use Isdoc\IsdocSimpleXMLElement;
use Isdoc\Interfaces\RenderableInterface;

/**
 * Identifikace subjektu
 */
class PartyContact implements RenderableInterface
{
    use \Isdoc\Traits\StringConversion;

    protected $partyIdentification = null;
    protected $name = null;
    protected $postalAddress = null;
    protected $partyTaxSchemes = [];
    protected $contact = null;


    /**
     * Element identifikačních položek subjektu (firmy)
     * @return static
     */
    public function setPartyIdentification(PartyIdentification $partyIdentification): PartyContact
    {
        $this->partyIdentification = $partyIdentification;
        return $this;
    }

    /** Název subjektu
     * @return static
     */
    public function setName(?string $name): PartyContact
    {
        $this->name = $name;
        return $this;
    }

    /** Poštovní adresa
     * @return static
     */
    public function setPostalAddress(PostalAddress $postalAddress): PartyContact
    {
        $this->postalAddress = $postalAddress;
        return $this;
    }

    /** Daňové údaje. Element je možné použít vícekrát a určit více identifikátorů, např. DIČ a IČ DPH na Slovensku.
     * @return static
     * @param array $partyTaxSchemes array of PartyTaxScheme class
     */
    public function setPartyTaxSchemes(array $partyTaxSchemes): PartyContact
    {
        $this->partyTaxSchemes = $partyTaxSchemes;
        return $this;
    }

    /** Kontaktní osoba
     * @return static
     */
    public function setContact(Contact $contact): PartyContact
    {
        $this->contact = $contact;
        return $this;
    }

    public function toXmlElement(): IsdocSimpleXMLElement
    {
        $party = new IsdocSimpleXMLElement('<Party></Party>');

        if (\is_null($this->partyIdentification)) $this->partyIdentification = new PartyIdentification();
        $party->appendSimpleXMLElement($this->partyIdentification->toXmlElement());
        
        $partyName = $party->addChild('PartyName');
        $partyName->addChild('Name', $this->name);

        if (\is_null($this->postalAddress)) $this->postalAddress = new PostalAddress();
        $party->appendSimpleXMLElement($this->postalAddress->toXmlElement());

        foreach ($this->partyTaxSchemes as $partyTaxScheme) {
            $party->appendSimpleXMLElement($partyTaxScheme->toXmlElement());
        }

        if (!\is_null($this->contact)) $party->appendSimpleXMLElement($this->contact->toXmlElement());

        return $party;
    }
}
