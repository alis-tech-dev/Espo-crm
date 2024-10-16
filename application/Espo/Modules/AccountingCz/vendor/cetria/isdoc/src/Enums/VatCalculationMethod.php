<?php

namespace Isdoc\Enums;

/**
 * Způsob výpočtu DPH 
 */
class VatCalculationMethod
{
    const ZDOLA = 0;
    const SHORA = 1;

    const ALL = [
        self::ZDOLA,
        self::SHORA,
    ];

    public static function validate(int $vatCalculationMethod): int
    {
        if (in_array($vatCalculationMethod, self::ALL)) {
            return $vatCalculationMethod;
        } else {
            throw new \Exception("Způsob výpočtu DPH: <VatCalculationMethod>$vatCalculationMethod</VatCalculationMethod> neodpovídá žádné z podporovaných konstant výpočtu DPH.");
        }
    }
}
