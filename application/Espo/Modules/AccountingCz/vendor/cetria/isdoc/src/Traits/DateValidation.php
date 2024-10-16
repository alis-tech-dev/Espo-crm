<?php

namespace Isdoc\Traits;

use DateTime;

trait DateValidation
{
    /**
     * Validuje date string na požadovaný formát
     */
    private function validateDate(string $date, string  $format = 'Y-m-d'): void
    {
        $d = DateTime::createFromFormat($format, $date);
        if (!($d && $d->format($format) === $date)) {
            throw new \Exception("Datum je neplatné nebo není v podporovaném tvaru. Zadejte datum ve tvaru: YYYY-MM-DD.");
        }
    }
}
