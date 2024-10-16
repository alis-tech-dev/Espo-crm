<?php

namespace Isdoc;

use Isdoc\Interfaces\RenderableInterface;
use Isdoc\IsdocSimpleXMLElement;

/**
 * Odkaz na původní doklad, který tento aktuální doklad opravuje.
 * jen pro typy dokumentů:
 *  2:  (CORRECTING_INVOICE == dobropis),
 *  3:  (CORRECTING_INVOICE_REVERSE == vrubopis),
 *  6:  (CORRECTION_PAYMENT == dobropis DZL)
 */
class OriginalDocumentReference implements RenderableInterface
{
    use \Isdoc\Traits\StringConversion;
    use \Isdoc\Traits\DateValidation;

    protected $attributeId = null;
    protected $id = null;
    protected $issueDate = null;
    protected $uuid = null;

    /**
     * @param string $attributeId Identifikátor elementu pro tvorbu odkazů
     */
    function __construct(string $attributeId)
    {
        $this->attributeId = $attributeId;
    }

    /** Lidsky čitelné číslo původního dokladu
     * @return static
     */
    public function setId(?string $id): OriginalDocumentReference
    {
        $this->id = $id;
        return $this;
    }

    /** Datum vystavení původního dokladu
     * @return static
     */
    public function setIssueDate(?string $issueDate): OriginalDocumentReference
    {
        if (!\is_null($issueDate)) $this->validateDate($issueDate);
        $this->issueDate  = $issueDate;
        return $this;
    }

    /** Unikátní identifikátor GUID
     * @return static
     */
    public function setUuid(?string $uuid): OriginalDocumentReference
    {
        $this->uuid = $uuid;
        return $this;
    }

    public function toXmlElement(): IsdocSimpleXMLElement
    {
        $originalDocumentRereference = new IsdocSimpleXMLElement('<OriginalDocumentReference></OriginalDocumentReference>');
        $originalDocumentRereference->addAttribute('xmlns', 'http://isdoc.cz/namespace/2013');
        $originalDocumentRereference->addAttribute('id', $this->attributeId);
        $originalDocumentRereference->addChild('ID', $this->id);
        $originalDocumentRereference->addChildOptional('IssueDate', $this->issueDate);
        $originalDocumentRereference->addChildOptional('UUID', $this->uuid);
        return $originalDocumentRereference;
    }
}
