<?php

namespace Isdoc\Enums;

/**
 * Způsob výpočtu DPH 
 */
class TaxScheme
{
    const VAT = "VAT";
    const TIN = "TIN";

    const ALL = [
        self::VAT,
        self::TIN,
    ];

    public static function validate(?string $taxScheme): ?string
    {
        if (in_array($taxScheme, self::ALL) || $taxScheme == null) {
            return $taxScheme;
        } else {
            throw new \Exception("Daňové schéma: <TaxScheme>$taxScheme</TaxScheme> neodpovídá žádné z podporovaných konstant daňových schémat. Podporovaná schémata jsou VAT a TIN.");
        }
    }
}
