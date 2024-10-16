<?php

namespace Isdoc;

use Isdoc\IsdocSimpleXMLElement;
use Isdoc\Interfaces\RenderableInterface;

/**
 * Kolekce celkových částek na dokladu končící položkou částka k zaplacení
 */
class LegalMonetaryTotal implements RenderableInterface
{
    use \Isdoc\Traits\StringConversion;
    protected $hasForeignCurrency = null;

    protected $taxExclusiveAmount = null;
    protected $taxExclusiveAmountCurr = null;
    protected $taxInclusiveAmount = null;
    protected $taxInclusiveAmountCurr = null;
    protected $alreadyClaimedTaxExclusiveAmount = null;
    protected $alreadyClaimedTaxExclusiveAmountCurr = null;
    protected $alreadyClaimedTaxInclusiveAmount = null;
    protected $alreadyClaimedTaxInclusiveAmountCurr = null;
    protected $differenceTaxExclusiveAmount = null;
    protected $differenceTaxExclusiveAmountCurr = null;
    protected $differenceTaxInclusiveAmount = null;
    protected $differenceTaxInclusiveAmountCurr = null;
    protected $payableRoundingAmount = null;
    protected $payableRoundingAmountCurr = null;
    protected $paidDepositsAmount = null;
    protected $paidDepositsAmountCurr = null;
    protected $payableAmount = null;
    protected $payableAmountCurr = null;

    /**
     * @param bool $hasForeignCurrency Je doklad vystavený v cizí měně?
     */
    function __construct(bool $hasForeignCurrency)
    {
        $this->hasForeignCurrency = $hasForeignCurrency;
    }

    /** Celková částka bez daně v místní měně
     * @return static
     */
    public function setTaxExclusiveAmount(?float $taxExclusiveAmount): LegalMonetaryTotal
    {
        $this->taxExclusiveAmount = $taxExclusiveAmount;
        return $this;
    }

    public function setTaxExclusiveAmountCurr(?float $taxExclusiveAmountCurr): LegalMonetaryTotal
    {
        $this->taxExclusiveAmountCurr = $taxExclusiveAmountCurr;
        return $this;
    }

    /** Celková částka s daní daně v místní měně
     * @return static
     */
    public function setTaxInclusiveAmount(?float $taxInclusiveAmount): LegalMonetaryTotal
    {
        $this->taxInclusiveAmount = $taxInclusiveAmount;
        return $this;
    }

    /** Celková částka s daní daně v cizí měně
     * @return static
     */
    public function setTaxInclusiveAmountCurr(?float $taxInclusiveAmountCurr): LegalMonetaryTotal
    {
        $this->taxInclusiveAmountCurr = $taxInclusiveAmountCurr;
        return $this;
    }

    /** Celková částka bez daně v místní měně ze všech uplatněných daňových zálohových listů
     * @return static
     */
    public function setAlreadyClaimedTaxExclusiveAmount(?float $alreadyClaimedTaxExclusiveAmount): LegalMonetaryTotal
    {
        $this->alreadyClaimedTaxExclusiveAmount = $alreadyClaimedTaxExclusiveAmount;
        return $this;
    }

    /** Celková částka bez daně v cizí měně ze všech uplatněných daňových zálohových listů
     * @return static
     */
    public function setAlreadyClaimedTaxExclusiveAmountCurr(?float $alreadyClaimedTaxExclusiveAmountCurr): LegalMonetaryTotal
    {
        $this->alreadyClaimedTaxExclusiveAmountCurr = $alreadyClaimedTaxExclusiveAmountCurr;
        return $this;
    }

    /** Celková částka s daní v místní měně ze všech uplatněných daňových zálohových listů
     * @return static
     */
    public function setAlreadyClaimedTaxInclusiveAmount(?float $alreadyClaimedTaxInclusiveAmount): LegalMonetaryTotal
    {
        $this->alreadyClaimedTaxInclusiveAmount = $alreadyClaimedTaxInclusiveAmount;
        return $this;
    }

