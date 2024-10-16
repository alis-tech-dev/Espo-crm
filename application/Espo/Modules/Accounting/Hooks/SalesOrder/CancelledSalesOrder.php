<?php

namespace Espo\Modules\Accounting\Hooks\SalesOrder;

use Espo\Core\Exceptions\Error\Body as ErrorBody;
use Espo\Core\Exceptions\ErrorSilent;
use Espo\Modules\Accounting\Entities\Invoice;
use Espo\Modules\AccountingCz\Entities\CreditNote as CreditNoteEntity;
use Espo\Modules\Autocrm\Tools\RecordList\Loader as RecordListLoader;
use Espo\Modules\WarehouseManagement\Entities\GoodsIssue;
use Espo\Modules\WarehouseManagement\Entities\GoodsReceipt;
use Espo\Core\InjectableFactory;
use Espo\Core\Utils\Log;
use Espo\ORM\Query\Part\Condition as Cond;
use Espo\ORM\Repository\Option\SaveOptions;
use Espo\Core\Utils\{
    DateTime,
    Config
};
use Espo\ORM\{
    Defs\FieldDefs,
    Entity,
    EntityManager
};

class CancelledSalesOrder implements \Espo\Core\Hook\Hook\BeforeSave {
    public function __construct (
        private readonly EntityManager $entityManager,
        private readonly InjectableFactory $injectableFactory,
        private readonly Log $log,
        private readonly Config $config,
    ) {
    }

    private function debug ($message, array $context = []) {
        $this->log->debug('[Accounting\Hooks\SalesOrder\CancelledSalesOrder] ' . $message, $context);
    }

    public function beforeSave (Entity $entity, SaveOptions $options): void {
        if ($entity->isAttributeChanged('status') && $entity->get('status') === 'cancelled') {
            $this->debug('SalesOrder status changed to cancelled');

            if ($this->isThereSomeProcessingGoodsIssue($entity->getId())) {
                throw ErrorSilent::createWithBody(
                    'Goods Issue is processing',
                    ErrorBody::create()
                             ->withMessageTranslation('goodsIssueIsProcessing', GoodsIssue::ENTITY_TYPE)
                             ->encode()
                );
            }

            $this->entityManager->getTransactionManager()->start();
            $this->debug('SalesOrder transaction of cancelling started');

            try {
                $this->cancelAllGoodsIssue($entity->getId());
                $this->revertIssuedGoodsIssues($entity);
                $invoices = $this->getInvoices($entity->getId());
                $this->createCreditNote($invoices);
                $this->cancelInvoice($invoices);
                $this->entityManager->getTransactionManager()->commit();

                $this->debug('SalesOrder transaction of cancelling successfully finished');
            } catch (\Exception $e) {
                $this->debug('SalesOrder transaction of cancelling failed');
                $this->entityManager->getTransactionManager()->rollback();
                throw $e;
            }
        }
    }

    private function isThereSomeProcessingGoodsIssue ($salesOrderId) {
        $goodsIssues = $this->entityManager
            ->getRDBRepository(GoodsIssue::ENTITY_TYPE)
            ->where(Cond::and(
                Cond::or(
                    Cond::equal(Cond::column('status'), GoodsIssue::STATUS_PROCESSING),
                    Cond::equal(Cond::column('status'), GoodsIssue::STATUS_RESERVING)
                ),
                Cond::equal(Cond::column('salesOrderId'), $salesOrderId)
            ))
            ->forUpdate()
            ->find();

        return !empty($goodsIssues->getValueMapList());
    }

    private function cancelAllGoodsIssue ($salesOrderId) {
        $goodsIssuesToCancel = $this->entityManager
            ->getRDBRepository(GoodsIssue::ENTITY_TYPE)
            ->where(Cond::and(
                Cond::or(
                    Cond::equal(Cond::column('status'), GoodsIssue::STATUS_DRAFT),
                    Cond::equal(Cond::column('status'), GoodsIssue::STATUS_RESERVED)
                ),
                Cond::equal(Cond::column('salesOrderId'), $salesOrderId)
            ))
            ->forUpdate()
            ->find();

        foreach ($goodsIssuesToCancel as $goodIssue) {
            $goodIssue->set('status', GoodsIssue::STATUS_CANCELED);
            $this->entityManager->saveEntity($goodIssue);
        }
    }

