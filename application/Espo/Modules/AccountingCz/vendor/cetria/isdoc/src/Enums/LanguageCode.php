<?php

namespace Isdoc\Enums;

/**
 * Jazykové kódy (ISO 639-1 language codes)
 */
class LanguageCode
{
    // https://gist.github.com/DimazzzZ/4e2a5a6c8c6f67900091
    // https://wiki.openstreetmap.org/wiki/Nominatim/Country_Codes

    const DE = "de";
    const EL = "el";
    const BG = "bg";
    const NL = "nl";
    const HR = "hr";
    const DA = "da";
    const ET = "et";
    const FI = "fi";
    const FR = "fr";
    const HU = "hu";
    const EN = "en";
    const IT = "it";
    const LV = "lv";
    const LB = "lb";
    const MT = "mt";
    const PL = "pl";
    const PT = "pt";
    const RO = "ro";
    const SL = "sl";
    const SK = "sk";
    const CS = "cs";
    const ES = "es";
    const SV = "sv";

    const ZH = "zh"; //china

    const ALL = [

        self::DE,
        self::EL,
        self::BG,
        self::NL,
        self::HR,
        self::DA,
        self::ET,
        self::FI,
        self::FR,
        self::HU,
        self::EN,
        self::IT,
        self::LV,
        self::LB,
        self::MT,
        self::PL,
        self::PT,
        self::RO,
        self::SL,
        self::SK,
        self::CS,
        self::ES,
        self::SV,

        self::ZH,
    ];

    public static function validate(string $languageCode): string
    {
        if (in_array($languageCode, self::ALL)) {
            return $languageCode;
        } else {
            throw new \Exception("Kód jazyka <LanguageID = $languageCode> neodpovídá žádné z podporovaných konstant kódů jazyků.");
        }
    }
}
