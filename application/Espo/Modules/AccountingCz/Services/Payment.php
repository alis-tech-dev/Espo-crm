<?php

namespace Espo\Modules\AccountingCz\Services;

use Espo\Core\Templates\Services\Base;
use Espo\Modules\AccountingCz\Entities\Payment as PaymentEntity;
use Espo\Modules\Accounting\Entities\Invoice;
use Espo\Modules\AccountingCz\Entities\ProformaInvoice;
use Espo\Modules\AccountingCz\Entities\IssuedTaxDocument as TaxDocument;
use Espo\Modules\AccountingCz\Services\Invoice as InvoiceService;
use Espo\Modules\AccountingCz\Services\ProformaInvoice as ProformaService;
use Espo\Modules\Autocrm\Tools\RecordList\Loader as RecordListLoader;
use Espo\Core\Exceptions\BadRequest;
use Espo\Core\Utils\DateTime;
use Espo\Core\Di;
use Espo\ORM\Entity;

class Payment extends Base implements Di\LanguageAware, Di\ConfigAware
{
    use Di\LanguageSetter;
    use Di\ConfigSetter;

    private ?RecordListLoader $recordListLoader = null;

    public function createPaymentForProformaInvoice(object $data): void
    {
        $id = $data->id;
        $paidOn = $data->paidOn;
        $amount = $data->amount;
        $markAsPaid = $data->markAsPaid;
        $followupDocument = $data->followupDocument;
        $variableSymbol = $data->variableSymbol;

        $proformaInvoice = $this->entityManager
            ->getEntityById(ProformaInvoice::ENTITY_TYPE, $id);

        if (!$proformaInvoice) {
            throw new BadRequest('proformaInvoice not found');
        }

        if (!$proformaInvoice->has('itemsRecordList') && !$proformaInvoice->isNew()) {
            $this->loadItemsRecordList($proformaInvoice);
        }

        if ($markAsPaid) {
            $proformaInvoice->set('status', 'Paid');
        } else {
            $proformaInvoice->set('status', 'Partially Paid');
        }

        $payment = $this->entityManager
            ->createEntity(PaymentEntity::ENTITY_TYPE, [
                'name' => $proformaInvoice->get('number') . ' - ' . $variableSymbol,
                'parentId' => $id,
                'parentType' => ProformaInvoice::ENTITY_TYPE,
                'date' => $paidOn,
                'amount' => $amount,
                'variableSymbol' => $variableSymbol,
                'assignedUserId' => $this->user->getId()
            ]);

        $this->entityManager->saveEntity($payment);

        switch ($followupDocument) {
            case 'TaxDocument':
                $itemsRecordList = [];

                foreach ($proformaInvoice->get('itemsRecordList') as $item) {
                    $taxRate = $item->taxRate ?? 0;
                    $withTax = $item->withTax ?? false;
                    $key = $taxRate . '_' . $withTax;

                    if (!array_key_exists($key, $itemsRecordList)) {
                        $itemsRecordList[$key] = (object) [
                            'name' => str_replace(
                                [
                                    '{date}',
                                    '{variableSymbol}',
                                    '{number}'
                                ],
                                [
                                    $payment->get('date'),
                                    $payment->get('variableSymbol'),
                                    $proformaInvoice->get('number')
                                ],
                                $this->language->translateLabel('Item Text', 'labels', 'IssuedTaxDocument')
                            ),
                            'quantity' => 1,
                            'taxRate' => $taxRate,
                            'amountWithTax' => 0,
                            'withTax' => $withTax,
                        ];
                    }

                    $itemsRecordList[$key]->amountWithTax += $item->amountWithTax / ($proformaInvoice->get('grandTotalAmount') / $amount);
                }

                $itemsRecordList = array_values($itemsRecordList);

                $taxDocumentAttributes = $this->getTaxDocumentAttributes($proformaInvoice, $payment, $itemsRecordList);

                $this->entityManager->createEntity(TaxDocument::ENTITY_TYPE, $taxDocumentAttributes);

                break;
            case 'FinalInvoicePaid':
                $itemsRecordList = [];
                $advanceDeductionsRecordList = [];

                foreach ($proformaInvoice->get('itemsRecordList') as $item) {
                    unset($item->id);
                    $itemsRecordList[] = $item;
                }

                foreach ($proformaInvoice->get('itemsRecordList') as $item) {
                    $taxRate = $item->taxRate ?? 0;
                    $withTax = $item->withTax ?? false;
                    $amountWithTax = $item->amountWithTax ?? 0;
                    $taxAmount = $item->taxAmount ?? 0;
                    $amount = $item->amount ?? 0;
                    $unitPrice = $item->unitPrice ?? 0;
                    $currency = $proformaInvoice->get('amountCurrency');

                    $key = $taxRate . '_' . $withTax;

                    if (!array_key_exists($key, $advanceDeductionsRecordList)) {
                        $advanceDeductionsRecordList[$key] = (object) [
                            'name' => str_replace(
                                ['{number}'],
                                [$proformaInvoice->get('number')],
                                $this->language->translateLabel('Item Text', 'labels', 'Invoice')
                            ),
                            'quantity' => 1,
                            'taxRate' => $taxRate,
                            'unitPrice' => 0,
                            'withTax' => $withTax,
                            'amountWithTax' => 0,
                            'amountWithTaxCurrency' => $currency,
                            'taxAmountCurrency' => $currency,
                            'amountCurrency' => $currency,
                            'unitPriceCurrency' => $currency,
                        ];
                    }

                    $advanceDeductionsRecordList[$key]->amountWithTax += $this->round($amountWithTax);
                    $advanceDeductionsRecordList[$key]->taxAmount += $this->round($taxAmount);
                    $advanceDeductionsRecordList[$key]->amount += $this->round($amount);
                    $advanceDeductionsRecordList[$key]->unitPrice += $this->round($unitPrice);
                }

                $advanceDeductionsRecordList = array_values($advanceDeductionsRecordList);

                $invoiceAttributes = $this->getInvoiceAttributes($proformaInvoice, $payment, $itemsRecordList, $advanceDeductionsRecordList);

                $invoice = $this->entityManager->createEntity(Invoice::ENTITY_TYPE, $invoiceAttributes);

                $this->getInvoiceService()->recalculateTotals($invoice);

                $this->entityManager->saveEntity($invoice);

                break;
            default:

                break;
        }

        $this->getProformaService()->recalculateTotals($proformaInvoice);
        $this->entityManager->saveEntity($proformaInvoice);
    }

