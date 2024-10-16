<?php

namespace Espo\Modules\AccountingCz\Classes\Abstract\Services;

use Espo\ORM\Entity;
use Espo\Modules\AccountingCz\Entities\Payment;

class InvoiceLike extends \Espo\Modules\Accounting\Classes\Abstract\Services\InvoiceLike
{
    public function recalculateSummaryVatRates(Entity $entity): void
    {
        if (!$entity->has('itemsRecordList') && !$entity->isNew()) {
            parent::loadItemsRecordList($entity);
        }

        $recordList = $entity->get('itemsRecordList') ?: [];

        $currency = $entity->get('amountCurrency');
        $roundType = $entity->get('taxRound') ?: "DontRound";

        $summaryVatRates = (object) [];

        foreach ($recordList as $item) {
            $summaryVatRates = $this->updateSummaryVatRates($entity, $summaryVatRates, $currency, $item->taxRate ?? 0, $item->amount ?? 0, $item->taxAmount ?? 0, $roundType);
        }

        if ($entity->get('vatFromRoundedTotal') == false){
            $summaryVatRates = $this->roundVatRates($summaryVatRates, $entity->get('taxRound'));
        }
        if ($entity->get('amountRoundTo') == "fifties"){
            $amountRoundTo = 2;
        }elseif ($entity->get('amountRoundTo') == "decimals"){
            $amountRoundTo = 10;
        }else {
            $amountRoundTo = 1;
        }


        if ($entity->get('amountRound') == "upRound"){
            foreach ($summaryVatRates as $key => $value) {
                $summaryVatRates->{$key}->basis = parent::round(ceil($summaryVatRates->{$key}->basis * $amountRoundTo) / $amountRoundTo);
                $summaryVatRates->{$key}->total = $summaryVatRates->{$key}->vat+$summaryVatRates->{$key}->basis;
            }
        }
        elseif ($entity->get('amountRound') == "downRound"){
            foreach ($summaryVatRates as $key => $value) {
                $summaryVatRates->{$key}->basis = parent::round(floor($summaryVatRates->{$key}->basis * $amountRoundTo) / $amountRoundTo);
                $summaryVatRates->{$key}->total = $summaryVatRates->{$key}->vat+$summaryVatRates->{$key}->basis;
            }
        }
        elseif ($entity->get('amountRound') == "mathRound"){
            foreach ($summaryVatRates as $key => $value) {
                $summaryVatRates->{$key}->basis = parent::round(round($summaryVatRates->{$key}->basis * $amountRoundTo) / $amountRoundTo);
                $summaryVatRates->{$key}->total = $summaryVatRates->{$key}->vat+$summaryVatRates->{$key}->basis;
            }
        }

        if ($entity->get('vatFromRoundedTotal') && $entity->get('amountRound') != "dontRound"){
            $summaryVatRates = $this->roundVatRates($summaryVatRates, $entity->get('taxRound'));
        }

        $this->recalculateTotals($entity);
        
        $entity->set('summaryVatRatesRecordList', array_values((array) $summaryVatRates));

    }
    private function roundVatRates($summaryVatRates, $roundType){

        foreach ($summaryVatRates as $key => $value) {
            if ($roundType == "allRound.1"){
                $summaryVatRates->{$key}->vat = parent::round(round( $summaryVatRates->{$key}->vat / 0.1) * 0.1);
            }
            elseif ($roundType == "allRound.5"){
                $summaryVatRates->{$key}->vat = parent::round(round( $summaryVatRates->{$key}->vat / 0.5) * 0.5);
            }
            elseif ($roundType == "allRound1"){
                $summaryVatRates->{$key}->vat = parent::round(round($summaryVatRates->{$key}->vat));
            }
            $summaryVatRates->{$key}->total = $summaryVatRates->{$key}->vat+$summaryVatRates->{$key}->basis;
        }

        return $summaryVatRates;
    }

    protected function updateSummaryVatRates($entity, $summaryVatRates, $currency, $taxRate, $amount, $taxAmount = null, $roundVatRates = "DontRound") {

        $reverseCharge = $entity->get('reverseCharge') ?: false;

        if ($roundVatRates == "itesRound.1"){
            $taxAmount = parent::round(round(($taxAmount ? $taxAmount : $amount * ($taxRate / 100.0)) / 0.1) * 0.1);
        }
        else if ($roundVatRates == "itesRound.5"){
            $taxAmount = parent::round(round($taxAmount ? $taxAmount : $amount * ($taxRate / 100.0) / 0.5) * 0.5);
        }
        else if ($roundVatRates == "itesRound1"){
            $taxAmount = parent::round(round($taxAmount ? $taxAmount : $amount * ($taxRate / 100.0) ));
        }else {
            $taxAmount = parent::round($taxAmount ? $taxAmount : $amount * ($taxRate / 100.0));
        }

        if (isset($summaryVatRates->{$taxRate})) {

            $summaryVatRates->{$taxRate}->basis += $amount;
            $summaryVatRates->{$taxRate}->vat += $reverseCharge ? 0 : ($taxAmount ? $taxAmount : $amount * ($taxRate / 100.0));
            $summaryVatRates->{$taxRate}->total += $amount + ($reverseCharge ? 0 : ($taxAmount ? $taxAmount : $amount * ($taxRate / 100.0)));

        } else {

            $summaryVatRates->{$taxRate} = (object) [
                'taxRate' => $taxRate,
                'basis' => $amount,
                'basisCurrency' => $currency,
                'vat' => $reverseCharge ? 0 : ($taxAmount ? $taxAmount : $amount * ($taxRate / 100.0)),
                'vatCurrency' => $currency,
                'total' => $amount + ($reverseCharge ? 0 : ($taxAmount ? $taxAmount : $amount * ($taxRate / 100.0))),
                'totalCurrency' => $currency
            ];

        }

        return $summaryVatRates;
    }

    public function recalculateTotals(Entity $entity): void
    {

        parent::recalculateTotals($entity);

        if(!$entity->hasAttribute('paid')) return;

        $paid = $this
            ->entityManager
            ->getRDBRepository(Payment::ENTITY_TYPE)
            ->where('parentId', $entity->getId())
            ->sum('amount');

        $entity->set('paid', $paid);
        $entity->set('remainingToPay', $entity->get('grandTotalAmount') - $paid);

    }

}
