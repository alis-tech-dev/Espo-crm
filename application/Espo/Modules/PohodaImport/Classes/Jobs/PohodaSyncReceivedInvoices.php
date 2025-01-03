<?php

namespace Espo\Modules\PohodaImport\Classes\Jobs;

use Espo\Core\ORM\Entity;
use Espo\ORM\Query\Part\Condition as Cond;
use Espo\Core\Job\JobDataLess;
use Espo\Core\Utils\Log;
use Espo\ORM\EntityManager;
use Espo\Modules\PohodaImport\Tools\Pohoda\Pohoda;

class PohodaSyncReceivedInvoices implements JobDataLess
{
    const DEBUG_PREFIX = '[POHODA SYNC RECEIVED INVOICES] ';

    public function __construct(
        private EntityManager $entityManager,
        private Log           $log,
        private Pohoda        $pohoda,
    )
    {
    }

    private function debug($message, array $context = []): void
    {
        $this->log->debug(self::DEBUG_PREFIX . $message, $context);
    }

    public function run(): void
    {
        $this->pohoda->processEntity('SupplierInvoice', [$this, 'generateXml']);
    }

    public function generateXml(Entity $invoice): string
    {
        $number = htmlspecialchars($invoice->get('number'));
        $name = htmlspecialchars($invoice->get('name'));
        $symconst = htmlspecialchars($invoice->get('constantSymbol'));
        $symvar = htmlspecialchars($invoice->get('variableSymbol'));
        $dateInvoiced = htmlspecialchars($invoice->get('dateInvoiced'));
        $dueDate = htmlspecialchars($invoice->get('dueDate'));
        $orderNumber = htmlspecialchars($invoice->get('orderNumber'));
        $sicCode = htmlspecialchars($invoice->get('sicCode'));
        $vatId = htmlspecialchars($invoice->get('vatId'));
        $billingAddressCity = htmlspecialchars($invoice->get('billingAddressCity'));
        $billingAddressStreet = htmlspecialchars($invoice->get('billingAddressStreet'));
        $billingAddressPostalCode = htmlspecialchars($invoice->get('billingAddressPostalCode'));
        $shippingAddressCity = htmlspecialchars($invoice->get('shippingAddressCity'));
        $shippingAddressStreet = htmlspecialchars($invoice->get('shippingAddressStreet'));
        $shippingAddressPostalCode = htmlspecialchars($invoice->get('shippingAddressPostalCode'));
        $company = htmlspecialchars($invoice->get('accountName'));
        $contact = htmlspecialchars($invoice->get('contactName'));

        $amount = htmlspecialchars($invoice->get('amount'));
        $totalAmount = htmlspecialchars($invoice->get('totalAmount'));
        $paymentMethod = htmlspecialchars($invoice->get('paymentMethod'));


        $this->log->debug(self::DEBUG_PREFIX . $amount . gettype($amount) . $company . $contact);

        if ($dueDate) {
            $dueDate = '<inv:dateDue>' . $dueDate . '</inv:dateDue>';
        } else {
            $dueDate = '';
        }

        $invoiceItems = $this->pohoda->getInvoiceItems($invoice, 'SupplierInvoiceItem', 'items');

        $account = $this->entityManager
            ->getRDBRepository('SupplierInvoice')
            ->getRelation($invoice, 'account')
            ->findOne();

        if (isset($account)) {

            if (!$sicCode) {
                $sicCode = htmlspecialchars($account->get('sicCode'));
            }
            if (!$vatId) {
                $vatId = htmlspecialchars($account->get('vatId'));
            }

        }

        if (!$name) {
            $name = 'Faktura bez názvu';
        }
        if (!$symvar) {
            $symvar = 0;
        }

        $this->debug('Invoice data: ' . json_encode([
                'name' => $name,
                'symconst' => $symconst,
                'symvar' => $symvar,
                'date' => $dateInvoiced,
            ]));


        $xmlData = '<?xml version="1.0" encoding="Windows-1250"?>
<dat:dataPack version="2.0" id="Usr01" ico="11223344" key="521d4e05-f032-465e-8150-f423d1b98197" programVersion="13700.208 (30.5.2024)" application="Transformace" note="Uživatelský export" xmlns:dat="http://www.stormware.cz/schema/version_2/data.xsd">
	<dat:dataPackItem version="2.0" id="Usr01 (001)">
		<inv:invoice version="2.0" xmlns:inv="http://www.stormware.cz/schema/version_2/invoice.xsd">
			<inv:invoiceHeader xmlns:rsp="http://www.stormware.cz/schema/version_2/response.xsd" xmlns:rdc="http://www.stormware.cz/schema/version_2/documentresponse.xsd" xmlns:typ="http://www.stormware.cz/schema/version_2/type.xsd" xmlns:lst="http://www.stormware.cz/schema/version_2/list.xsd" xmlns:lStk="http://www.stormware.cz/schema/version_2/list_stock.xsd" xmlns:lAdb="http://www.stormware.cz/schema/version_2/list_addBook.xsd" xmlns:lCen="http://www.stormware.cz/schema/version_2/list_centre.xsd" xmlns:lAcv="http://www.stormware.cz/schema/version_2/list_activity.xsd" xmlns:acu="http://www.stormware.cz/schema/version_2/accountingunit.xsd" xmlns:vch="http://www.stormware.cz/schema/version_2/voucher.xsd" xmlns:int="http://www.stormware.cz/schema/version_2/intDoc.xsd" xmlns:stk="http://www.stormware.cz/schema/version_2/stock.xsd" xmlns:ord="http://www.stormware.cz/schema/version_2/order.xsd" xmlns:ofr="http://www.stormware.cz/schema/version_2/offer.xsd" xmlns:enq="http://www.stormware.cz/schema/version_2/enquiry.xsd" xmlns:vyd="http://www.stormware.cz/schema/version_2/vydejka.xsd" xmlns:pri="http://www.stormware.cz/schema/version_2/prijemka.xsd" xmlns:bal="http://www.stormware.cz/schema/version_2/balance.xsd" xmlns:pre="http://www.stormware.cz/schema/version_2/prevodka.xsd" xmlns:vyr="http://www.stormware.cz/schema/version_2/vyroba.xsd" xmlns:pro="http://www.stormware.cz/schema/version_2/prodejka.xsd" xmlns:con="http://www.stormware.cz/schema/version_2/contract.xsd" xmlns:adb="http://www.stormware.cz/schema/version_2/addressbook.xsd" xmlns:prm="http://www.stormware.cz/schema/version_2/parameter.xsd" xmlns:lCon="http://www.stormware.cz/schema/version_2/list_contract.xsd" xmlns:ctg="http://www.stormware.cz/schema/version_2/category.xsd" xmlns:ipm="http://www.stormware.cz/schema/version_2/intParam.xsd" xmlns:str="http://www.stormware.cz/schema/version_2/storage.xsd" xmlns:idp="http://www.stormware.cz/schema/version_2/individualPrice.xsd" xmlns:sup="http://www.stormware.cz/schema/version_2/supplier.xsd" xmlns:prn="http://www.stormware.cz/schema/version_2/print.xsd" xmlns:lck="http://www.stormware.cz/schema/version_2/lock.xsd" xmlns:isd="http://www.stormware.cz/schema/version_2/isdoc.xsd" xmlns:sEET="http://www.stormware.cz/schema/version_2/sendEET.xsd" xmlns:act="http://www.stormware.cz/schema/version_2/accountancy.xsd" xmlns:bnk="http://www.stormware.cz/schema/version_2/bank.xsd" xmlns:sto="http://www.stormware.cz/schema/version_2/store.xsd" xmlns:grs="http://www.stormware.cz/schema/version_2/groupStocks.xsd" xmlns:acp="http://www.stormware.cz/schema/version_2/actionPrice.xsd" xmlns:csh="http://www.stormware.cz/schema/version_2/cashRegister.xsd" xmlns:bka="http://www.stormware.cz/schema/version_2/bankAccount.xsd" xmlns:ilt="http://www.stormware.cz/schema/version_2/inventoryLists.xsd" xmlns:nms="http://www.stormware.cz/schema/version_2/numericalSeries.xsd" xmlns:pay="http://www.stormware.cz/schema/version_2/payment.xsd" xmlns:mKasa="http://www.stormware.cz/schema/version_2/mKasa.xsd" xmlns:gdp="http://www.stormware.cz/schema/version_2/GDPR.xsd" xmlns:est="http://www.stormware.cz/schema/version_2/establishment.xsd" xmlns:cen="http://www.stormware.cz/schema/version_2/centre.xsd" xmlns:acv="http://www.stormware.cz/schema/version_2/activity.xsd" xmlns:afp="http://www.stormware.cz/schema/version_2/accountingFormOfPayment.xsd" xmlns:vat="http://www.stormware.cz/schema/version_2/classificationVAT.xsd" xmlns:rgn="http://www.stormware.cz/schema/version_2/registrationNumber.xsd" xmlns:ftr="http://www.stormware.cz/schema/version_2/filter.xsd" xmlns:asv="http://www.stormware.cz/schema/version_2/accountingSalesVouchers.xsd" xmlns:arch="http://www.stormware.cz/schema/version_2/archive.xsd" xmlns:req="http://www.stormware.cz/schema/version_2/productRequirement.xsd" xmlns:mov="http://www.stormware.cz/schema/version_2/movement.xsd" xmlns:rec="http://www.stormware.cz/schema/version_2/recyclingContrib.xsd" xmlns:srv="http://www.stormware.cz/schema/version_2/service.xsd" xmlns:rul="http://www.stormware.cz/schema/version_2/rulesPairing.xsd" xmlns:lwl="http://www.stormware.cz/schema/version_2/liquidationWithoutLink.xsd" xmlns:dis="http://www.stormware.cz/schema/version_2/discount.xsd" xmlns:lqd="http://www.stormware.cz/schema/version_2/automaticLiquidation.xsd">
				<inv:invoiceType>receivedInvoice</inv:invoiceType>
				<inv:number>
					<typ:numberRequested>' . $number . '</typ:numberRequested>
				</inv:number>
				<inv:symVar>' . $symvar . '</inv:symVar>
				<inv:date>' . $dateInvoiced . '</inv:date>
				' . $dueDate . '
				<inv:text>' . $name . '</inv:text>
				<inv:partnerIdentity>
					<typ:address>
						<typ:company>' . $company . '</typ:company>
						<typ:name>' . $contact . '</typ:name>
                        <typ:city>' . $billingAddressCity . '</typ:city>
                        <typ:street>' . $billingAddressStreet . '</typ:street>
						<typ:zip>' . $billingAddressPostalCode . '</typ:zip>
						<typ:ico>' . $sicCode . '</typ:ico>
						<typ:dic>' . $vatId . '</typ:dic>
					</typ:address>
				</inv:partnerIdentity>
                <inv:paymentType>
                    <typ:paymentType>' . $paymentMethod . '</typ:paymentType>
                </inv:paymentType>
				<inv:numberOrder>' . $orderNumber . '</inv:numberOrder>
				<inv:symConst>' . $symconst . '</inv:symConst>
			</inv:invoiceHeader>
			<inv:invoiceDetail xmlns:rsp="http://www.stormware.cz/schema/version_2/response.xsd" xmlns:rdc="http://www.stormware.cz/schema/version_2/documentresponse.xsd" xmlns:typ="http://www.stormware.cz/schema/version_2/type.xsd" xmlns:lst="http://www.stormware.cz/schema/version_2/list.xsd" xmlns:lStk="http://www.stormware.cz/schema/version_2/list_stock.xsd" xmlns:lAdb="http://www.stormware.cz/schema/version_2/list_addBook.xsd" xmlns:lCen="http://www.stormware.cz/schema/version_2/list_centre.xsd" xmlns:lAcv="http://www.stormware.cz/schema/version_2/list_activity.xsd" xmlns:acu="http://www.stormware.cz/schema/version_2/accountingunit.xsd" xmlns:vch="http://www.stormware.cz/schema/version_2/voucher.xsd" xmlns:int="http://www.stormware.cz/schema/version_2/intDoc.xsd" xmlns:stk="http://www.stormware.cz/schema/version_2/stock.xsd" xmlns:ord="http://www.stormware.cz/schema/version_2/order.xsd" xmlns:ofr="http://www.stormware.cz/schema/version_2/offer.xsd" xmlns:enq="http://www.stormware.cz/schema/version_2/enquiry.xsd" xmlns:vyd="http://www.stormware.cz/schema/version_2/vydejka.xsd" xmlns:pri="http://www.stormware.cz/schema/version_2/prijemka.xsd" xmlns:bal="http://www.stormware.cz/schema/version_2/balance.xsd" xmlns:pre="http://www.stormware.cz/schema/version_2/prevodka.xsd" xmlns:vyr="http://www.stormware.cz/schema/version_2/vyroba.xsd" xmlns:pro="http://www.stormware.cz/schema/version_2/prodejka.xsd" xmlns:con="http://www.stormware.cz/schema/version_2/contract.xsd" xmlns:adb="http://www.stormware.cz/schema/version_2/addressbook.xsd" xmlns:prm="http://www.stormware.cz/schema/version_2/parameter.xsd" xmlns:lCon="http://www.stormware.cz/schema/version_2/list_contract.xsd" xmlns:ctg="http://www.stormware.cz/schema/version_2/category.xsd" xmlns:ipm="http://www.stormware.cz/schema/version_2/intParam.xsd" xmlns:str="http://www.stormware.cz/schema/version_2/storage.xsd" xmlns:idp="http://www.stormware.cz/schema/version_2/individualPrice.xsd" xmlns:sup="http://www.stormware.cz/schema/version_2/supplier.xsd" xmlns:prn="http://www.stormware.cz/schema/version_2/print.xsd" xmlns:lck="http://www.stormware.cz/schema/version_2/lock.xsd" xmlns:isd="http://www.stormware.cz/schema/version_2/isdoc.xsd" xmlns:sEET="http://www.stormware.cz/schema/version_2/sendEET.xsd" xmlns:act="http://www.stormware.cz/schema/version_2/accountancy.xsd" xmlns:bnk="http://www.stormware.cz/schema/version_2/bank.xsd" xmlns:sto="http://www.stormware.cz/schema/version_2/store.xsd" xmlns:grs="http://www.stormware.cz/schema/version_2/groupStocks.xsd" xmlns:acp="http://www.stormware.cz/schema/version_2/actionPrice.xsd" xmlns:csh="http://www.stormware.cz/schema/version_2/cashRegister.xsd" xmlns:bka="http://www.stormware.cz/schema/version_2/bankAccount.xsd" xmlns:ilt="http://www.stormware.cz/schema/version_2/inventoryLists.xsd" xmlns:nms="http://www.stormware.cz/schema/version_2/numericalSeries.xsd" xmlns:pay="http://www.stormware.cz/schema/version_2/payment.xsd" xmlns:mKasa="http://www.stormware.cz/schema/version_2/mKasa.xsd" xmlns:gdp="http://www.stormware.cz/schema/version_2/GDPR.xsd" xmlns:est="http://www.stormware.cz/schema/version_2/establishment.xsd" xmlns:cen="http://www.stormware.cz/schema/version_2/centre.xsd" xmlns:acv="http://www.stormware.cz/schema/version_2/activity.xsd" xmlns:afp="http://www.stormware.cz/schema/version_2/accountingFormOfPayment.xsd" xmlns:vat="http://www.stormware.cz/schema/version_2/classificationVAT.xsd" xmlns:rgn="http://www.stormware.cz/schema/version_2/registrationNumber.xsd" xmlns:ftr="http://www.stormware.cz/schema/version_2/filter.xsd" xmlns:asv="http://www.stormware.cz/schema/version_2/accountingSalesVouchers.xsd" xmlns:arch="http://www.stormware.cz/schema/version_2/archive.xsd" xmlns:req="http://www.stormware.cz/schema/version_2/productRequirement.xsd" xmlns:mov="http://www.stormware.cz/schema/version_2/movement.xsd" xmlns:rec="http://www.stormware.cz/schema/version_2/recyclingContrib.xsd" xmlns:srv="http://www.stormware.cz/schema/version_2/service.xsd" xmlns:rul="http://www.stormware.cz/schema/version_2/rulesPairing.xsd" xmlns:lwl="http://www.stormware.cz/schema/version_2/liquidationWithoutLink.xsd" xmlns:dis="http://www.stormware.cz/schema/version_2/discount.xsd" xmlns:lqd="http://www.stormware.cz/schema/version_2/automaticLiquidation.xsd">
                ' . $invoiceItems . '
            </inv:invoiceDetail>
        </inv:invoice>
    </dat:dataPackItem>
</dat:dataPack>';

        return $xmlData;
    }
}
