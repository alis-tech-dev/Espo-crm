<?php

namespace Espo\Modules\WarehouseManagement\Services;

use Espo\Core\Exceptions\{
    BadRequest,
    Conflict,
    Error,
    Forbidden};
use Espo\Core\Record\CreateParams;
use Espo\Modules\WarehouseManagement\Entities\WarehouseTransfer as WarehouseTransferEntity;
use Espo\Modules\WarehouseManagement\Tools\Stock\Services\Transferer as StockTransfererService;
use Espo\ORM\Entity;
use Exception;
use stdClass;

class WarehouseTransfer extends \Espo\Core\Templates\Services\Base
{
    protected $mandatorySelectAttributeList = ['warehouseFromType', 'warehouseToType']; //always select because of frontend

    private ?StockTransfererService $stockTransfererService = null;

    /**
     * @throws BadRequest
     * @throws Forbidden
     * @throws Conflict
     * @throws Exception
     */
    public function create(stdClass $data, CreateParams $params): Entity
    {
        /** @var WarehouseTransferEntity $entity */
        $entity = parent::create($data, $params);

        if ($entity->getStatus() === WarehouseTransferEntity::STATUS_PROCESSING) {
            $this->getStockTransfererService()->transfer($entity);
        }

        return $entity;
    }

    /**
     * @param WarehouseTransferEntity $entity
     *
     * @throws Exception
     */

    protected function afterUpdateEntity(Entity $entity, $data): void
    {
        $this->processEntity($entity);
    }

    /**
     * @param WarehouseTransferEntity $entity
     * @param object                  $data
     *
     * @return void
     * @throws Conflict
     */
    protected function beforeUpdateEntity(Entity $entity, $data): void
    {
        if ($entity->getFetched('status') === WarehouseTransferEntity::STATUS_TRANSFERRED) {
            $lockedAttributes = ['itemsIds', 'itemsRecordList', 'status', 'warehouseFromId', 'warehouseToId'];

            foreach ($lockedAttributes as $attribute) {
                if ($entity->isAttributeChanged($attribute)) {
                    throw Conflict::createWithBody(
                        'warehouseTransferLocked',
                        Error\Body::create()
                            ->withMessageTranslation('warehouseTransferLocked', WarehouseTransferEntity::ENTITY_TYPE, [
                                'attribute' => $attribute,
                            ])
                            ->encode()
                    );
                }
            }
        }
    }

    /**
     * @throws Exception
     */
    private function processEntity(WarehouseTransferEntity $entity): void
    {
        if ($entity->getStatus() === WarehouseTransferEntity::STATUS_PROCESSING) {
            $this->getStockTransfererService()->transfer($entity);
        }
    }

    public function getStockTransfererService(): StockTransfererService
    {
        if (!$this->stockTransfererService) {
            $this->stockTransfererService = $this->injectableFactory->create(StockTransfererService::class);
        }

        return $this->stockTransfererService;
    }
}
