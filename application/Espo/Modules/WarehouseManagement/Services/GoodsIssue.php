<?php

namespace Espo\Modules\WarehouseManagement\Services;

use Espo\Core\Exceptions\{
    BadRequest,
    Conflict,
    Error,
    Forbidden};
use Espo\Core\Record\CreateParams;
use Espo\Modules\WarehouseManagement\Entities\GoodsIssue as GoodsIssueEntity;
use Espo\Modules\WarehouseManagement\Tools\Stock\Services\Issuer as StockIssuerService;
use Espo\ORM\Entity;
use Exception;
use stdClass;

class GoodsIssue extends \Espo\Core\Templates\Services\Base
{
    protected $mandatorySelectAttributeList = ['type', 'warehouseType']; //always select because of frontend

    private ?StockIssuerService $stockIssuerService = null;

    /**
     * @throws BadRequest
     * @throws Forbidden
     * @throws Conflict
     * @throws Exception
     */
    public function create(stdClass $data, CreateParams $params): Entity
    {
        /** @var GoodsIssueEntity $entity */
        $entity = parent::create($data, $params);

        $this->processEntity($entity);

        return $entity;
    }

    /**
     * @param GoodsIssueEntity $entity
     * @param object           $data
     *
     * @return void
     * @throws Conflict
     */
    protected function beforeUpdateEntity(Entity $entity, $data): void
    {
        if ($entity->getFetched('status') === GoodsIssueEntity::STATUS_ISSUED) {
            $lockedAttributes = ['itemsIds', 'itemsRecordList', 'selectedItemsIds', 'selectedItemsRecordList', 'status', 'warehouseId'];

            foreach ($lockedAttributes as $attribute) {
                if ($entity->isAttributeChanged($attribute)) {
                    throw Conflict::createWithBody(
                        'goodsIssueLocked',
                        Error\Body::create()
                            ->withMessageTranslation('goodsIssueLocked', GoodsIssueEntity::ENTITY_TYPE, [
                                'attribute' => $attribute,
                            ])
                            ->encode()
                    );
                }
            }
        }

        if ($entity->getFetched('status') === GoodsIssueEntity::STATUS_CANCELED && $entity->isAttributeChanged('status')) {
            throw Conflict::createWithBody(
                'goodsIssueCanceled',
                Error\Body::create()
                    ->withMessageTranslation('goodsIssueCanceled', GoodsIssueEntity::ENTITY_TYPE)
                    ->encode()
            );
        }
    }

    /** @param GoodsIssueEntity $entity
     * @throws Exception
     */
    protected function afterUpdateEntity(Entity $entity, $data): void
    {
        $this->processEntity($entity);
    }

    /**
     * @throws Exception
     */
    private function processEntity(GoodsIssueEntity $entity): void
    {
        if ($entity->getStatus() === GoodsIssueEntity::STATUS_DRAFT) {
            $this->setStockIssuerService()->reset($entity);
        }

        if ($entity->getStatus() === GoodsIssueEntity::STATUS_RESERVING) {
            $this->setStockIssuerService()->reserve($entity);
        }

        if ($entity->getStatus() === GoodsIssueEntity::STATUS_PROCESSING) {
            $this->setStockIssuerService()->issue($entity);
        }
    }

    public function setStockIssuerService(): StockIssuerService
    {
        if (!$this->stockIssuerService) {
            $this->stockIssuerService = $this->injectableFactory->create(StockIssuerService::class);
        }

        return $this->stockIssuerService;
    }
}