    /** Celková částka s daní v cizí měně ze všech uplatněných daňových zálohových listů
     * @return static
     */
    public function setAlreadyClaimedTaxInclusiveAmountCurr(?float $alreadyClaimedTaxInclusiveAmountCurr): LegalMonetaryTotal
    {
        $this->alreadyClaimedTaxInclusiveAmountCurr = $alreadyClaimedTaxInclusiveAmountCurr;
        return $this;
    }

    /** Rozdíl mezi předpisem a "na záloze již uplatněno", bez daně v místní měně
     * @return static
     */
    public function setDifferenceTaxExclusiveAmount(?float $differenceTaxExclusiveAmount): LegalMonetaryTotal
    {
        $this->differenceTaxExclusiveAmount = $differenceTaxExclusiveAmount;
        return $this;
    }

    /** Rozdíl mezi předpisem a "na záloze již uplatněno", bez daně v cizí měně
     * @return static
     */
    public function setDifferenceTaxExclusiveAmountCurr(?float $differenceTaxExclusiveAmountCurr): LegalMonetaryTotal
    {
        $this->differenceTaxExclusiveAmountCurr = $differenceTaxExclusiveAmountCurr;
        return $this;
    }

    /** Rozdíl mezi předpisem a "na záloze již uplatněno", s daní v místní měně
     * @return static
     */
    public function setDifferenceTaxInclusiveAmount(?float $differenceTaxInclusiveAmount): LegalMonetaryTotal
    {
        $this->differenceTaxInclusiveAmount = $differenceTaxInclusiveAmount;
        return $this;
    }

    /** Rozdíl mezi předpisem a "na záloze již uplatněno", s daní v cizí měně
     * @return static
     */
    public function setDifferenceTaxInclusiveAmountCurr(?float $differenceTaxInclusiveAmountCurr): LegalMonetaryTotal
    {
        $this->differenceTaxInclusiveAmountCurr = $differenceTaxInclusiveAmountCurr;
        return $this;
    }

    /** Zaokrouhlení celé částky v tuzemské měně
     * @return static
     */
    public function setPayableRoundingAmount(?float $payableRoundingAmount): LegalMonetaryTotal
    {
        $this->payableRoundingAmount = $payableRoundingAmount;
        return $this;
    }

    /** Zaokrouhlení celé částky v cizí měně
     * @return static
     */
    public function setPayableRoundingAmountCurr(?float $payableRoundingAmountCurr): LegalMonetaryTotal
    {
        $this->payableRoundingAmountCurr = $payableRoundingAmountCurr;
        return $this;
    }

    /** Na nedaňové záloze zaplaceno v tuzemské měně
     * @return static
     */
    public function setPaidDepositsAmount(?float $paidDepositsAmount): LegalMonetaryTotal
    {
        $this->paidDepositsAmount = $paidDepositsAmount;
        return $this;
    }

    /** Na nedaňové záloze zaplaceno v cizí měně
     * @return static
     */
    public function setPaidDepositsAmountCurr(?float $paidDepositsAmountCurr): LegalMonetaryTotal
    {
        $this->paidDepositsAmountCurr = $paidDepositsAmountCurr;
        return $this;
    }

    /** K zaplacení v tuzemské měně
     * @return static
     */
    public function setPayableAmount(?float $payableAmount): LegalMonetaryTotal
    {
        $this->payableAmount = $payableAmount;
        return $this;
    }

    /** K zaplacení v cizí měně
     * @return static
     */
    public function setPayableAmountCurr(?float $payableAmountCurr): LegalMonetaryTotal
    {
        $this->payableAmountCurr = $payableAmountCurr;
        return $this;
    }

