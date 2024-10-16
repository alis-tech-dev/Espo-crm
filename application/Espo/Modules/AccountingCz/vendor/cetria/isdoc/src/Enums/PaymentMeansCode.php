<?php

namespace Isdoc\Enums;

class PaymentMeansCode
{
    /**
     * Platba hotovostí
     */
    const CASH = 10;

    /**
     * Platba šekem
     */
    const CHECK = 20;

    /**
     * Uskutečněná kreditní transakce
     */
    const CREDIT = 31;

    /**
     * Převod na účet
     */
    const BANK_TRANSFER = 42;

    /**
     * Platba kartou
     */
    const CARD = 48;

    /**
     * Inkaso
     */
    const ENCASHMENT = 49;

    /**
     * Platba dobírkou
     */
    const CASH_ON_DELIVERY = 50;

    /**
     * Zaúčtování mezi partnery
     */

    const BILL_BETWEEN_PARTNERS = 97;

    const ALL = [
        self::CASH,
        self::CHECK,
        self::CREDIT,
        self::BANK_TRANSFER,
        self::CARD,
        self::ENCASHMENT,
        self::CASH_ON_DELIVERY,
        self::BILL_BETWEEN_PARTNERS,
    ];

    public static function validate(int $paymentMeansCode): int
    {
        if (in_array($paymentMeansCode, self::ALL)) {
            return $paymentMeansCode;
        } else {
            throw new \Exception("Kód způsobu platby <PaymentMeansCode>$paymentMeansCode</PaymentMeansCode> neodpovídá žádné z podporovaných konstant kódů způsobů platby.");
        }
    }
}
