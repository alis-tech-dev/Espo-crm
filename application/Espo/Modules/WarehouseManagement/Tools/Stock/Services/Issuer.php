<?php

namespace Espo\Modules\WarehouseManagement\Tools\Stock\Services;

use Espo\Core\Exceptions\{
    BadRequest,
    Error,
    Forbidden};
use Espo\Modules\WarehouseManagement\Entities\{
    GoodsIssue as GoodsIssueEntity,
    Warehouse,
    WarehouseItem};
use Espo\Modules\WarehouseManagement\Tools\Stock\{
    Determination\Factory as StockDeterminationFactory,
    InformationProvider\Factory as StockInformationProviderFactory,
    InformationProvider\StockInformationProvider,
    Manager\Factory as StockManagerFactory,
    StockHelper};
use Espo\ORM\EntityCollection;
use Espo\ORM\EntityManager;
use Espo\ORM\Query\Part\Condition as Cond;
use Exception;
use RuntimeException;

class Issuer
{
    public const RESERVE_OPTIONS_FORCE = 'force';

    public function __construct(
        private readonly EntityManager $entityManager,
        private readonly StockManagerFactory $stockManagerFactory,
        private readonly StockHelper $stockHelper,
        private readonly StockInformationProviderFactory $informationProviderFactory,
        private readonly StockDeterminationFactory $stockDeterminationFactory,
    ) {
    }

    /**
     * @throws Exception
     */
    public function issue(GoodsIssueEntity $goodsIssue): void
    {
        if (in_array($goodsIssue->getStatus(), [GoodsIssueEntity::STATUS_ISSUED, GoodsIssueEntity::STATUS_CANCELED])) {
            throw new RuntimeException("StockIssuerService: Goods issue is already issued or canceled");
        }

        /** @var ?Warehouse $warehouse */
        $warehouse = $this->entityManager
            ->getRDBRepository(GoodsIssueEntity::ENTITY_TYPE)
            ->getRelation($goodsIssue, 'warehouse')
            ->findOne();

        if (!$warehouse) {
            throw new RuntimeException("StockIssuerService: Warehouse is not set");
        }

        $itemsRelation = $this->entityManager
            ->getRDBRepository(GoodsIssueEntity::ENTITY_TYPE)
            ->getRelation($goodsIssue, 'items');

        $this->entityManager->getTransactionManager()->start();

        try {
            /** @var EntityCollection<WarehouseItem> $items */
            $items = $itemsRelation->find();

            if (count($items) === 0) {
                $this->reserveInternal($goodsIssue);

                /** @var EntityCollection<WarehouseItem> $items */
                $items = $itemsRelation->find();
            }

            $stockManager = $this->stockManagerFactory->create($warehouse);

            foreach ($items as $item) {
                $stockManager->removeStock($item);
            }

            $this->entityManager->getTransactionManager()->commit();

            $goodsIssue->set('status', GoodsIssueEntity::STATUS_ISSUED);
        } catch (Exception $e) {
            $this->entityManager->getTransactionManager()->rollback();

            $this->reset($goodsIssue);
            $goodsIssue->set('status', GoodsIssueEntity::STATUS_DRAFT);

            throw $e;
        } finally {
            $this->entityManager->saveEntity($goodsIssue);
        }
    }

    /**
     * @throws Exception
     */
    public function reserve(GoodsIssueEntity $goodsIssue, array $options = []): void
    {
        if (in_array($goodsIssue->getStatus(), [GoodsIssueEntity::STATUS_ISSUED, GoodsIssueEntity::STATUS_CANCELED])) {
            throw new RuntimeException("StockIssuerService: Goods issue is already issued or canceled");
        }

        if (!empty($options[self::RESERVE_OPTIONS_FORCE])) {
            if ($goodsIssue->getStatus() === GoodsIssueEntity::STATUS_RESERVED) {
                return;
            }
        }

        $this->entityManager->getTransactionManager()->start();

        try {
            $this->reserveInternal($goodsIssue);

            $this->entityManager->getTransactionManager()->commit();

            $goodsIssue->set('status', GoodsIssueEntity::STATUS_RESERVED);
        } catch (Exception $e) {
            $this->entityManager->getTransactionManager()->rollback();
            $goodsIssue->set('status', GoodsIssueEntity::STATUS_DRAFT);

            throw $e;
        } finally {
            $this->entityManager->saveEntity($goodsIssue);
        }
    }

    /**
     * @throws BadRequest
     * @throws Forbidden
     * @throws Error
     */
    private function reserveInternal(GoodsIssueEntity $goodsIssue): void
    {
        /** @var ?Warehouse $warehouse */
        $warehouse = $this->entityManager
            ->getRDBRepository(GoodsIssueEntity::ENTITY_TYPE)
            ->getRelation($goodsIssue, 'warehouse')
            ->findOne();

        if (!$warehouse) {
            throw new RuntimeException("StockIssuerService: Warehouse is not set");
        }

        $stockInformationProvider = $this->informationProviderFactory->create($warehouse->getType());

        $stockDeterminationProcessor = $this->stockDeterminationFactory->create();

        /** @var EntityCollection<WarehouseItem> $selectedItems */
        $selectedItems = $this->entityManager
            ->getRDBRepository(GoodsIssueEntity::ENTITY_TYPE)
            ->getRelation($goodsIssue, 'selectedItems')
            ->find();

        $this->reset($goodsIssue);

        $items = $stockDeterminationProcessor->findItems($warehouse, $selectedItems);

        foreach ($items as $item) {
            $this->addItemToGoodsIssue($goodsIssue, $item, $stockInformationProvider);
        }

        $goodsIssue->clear('itemsIds');
        $goodsIssue->clear('itemsRecordList');
    }

    public function reset(GoodsIssueEntity $entity): void
    {
        $query = $this->entityManager
            ->getQueryBuilder()
            ->delete()
            ->from(WarehouseItem::ENTITY_TYPE)
            ->where(
                Cond::and(
                    Cond::equal(Cond::column('parentType'), GoodsIssueEntity::ENTITY_TYPE),
                    Cond::equal(Cond::column('parentId'), $entity->getId())
                )
            )
            ->build();

        $this->entityManager->getQueryExecutor()->execute($query);

        $entity->set('itemsRecordList', []);
    }

    /**
     * @throws BadRequest
     * @throws Forbidden
     * @throws Error
     */
    private function addItemToGoodsIssue(GoodsIssueEntity $goodsIssue, WarehouseItem $item, StockInformationProvider $informationProvider): void
    {
        $attributes = array_values($informationProvider->getItemAttributeMappingForRemove());
        $data = [];

        foreach ($attributes as $attribute) {
            $data[$attribute] = $item->get($attribute);
        }

        $query = $this->stockHelper->buildIdentificationQueryFromData($data);

        /** @var WarehouseItem $goodsIssueItem */
        $goodsIssueItem = $this->entityManager
            ->getRDBRepository(GoodsIssueEntity::ENTITY_TYPE)
            ->getRelation($goodsIssue, 'items')
            ->clone($query)
            ->findOne();

        if (!$goodsIssueItem) {
            /** @var WarehouseItem $goodsIssueItem */
            $goodsIssueItem = $this->entityManager->getNewEntity(WarehouseItem::ENTITY_TYPE);

            $goodsIssueItem->set($data);
            $goodsIssueItem->set([
                'parentType' => GoodsIssueEntity::ENTITY_TYPE,
                'parentId' => $goodsIssue->getId(),
                'quantity' => 0,
            ]);
        }

        $goodsIssueItem->addQuantity($item->getQuantity());

        $this->entityManager->saveEntity($goodsIssueItem);
    }
}
