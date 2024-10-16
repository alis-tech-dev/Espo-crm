<?php

namespace Isdoc;

use Isdoc\Details;
use Isdoc\IsdocSimpleXMLElement;
use Isdoc\Enums\PaymentMeansCode;
use Isdoc\Interfaces\RenderableInterface;

class Payment implements RenderableInterface
{
    use \Isdoc\Traits\StringConversion;

    /**
     * @var bool $partialPayment
     * Nastavuje Payment XML attribute (Je povolena částečná platba)
     */
    protected $partialPayment = null;
    protected $paidAmount = null;
    protected $paymentMeansCode = null;
    protected $details = null;

    /**
     * povolení částečné platby
     */
    function __construct(bool $partialPayment) {
        $partialPayment == true ? $this->partialPayment = 'true' : $this->partialPayment = 'false';
    }

    /** Částka k zaplacení
     * @return static
     */
    public function setPaidAmount(?float $paidAmount): Payment
    {
        $this->paidAmount = $paidAmount;
        return $this;
    }

    /** Kód způsobu platby 
     * @param int $paymentMeansCode enum PaymentMeansCode
     * @return static
     */
    public function setPaymentMeansCode(int $paymentMeansCode): Payment
    {
        $this->paymentMeansCode = PaymentMeansCode::validate($paymentMeansCode);
        return $this;
    }

    /** Podrobnosti o platbě
     * @return static
     */
    public function setDetails(Details $details): Payment
    {
        $this->details = $details;
        return $this;
    }

    public function toXmlElement(): IsdocSimpleXMLElement
    {
        $payment = new IsdocSimpleXMLElement('<Payment></Payment>');
        $payment->addAttribute('partialPayment', $this->partialPayment);
        $payment->addChild('PaidAmount', $this->paidAmount);
        $payment->addChild('PaymentMeansCode', $this->paymentMeansCode);
        if (!\is_null($this->details)) $payment->appendSimpleXMLElement($this->details->toXmlElement());
        return $payment;
    }
}