    public function toXmlElement(): IsdocSimpleXMLElement
    {
        $this->validateForeignCurrValues();

        $legalMonetaryTotal = new IsdocSimpleXMLElement('<LegalMonetaryTotal></LegalMonetaryTotal>');
        $legalMonetaryTotal->addChild('TaxExclusiveAmount', $this->taxExclusiveAmount);
        $legalMonetaryTotal->addChildOptional('TaxExclusiveAmountCurr', $this->taxExclusiveAmountCurr);
        $legalMonetaryTotal->addChild('TaxInclusiveAmount', $this->taxInclusiveAmount);
        $legalMonetaryTotal->addChildOptional('TaxInclusiveAmountCurr', $this->taxInclusiveAmountCurr);
        $legalMonetaryTotal->addChild('AlreadyClaimedTaxExclusiveAmount', $this->alreadyClaimedTaxExclusiveAmount);
        $legalMonetaryTotal->addChildOptional('AlreadyClaimedTaxExclusiveAmountCurr', $this->alreadyClaimedTaxExclusiveAmountCurr);
        $legalMonetaryTotal->addChild('AlreadyClaimedTaxInclusiveAmount', $this->alreadyClaimedTaxInclusiveAmount);
        $legalMonetaryTotal->addChildOptional('AlreadyClaimedTaxInclusiveAmountCurr', $this->alreadyClaimedTaxInclusiveAmountCurr);
        $legalMonetaryTotal->addChild('DifferenceTaxExclusiveAmount', $this->differenceTaxExclusiveAmount);
        $legalMonetaryTotal->addChildOptional('DifferenceTaxExclusiveAmountCurr', $this->differenceTaxExclusiveAmountCurr);
        $legalMonetaryTotal->addChild('DifferenceTaxInclusiveAmount', $this->differenceTaxInclusiveAmount);
        $legalMonetaryTotal->addChildOptional('DifferenceTaxInclusiveAmountCurr', $this->differenceTaxInclusiveAmountCurr);
        $legalMonetaryTotal->addChildOptional('PayableRoundingAmount', $this->payableRoundingAmount);
        $legalMonetaryTotal->addChildOptional('PayableRoundingAmountCurr', $this->payableRoundingAmountCurr);
        $legalMonetaryTotal->addChild('PaidDepositsAmount', $this->paidDepositsAmount);
        $legalMonetaryTotal->addChildOptional('PaidDepositsAmountCurr', $this->paidDepositsAmountCurr);
        $legalMonetaryTotal->addChild('PayableAmount', $this->payableAmount);
        $legalMonetaryTotal->addChildOptional('PayableAmountCurr', $this->payableAmountCurr);

        return $legalMonetaryTotal;
    }

    protected function validateForeignCurrValues(): void
    {
        foreach ($this->getForeignCurrValues() as $key => $currValue) {
            if ($this->hasForeignCurrency && $currValue === null) {
                throw new \Exception('Nevyplněný element: ' . $key . ' v objektu LegalMonetaryTotal. Doklad vystavený v cizí měně musí obsahovat v cizí měně i všechny finanční elementy (elementy končící na Curr).');
            } elseif (!$this->hasForeignCurrency && $currValue !== null) {
                throw new \Exception('Doklad vystavený v tuzemské měně nesmí obsahovat žádný element v cizí měně. Element ' . $key . ' nesmí mít hodnotu v objektu LegalMonetaryTotal. Pokud neexistuje element ForeignCurrencyCode, pak nesmí existovat žádný element pro cizí měnu, tj. element končící na Curr.');
            }
        }
    }

    protected function getForeignCurrValues(): array
    {
        return [
            'TaxExclusiveAmountCurr' => $this->taxExclusiveAmountCurr,
            'TaxInclusiveAmountCurr' => $this->taxInclusiveAmountCurr,
            'AlreadyClaimedTaxExclusiveAmountCurr' => $this->alreadyClaimedTaxExclusiveAmountCurr,
            'AlreadyClaimedTaxInclusiveAmountCurr' => $this->alreadyClaimedTaxInclusiveAmountCurr,
            'DifferenceTaxExclusiveAmountCurr' => $this->differenceTaxExclusiveAmountCurr,
            'DifferenceTaxInclusiveAmountCurr' => $this->differenceTaxInclusiveAmountCurr,
            'PayableRoundingAmountCurr' => $this->payableRoundingAmountCurr,
            'PaidDepositsAmountCurr' => $this->paidDepositsAmountCurr,
            'PayableAmountCurr' => $this->payableAmountCurr

        ];
    }
}