    protected function getTaxDocumentAttributes(ProformaInvoice $proformaInvoice, PaymentEntity $payment, $itemsRecordList): array
    {
        return [
            'paymentId' => $payment->getId(),
            'accountId' => $proformaInvoice->get('accountId'),
            'paymentReceivedDate' => $payment->get('date'),
            'dateInvoiced' => DateTime::getSystemTodayString(),
            'billingAddressStreet' => $proformaInvoice->get('billingAddressStreet'),
            'billingAddressCity' => $proformaInvoice->get('billingAddressCity'),
            'billingAddressPostalCode' => $proformaInvoice->get('billingAddressPostalCode'),
            'billingAddressCountry' => $proformaInvoice->get('billingAddressCountry'),
            'billingAddressState' => $proformaInvoice->get('billingAddressState'),
            'vatId' => $proformaInvoice->get('vatId'),
            'sicCode' => $proformaInvoice->get('sicCode'),
            'itemsRecordList' => $itemsRecordList,
            'variableSymbol' => $proformaInvoice->get('variableSymbol'),
            'constantSymbol' => $proformaInvoice->get('constantSymbol'),
            'amountCurrency' => $proformaInvoice->get('amountCurrency'),
            'proformaInvoiceId' => $proformaInvoice->getId()
        ];
    }

    protected function getInvoiceAttributes(ProformaInvoice $proformaInvoice, PaymentEntity $payment, $itemsRecordList, $advanceDeductionsRecordList): array
    {

        return [
            'accountId' => $proformaInvoice->get('accountId'),
            'paymentReceivedDate' => $payment->get('date'),
            'dateInvoiced' => DateTime::getSystemTodayString(),
            'billingAddressStreet' => $proformaInvoice->get('billingAddressStreet'),
            'billingAddressCity' => $proformaInvoice->get('billingAddressCity'),
            'billingAddressPostalCode' => $proformaInvoice->get('billingAddressPostalCode'),
            'billingAddressCountry' => $proformaInvoice->get('billingAddressCountry'),
            'billingAddressState' => $proformaInvoice->get('billingAddressState'),
            'vatId' => $proformaInvoice->get('vatId'),
            'sicCode' => $proformaInvoice->get('sicCode'),
            'variableSymbol' => $proformaInvoice->get('variableSymbol'),
            'constantSymbol' => $proformaInvoice->get('constantSymbol'),
            'specificSymbol' => $proformaInvoice->get('specificSymbol'),
            'proformaInvoicesIds' => [$proformaInvoice->getId()],
            'itemsRecordList' => $itemsRecordList,
            'amountCurrency' => $proformaInvoice->get('amountCurrency'),
            'advanceDeductionsRecordList' => $advanceDeductionsRecordList,
        ];
    }

    public function createPaymentForInvoice(object $data): void
    {

        $id = $data->id;
        $paidOn = $data->paidOn;
        $amount = $data->amount;
        $markAsPaid = $data->markAsPaid;
        $variableSymbol = $data->variableSymbol;

        $invoice = $this->entityManager
            ->getEntityById(Invoice::ENTITY_TYPE, $id);

        if (!$invoice) {
            throw new BadRequest('Invoice not found');
        }

        if ($markAsPaid) {
            $invoice->set('status', 'Paid');
        } else {
            $invoice->set('status', 'Partially Paid');
        }

        $payment = $this->entityManager
            ->createEntity(PaymentEntity::ENTITY_TYPE, [
                'name' => $invoice->get('number') . ' - ' . $variableSymbol,
                'parentId' => $id,
                'parentType' => Invoice::ENTITY_TYPE,
                'date' => $paidOn,
                'amount' => $amount,
                'variableSymbol' => $variableSymbol,
                'assignedUserId' => $this->user->getId()
            ]);

        $this->entityManager->saveEntity($payment);

        $this->getInvoiceService()->recalculateTotals($invoice);

        $this->entityManager->saveEntity($invoice);
    }

    private function getInvoiceService(): InvoiceService
    {
        return $this->injectableFactory->create(InvoiceService::class);
    }

    private function getProformaService(): ProformaService
    {
        return $this->injectableFactory->create(ProformaService::class);
    }

    private function loadItemsRecordList(Entity $entity): void
    {
        try {
            $this->getRecordListLoader()->load($entity, 'items', true);
        } catch (\Exception $e) {
            $this->log->error($e->getMessage());
        }
    }

    private function getRecordListLoader(): RecordListLoader
    {
        return $this->recordListLoader ??= $this->injectableFactory->create(RecordListLoader::class);
    }

    public function round(float $value): float
    {
        return round($value, $this->config->get('currencyDecimalPlaces'));
    }
}
