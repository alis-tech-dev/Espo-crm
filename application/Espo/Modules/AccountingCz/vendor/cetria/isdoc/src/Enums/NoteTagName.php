<?php

namespace Isdoc\Enums;

/**
 * Kolekce monžných názvů tagu pro objekt typu Note
 */
class NoteTagName
{
    const NOTE = "note";
    const ELECTRONIC_POSSIBILITY_AGREEMENT_REFERENCE = "ElectronicPossibilityAgreementReference";

    const ALL = [
        self::NOTE,
        self::ELECTRONIC_POSSIBILITY_AGREEMENT_REFERENCE,
    ];

    public static function validate(string $tagName): string
    {
        if (in_array($tagName, self::ALL)) {
            return $tagName;
        } else {
            throw new \Exception('Objekt Note momentálně podporuje pouze tagy s názvy:' . self::NOTE . ' a ' . self::ELECTRONIC_POSSIBILITY_AGREEMENT_REFERENCE);
        }
    }
}
