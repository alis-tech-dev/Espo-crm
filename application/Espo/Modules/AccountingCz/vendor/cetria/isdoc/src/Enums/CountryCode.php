<?php

namespace Isdoc\Enums;

/**
 * kódy zemí podle ISO 3166-1 alpha-2
 */
class CountryCode
{
    const AT = "AT";
    const BE = "BE";
    const BG = "BG";
    const CY = "CY";
    const CZ = "CZ";
    const HR = "HR";
    const DK = "DK";
    const EE = "EE";
    const FI = "FI";
    const FR = "FR";
    const DE = "DE";
    const GR = "GR";
    const HU = "HU";
    const IE = "IE";
    const IT = "IT";
    const LV = "LV";
    const LT = "LT";
    const LU = "LU";
    const MT = "MT";
    const NL = "NL";
    const PL = "PL";
    const PT = "PT";
    const RO = "RO";
    const SK = "SK";
    const SI = "SI";
    const ES = "ES";
    const SE = "SE";
    const GB = "GB";
    const CN = "CN";

    const ALL = [
        self::AT,
        self::BE,
        self::BG,
        self::HR,
        self::CY,
        self::CZ,
        self::DK,
        self::EE,
        self::FI,
        self::FR,
        self::DE,
        self::GR,
        self::HU,
        self::IE,
        self::IT,
        self::LV,
        self::LT,
        self::LU,
        self::MT,
        self::NL,
        self::PL,
        self::PT,
        self::RO,
        self::SK,
        self::SI,
        self::ES,
        self::SE,
        self::GB,

        self::CN,
    ];

    public static function validate(string $countryCode): string
    {
        if (in_array($countryCode, self::ALL)) {
            return $countryCode;
        } else {
            throw new \Exception("Kód země <IdentificationCode>$countryCode</IdentificationCode> neodpovídá žádnému z podporovaných kódů zemí.");
        }
    }

    public static function getNameFromCode(string $countryCode)
    {
        self::validate($countryCode);
        return self::getAllCountries()[$countryCode];
    }

    private static function getAllCountries(): array
    {
        return array_merge(self::getEUCountries(), self::getNonEUCountries());
    }

    private static function getEUCountries(): array
    {
        return [
            self::AT => 'Rakouská republika',
            self::BE => 'Belgické království',
            self::BG => 'Bulharská republika',
            self::CY => 'Kyperská republika',
            self::CZ => 'Česká republika',
            self::HR => 'Chorvatská republika',
            self::DK => 'Dánské království',
            self::EE => 'Estonská republika',
            self::FI => 'Finská republika',
            self::FR => 'Francouzská republika',
            self::DE => 'Spolková republika Německo',
            self::GR => 'Řecká republika',
            self::HU => 'Maďarsko',
            self::IE => 'Irsko',
            self::IT => 'Italská republika',
            self::LV => 'Litevská republika',
            self::LT => 'Lichtenštejnské knížectví',
            self::LU => 'Lucemburské velkovévodství',
            self::MT => 'Maltská republika',
            self::NL => 'Nizozemské království',
            self::PL => 'Polská republika',
            self::PT => 'Portugalská republika',
            self::RO => 'Rumunsko',
            self::SK => 'Slovenská republika',
            self::SI => 'Slovinská republika',
            self::ES => 'Španělské království',
            self::SE => 'Švédské království',
            self::GB => 'Spojené království Velké Británie a Severního Irska',
        ];
    }

    private static function getNonEUCountries(): array
    {
        return [
            self::CN => 'Čínská lidová republika',
        ];
    }
}
