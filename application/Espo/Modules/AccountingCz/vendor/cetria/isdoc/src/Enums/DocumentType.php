<?php

namespace Isdoc\Enums;

/**
 * Typ dokumentu
 */
class DocumentType
{
    /**
     * Faktura - daňový doklad
     */
    const INVOICE = 1;

    /**
     * Opravný daňový doklad (dobropis)
     */
    const CORRECTING_INVOICE = 2;

    /**
     * Opravný daňový doklad (vrubopis)
     */
    const CORRECTING_INVOICE_REVERSE = 3;

    /**
     * Zálohová faktura (nedaňový zálohový list)
     */
    const PROFORMA = 4;

    /**
     * Daňový doklad při přijetí platby (daňový zálohový list)
     */
    const PAYMENT = 5;

    /**
     * Opravný daňový doklad při přijetí platby (dobropis DZL)
     */
    const CORRECTION_PAYMENT = 6;

    /**
     * Zjednodušený daňový doklad
     */
    const BASIC_INVOICE = 7;

    const ALL = [
        self::INVOICE,
        self::CORRECTING_INVOICE,
        self::CORRECTING_INVOICE_REVERSE,
        self::PROFORMA,
        self::PAYMENT,
        self::CORRECTION_PAYMENT,
        self::BASIC_INVOICE,
    ];

    public static function validate(int $documentTypeId): int
    {
        if (in_array($documentTypeId, self::ALL)) {
            return $documentTypeId;
        } else {
            throw new \Exception("Typ dokumentu <DocumentType>$documentTypeId</DocumentType> neodpovídá žádné z konstant typů dokumentu.");
        }
    }
}
