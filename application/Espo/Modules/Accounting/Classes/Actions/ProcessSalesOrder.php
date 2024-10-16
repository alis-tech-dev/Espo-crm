<?php

namespace Espo\Modules\Accounting\Classes\Actions;

use Espo\Core\Api\Action;
use Espo\Core\Api\Request;
use Espo\Core\Api\Response;
use Espo\Core\Api\ResponseComposer;
use Espo\Core\Exceptions\BadRequest;
use Espo\Core\Exceptions\Error\Body as ErrorBody;
use Espo\Core\Exceptions\ErrorSilent;
use Espo\Core\InjectableFactory;
use Espo\Core\Utils\Log;
use Espo\Modules\Accounting\Entities\SalesOrder;
use Espo\Modules\Autocrm\Tools\RecordList\Loader as RecordListLoader;
use Espo\Modules\WarehouseManagement\Entities\GoodsIssue;
use Espo\Modules\WarehouseManagement\Entities\GoodsReceipt;
use Espo\ORM\Collection;
use Espo\ORM\Entity;
use Espo\ORM\EntityManager;
use Espo\ORM\Query\Part\Expression as Expr;
use Espo\ORM\Query\Part\Condition as Cond;

class ProcessSalesOrder implements Action
{
    public function __construct(
        protected readonly EntityManager $entityManager,
        protected readonly InjectableFactory $injectableFactory,
        protected readonly Log $log,
    ) {}

    private function debug ($message, array $context = []) {
        $this->log->debug("[Espo\Modules\Accounting\Classes\Actions\ProcessSalesOrder]: " . $message, $context);
    }

    private function loadItemsRecordList (Entity $entity, $fieldName = 'items') {
        try {
            $this->getRecordListLoader()->load($entity, $fieldName, true);
        } catch (\Exception $e) {
            $this->log->error($e->getMessage());
        }
    }

    private function getRecordListLoader (): RecordListLoader {
        return $this->recordListLoader ??= $this->injectableFactory->create(RecordListLoader::class);
    }

    public function process(Request $request): Response
    {
        $id = $request->getParsedBody()?->id;

        $this->debug("Trying to process sales order with ID: " . $id);

        if (!$id) {
            throw new BadRequest("No ID.");
        }

        $salesOrder = $this->getSalesOrder($id);

        if (!$salesOrder) {
            throw new BadRequest("No sales order.");
        }

        if ($this->isThereSomeProcessingGoodsIssue($salesOrder->getId())) {
            throw ErrorSilent::createWithBody(
                'Goods Issue is processing',
                ErrorBody::create()
                         ->withMessageTranslation('goodsIssueIsProcessing', GoodsIssue::ENTITY_TYPE)
                         ->encode()
            );
        }

        $tm = $this->entityManager->getTransactionManager();
        $tm->start();

        try {
            $this->cancelIrrelevantGoodsIssues($salesOrder->getId());
            $this->processSalesOrder($salesOrder);
            $tm->commit();
        }
        catch (\Throwable $e) {
            $tm->rollback();

            throw $e;
        }

        return ResponseComposer::json([
            'success' => true,
            'message' => 'processSalesOrderSuccess'
        ]);
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

    private function getSalesOrder ($salesOrderId) {
        return $this->entityManager
            ->getRDBRepository(SalesOrder::ENTITY_TYPE)
            ->where(Expr::equal(Expr::column('id'), $salesOrderId))
            ->forUpdate()
            ->findOne();
    }

    private function processSalesOrder ($salesOrder) {
        $this->loadItemsRecordList($salesOrder);
        $itemsInSalesOrder = $salesOrder->get('itemsRecordList');
        $itemsInGoodsReceipts = $this->getItemsInGoodsReceipts($salesOrder);
        $itemsIssued = $this->getIssuedItems($salesOrder);
        $itemsReserved = $this->getReservedItems($salesOrder);

        // TODO: zjisti prebyvajici polozky
        $itemsForRevert = [];
        // TODO: zjisti chybejici polozky
        $itemsForReservation = [];

        // TODO: vytvor prijemky

        // TODO: vytvor vydejky
    }

    private function cancelIrrelevantGoodsIssues ($salesOrderId) : void {
        $goodsIssues = $this->entityManager
            ->getRDBRepository(GoodsIssue::ENTITY_TYPE)
            ->where(Cond::and(
                Cond::equal(Cond::column('salesOrderId'), $salesOrderId),
                Cond::equal(Cond::column('status'), GoodsIssue::STATUS_DRAFT)
            ))
            ->forUpdate()
            ->find();

        foreach ($goodsIssues as $goodsIssue) {
            $goodsIssue->set('status', GoodsIssue::STATUS_CANCELED);
            $this->entityManager->saveEntity($goodsIssue);
        }
    }

    private function getGoodsReceipt ($salesOrderId) : Collection  {
        return $this->entityManager
            ->getRDBRepository(GoodsReceipt::ENTITY_TYPE)
            ->where(Cond::and(
                Cond::equal(Cond::column('salesOrderId'), $salesOrderId),
                Cond::equal(Cond::column('status'), GoodsReceipt::STATUS_RECEIVED)
            ))
            ->forUpdate()
            ->find();
    }

    private function getIssuedGoodsIssue ($salesOrderId) : Collection  {
        return $this->entityManager
            ->getRDBRepository(GoodsIssue::ENTITY_TYPE)
            ->where(Cond::and(
                Cond::equal(Cond::column('salesOrderId'), $salesOrderId),
                Cond::equal(Cond::column('status'), GoodsIssue::STATUS_ISSUED)
            ))
            ->forUpdate()
            ->find();
    }

    private function getReservedGoodsIssue ($salesOrderId) : Collection {
        return $this->entityManager
            ->getRDBRepository(GoodsIssue::ENTITY_TYPE)
            ->where(Cond::and(
                Cond::equal(Cond::column('salesOrderId'), $salesOrderId),
                Cond::equal(Cond::column('status'), GoodsIssue::STATUS_RESERVED)
            ))
            ->forUpdate()
            ->find();
    }

    private function getItemsInGoodsReceipts ($salesOrder) : array {
        $receivedItems = [];
        $goodsReceipts = $this->getGoodsReceipt($salesOrder->getId());
        foreach ($goodsReceipts as $goodsReceipt) {
            $this->loadItemsRecordList($goodsReceipt);
            $receivedItems = array_merge($receivedItems, $goodsReceipt->get('itemsRecordList'));
        }
        return $receivedItems;
    }

    public function getReservedItems ($salesOrder): array {
        $itemsReserved      = [];
        $reservedGoodsIssue = $this->getReservedGoodsIssue($salesOrder->getId());
        foreach ($reservedGoodsIssue as $goodsIssue) {
            $this->loadItemsRecordList($goodsIssue);
            $itemsReserved = array_merge($itemsReserved, $goodsIssue->get('itemsRecordList'));
        }
        return $itemsReserved;
    }

    public function getIssuedItems ($salesOrder): array {
        $itemsIssued      = [];
        $issuedGoodsIssue = $this->getIssuedGoodsIssue($salesOrder->getId());
        foreach ($issuedGoodsIssue as $goodsIssue) {
            $this->loadItemsRecordList($goodsIssue);
            $itemsIssued = array_merge($itemsIssued, $goodsIssue->get('itemsRecordList'));
        }
        return $itemsIssued;
    }

    private function getItemsForRevert ($salesOrderId) {

    }

    private function getItemsForExpedition () {

    }
}