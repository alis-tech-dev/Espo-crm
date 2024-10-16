<?php

namespace Espo\Modules\AccountingCz\Services;

use Espo\ORM\Entity;

class IssuedTaxDocument extends \Espo\Modules\AccountingCz\Classes\Abstract\Services\InvoiceLike
{

    public function recalculateRecordList(Entity $entity): void
    {
        if (!$entity->isNew()) return;

        $recordList = $entity->get('itemsRecordList') ?: [];
        $currency = $entity->get('amountCurrency');
        $totalAmountRoundedAfter = 0;
        $totalAmountRoundedBefore = 0;
        $precision = 2;
        $exp = 10 ** $precision;
        $expMinus = 10 ** (-$precision);

        foreach ($recordList as &$record) {
            $totalAmountRoundedAfter += $record->amountWithTax;
            $totalAmountRoundedBefore += round($record->amountWithTax, $precision);
        }

        $totalAmountRoundedAfter = round($totalAmountRoundedAfter, $precision);
        $totalRoundingError = round($totalAmountRoundedBefore - $totalAmountRoundedAfter, $precision);
        $totalErrorSign = $totalRoundingError <=> 0;

        foreach ($recordList as &$record) {

            $record->taxRate ??= 0;
            $record->unitPrice ??= 0;
            $record->withTax ??= false;

            $taxCoef = 1 + ($record->taxRate / 100);

            $roundedAmount = round($record->amountWithTax, $precision);
            $errSign = ($roundedAmount - $record->amountWithTax) <=> 0;
            $amountWithTax = null;

            if ($errSign === $totalErrorSign) {
                if ($errSign === -1) {
                    $amountWithTax = ceil($record->amountWithTax * $exp) / $exp;
                } else {
                    $amountWithTax = floor($record->amountWithTax * $exp) / $exp;
                }

                $totalRoundingError -= $errSign * $expMinus;
                $totalRoundingError = round($totalRoundingError, $precision);
                $totalErrorSign = $totalRoundingError <=> 0;
            } else {
                $amountWithTax = round($record->amountWithTax, $precision);
            }

            $unitPrice = $amountWithTax / $taxCoef;

            $record->amountWithTax = $amountWithTax;
            $record->taxAmount = $amountWithTax - $unitPrice;
            $record->unitPrice = $record->withTax ? $amountWithTax : $unitPrice;
            $record->amount = $unitPrice;

            $record->unitPriceCurrency = $currency;
            $record->amountCurrency = $currency;
            $record->amountWithTaxCurrency = $currency;
            
        }

        $entity->set('itemsRecordList', $recordList);
        
    }

    public function recalculateTotals(Entity $entity): void
    {
        if (!$entity->has('itemsRecordList') && !$entity->isNew()) {
            parent::loadItemsRecordList($entity);
        }

        $recordList = $entity->get('itemsRecordList') ?: [];
        $amountCurrency = $entity->get('amountCurrency');

        $amount = 0;
        $taxAmount = 0;

        foreach ($recordList as $record) {
            $amount += $record->amount;
            $taxAmount += $record->taxAmount ?? 0;
        }

        $grandTotalAmount = $amount + $taxAmount;

        $entity->set([
            'amount' => $amount,
            'amountCurrency' => $amountCurrency,
            'taxAmount' => $taxAmount,
            'taxAmountCurrency' => $amountCurrency,
            'grandTotalAmount' => $grandTotalAmount,
            'grandTotalAmountCurrency' => $amountCurrency
        ]);

    }

}