    private function revertIssuedGoodsIssues (Entity $entity) {
        $goodsIssueToRevert = $this->entityManager
            ->getRDBRepository(GoodsIssue::ENTITY_TYPE)
            ->where(Cond::and(
                Cond::or(
                    Cond::equal(Cond::column('status'), GoodsIssue::STATUS_ISSUED),
                ),
                Cond::equal(Cond::column('salesOrderId'), $entity->getId())
            ))
            ->forUpdate()
            ->find();

        $recordList = [];
        foreach ($goodsIssueToRevert as $goodIssue) {
            $recordList = array_merge($recordList, $this->getRecordListForGoodsReceipt($goodIssue));
        }

        if(!empty($recordList)) {
            $this->debug('No items for revert', [$recordList]);

            $goodsReceipt = $this->entityManager
                ->getNewEntity(GoodsReceipt::ENTITY_TYPE);

            $goodsReceipt->set('itemsRecordList', $recordList);
            $goodsReceipt->set('name', 'Vrácení zboží z objednávky ' . $entity->get('storeId'));
            $goodsReceipt->set('warehouseId', $this->config->get('warehouseRevertGoodsInSalesOrderId'));
            $goodsReceipt->set('warehouseName', $this->config->get('warehouseRevertGoodsInSalesOrderName'));
            $goodsReceipt->set('warehouseType', $this->config->get('warehouseRevertGoodsInSalesOrderType'));
            $goodsReceipt->set('status', GoodsReceipt::STATUS_DRAFT);
            $goodsReceipt->set('salesOrderName', $entity->get('name'));
            $goodsReceipt->set('salesOrderId', $entity->getId());

            $this->entityManager->saveEntity($goodsReceipt);

            // update goods issue to trigger service process
            $goodsReceipt->set('status', GoodsReceipt::STATUS_PROCESSING);
            $this->entityManager->saveEntity($goodsReceipt);
        }
        else {
            $this->debug('No items to revert');
        }
    }

    private function loadItemsRecordList (Entity $entity) {
        try {
            $this->getRecordListLoader()->load($entity, 'items', true);
        } catch (\Exception $e) {
            $this->log->error($e->getMessage());
        }
    }

    private function getRecordListLoader (): RecordListLoader {
        return $this->recordListLoader ??= $this->injectableFactory->create(RecordListLoader::class);
    }

    private function getRecordListForGoodsReceipt ($goodIssue) : array {
        $this->loadItemsRecordList($goodIssue);

        $recordList = [];
        foreach ($goodIssue->get('itemsRecordList') as $item) {

            $this->debug('itemsRecordList - item', [$item]);
            $recordList[] = (object)[
                'quantity' => $item->quantity,
                'productCode' => $item->productCode,
                /*'parentId' => $item->get(''),
                'parentType' => $item->get(''),
                'parentName' => $item->get(''),*/
                'productId' => $item->productId,
                'productName' => $item->productName,
                'positionToId' => $item->positionFromId,
                'positionToName' => $item->positionFromName,
            ];
        }

        return $recordList;
    }

    private function createCreditNote ($invoices) {

        foreach ($invoices as $invoice)
        {
            $newCreditNotes = $this->entityManager->getNewEntity(CreditNoteEntity::ENTITY_TYPE);

            // Copy all fields from invoice to credit note (they should be +- same)
            $allInvoiceFields = $invoice->getAttributeList();
            foreach ($allInvoiceFields as $fieldName)
            {
                $newCreditNotes->set($fieldName, $invoice->get($fieldName));
            }

            // This values must be set
            $newCreditNotes->set('id', null);
            $newCreditNotes->set('name', 'Úhrada faktury ' . $invoice->get('name'));
            $newCreditNotes->set('status', 'Issued');

            if (class_exists(\Espo\Modules\Premier\Tools\Premier::class))
                $newCreditNotes->set(\Espo\Modules\Premier\Tools\Premier::FIELD_UPLOADED, null);

            // add reference to credit note about invoice ids (so there is a link between invoice and credit note)
            $invoicesIds = $newCreditNotes->get('invoicesIds');
            if (!is_array($invoicesIds))
            {
                $invoicesIds = [];
            }

            $invoicesIds[] = $invoice->get('id');
            $newCreditNotes->set('invoicesIds', $invoicesIds);

            $invoicesNames = $newCreditNotes->get('invoicesNames');
            if (!is_array($invoicesNames))
            {
                $invoicesNames = [];
            }

            $invoicesNames[] = $invoice->get('name');
            $newCreditNotes->set('invoicesNames', $invoicesNames);

            // edit items (change sign of all values) and delete id for new items
            $newCreditNotes->set('itemsIds', null);

            $oldItemRecordList = $invoice->get('items');
            $newItemRecordList = [];

            foreach ($oldItemRecordList as $item)
            {
                // if its not product item (it is probably some fee), skip it
                if(empty($item->get('productId')))
                    continue;

                $item->set('id', null);
                $item->set('unitPrice', - $item->get('unitPrice'));
                $item->set('amount', - $item->get('amount'));
                $item->set('taxAmount', - $item->get('taxAmount'));
                $item->set('taxAmount', - $item->get('taxAmount'));

                $newItemRecordList[] = $item;
            }

            $newCreditNotes->set('items', $newItemRecordList);

            // create new credit note
            $this->entityManager->saveEntity($newCreditNotes);
        }
    }

    private function cancelInvoice ($invoices) {
        foreach ($invoices as $invoice)
        {
            $invoice->set('status', 'Canceled');
            $this->entityManager->saveEntity($invoice);
        }
    }

    private function getInvoices ($salesOrderId) {
        return $this->entityManager
            ->getRDBRepository(Invoice::ENTITY_TYPE)
            ->where(Cond::and(
                Cond::equal(Cond::column('salesOrderId'), $salesOrderId),
                Cond::notEqual(Cond::column('status'), 'Canceled')
            ))
            ->forUpdate()
            ->find();
    }
}
