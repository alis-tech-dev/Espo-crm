<?php

namespace Isdoc\Enums;

/**
 * kódy měn (ISO 4217 currency codes)
 */
class CurrencyCode
{
    const CZK = "CZK";
    const EUR = "EUR";
    const USD = "USD";
    const CNY = "CNY"; //China

    const ALL = [
        self::CZK,
        self::EUR,
        self::CNY,
        self::USD,
    ];

    public static function validate(string $currencyCode): string
    {
        if (in_array($currencyCode, self::ALL)) {
            return $currencyCode;
        } else {
            throw new \Exception("Kód měny (Local nebo Foreign) <CurrencyCode>$currencyCode</CurrencyCode> neodpovídá žádnému kódu z podporovaných kódů měn.");
        }
    }
}