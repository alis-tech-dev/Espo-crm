<?php

namespace Espo\Modules\WarehouseManagement\Services;

use Espo\Core\Exceptions\{
    BadRequest,
    Conflict,
    Error,
    Forbidden
};
use Espo\Core\Record\CreateParams;
use Espo\Modules\WarehouseManagement\Entities\GoodsReceipt as GoodsReceiptEntity;
use Espo\Modules\WarehouseManagement\Tools\Stock\Services\Receiver as StockReceiverService;
use Espo\ORM\Entity;
use Exception;
use stdClass;

class GoodsReceipt extends \Espo\Core\Templates\Services\Base
{
    protected $mandatorySelectAttributeList = ['warehouseType']; //always select because of frontend

    private ?StockReceiverService $stockReceiverService = null;

    /**
     * @throws BadRequest
     * @throws Forbidden
     * @throws Conflict
     * @throws Exception
     */
    public function create(stdClass $data, CreateParams $params): Entity
    {
        /** @var GoodsReceiptEntity $entity */
        $entity = parent::create($data, $params);

        $this->processEntity($entity);

        return $entity;
    }

    /**
     * @param GoodsReceiptEntity $entity
     * @param object             $data
     *
     * @return void
     * @throws Conflict
     */
    protected function beforeUpdateEntity(Entity $entity, $data): void
    {
        if ($entity->getFetched('status') === GoodsReceiptEntity::STATUS_RECEIVED) {
            $lockedAttributes = ['itemsIds', 'itemsRecordList', 'status', 'warehouseId'];

            foreach ($lockedAttributes as $attribute) {
                if ($entity->isAttributeChanged($attribute)) {
                    throw Conflict::createWithBody(
                        'goodsReceiptLocked',
                        Error\Body::create()
                            ->withMessageTranslation('goodsReceiptLocked', GoodsReceiptEntity::ENTITY_TYPE, [
                                'attribute' => $attribute,
                            ])
                            ->encode()
                    );
                }
            }
        }

        if ($entity->getFetched('status') === GoodsReceiptEntity::STATUS_CANCELED && $entity->isAttributeChanged('status')) {
            throw Conflict::createWithBody(
                'goodsReceiptCanceled',
                Error\Body::create()
                    ->withMessageTranslation('goodsReceiptCanceled', GoodsReceiptEntity::ENTITY_TYPE)
                    ->encode()
            );
        }
    }

    /**
     * @param GoodsReceiptEntity $entity
     *
     * @throws Exception
     */
    protected function afterUpdateEntity(Entity $entity, $data): void
    {
        $this->processEntity($entity);
    }

    /**
     * @throws Exception
     */
    private function processEntity(GoodsReceiptEntity $entity): void
    {
        if ($entity->getStatus() === GoodsReceiptEntity::STATUS_PROCESSING) {
            $this->getStockReceiverService()->receive($entity);
        }
    }

    public function getStockReceiverService(): StockReceiverService
    {
        if (!$this->stockReceiverService) {
            $this->stockReceiverService = $this->injectableFactory->create(StockReceiverService::class);
        }

        return $this->stockReceiverService;
    }
}
