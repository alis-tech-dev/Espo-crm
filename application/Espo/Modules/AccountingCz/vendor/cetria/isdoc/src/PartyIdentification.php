<?php

namespace Isdoc;

use Isdoc\IsdocSimpleXMLElement;
use Isdoc\Interfaces\RenderableInterface;

/**
 * Element identifikačních položek subjektu (firmy)
 */
class PartyIdentification implements RenderableInterface
{
    use \Isdoc\Traits\StringConversion;

    protected $userId = null;
    protected $catalogFirmIdentification = null;
    protected $id = null;

    /**
     * Uživatelské číslo firmy/provozovny
     * @return static
     */
    public function setUserId(?string $userId): PartyIdentification
    {
        $this->userId = $userId;
        return $this;
    }

    /**
     * Mezinárodní číslo firmy/provozovny, např. EAN
     * @return static
     */
    public function setCatalogFirmIdentification(?string $catalogFirmIdentification): PartyIdentification
    {
        $this->catalogFirmIdentification = $catalogFirmIdentification;
        return $this;
    }

    /**
     * IČ
     * @return static
     */
    public function setId(?string $id): PartyIdentification
    {
        $this->id = $id;
        return $this;
    }

    public function toXmlElement(): IsdocSimpleXMLElement
    {
        $partyIdentification = new IsdocSimpleXMLElement('<PartyIdentification></PartyIdentification>');
        $partyIdentification->addChildOptional('UserID', $this->userId);
        $partyIdentification->addChildOptional('CatalogFirmIdentification', $this->catalogFirmIdentification);
        $partyIdentification->addChild('ID', $this->id);
        return $partyIdentification;
    }
}