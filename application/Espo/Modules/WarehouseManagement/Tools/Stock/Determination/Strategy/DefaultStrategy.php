<?php

namespace Espo\Modules\WarehouseManagement\Tools\Stock\Determination\Strategy;

use Espo\Core\Exceptions\{
    BadRequest,
    Error,
    Error\Body as ErrorBody,
    ErrorSilent,
    Forbidden
};
use Espo\Core\Utils\Config;
use Espo\Modules\WarehouseManagement\Entities\{
    Warehouse,
    WarehouseItem
};
use Espo\Modules\WarehouseManagement\Services\WarehouseItem as WarehouseItemService;
use Espo\Modules\WarehouseManagement\Tools\Stock\{
    InformationProvider\StockInformationProvider,
    StockHelper
};
use Espo\ORM\EntityCollection;
use Espo\ORM\EntityManager;
use Espo\ORM\Query\Part\Order;

class DefaultStrategy extends Strategy
{

    /** @var string[]|null */
    protected array $attributeMap; // properties are protected, as it DefaultStrategy is expected to be extended

    public function __construct(
        protected readonly EntityManager $entityManager,
        protected readonly Config $config,
        protected readonly StockHelper $stockHelper,
        protected readonly WarehouseItemService $warehouseItemService,
        Warehouse $warehouse,
        StockInformationProvider $informationProvider,
    ) {
        parent::__construct($warehouse, $informationProvider);

        $this->attributeMap = $this->informationProvider->getItemAttributeMappingForRemove();
    }

    /**
     * @inheritDoc
     * @throws BadRequest
     * @throws Forbidden
     * @throws Error
     */
    public function findItems(WarehouseItem $item): EntityCollection
    {
        $strategyList = (array)$this->config->get('warehouseStockDeterminationStrategyList', []);
        $order = [];

        foreach (array_keys($this->attributeMap) as $attribute) {
            $strategy = $strategyList[$attribute] ?? null;

            if (!$strategy) {
                continue;
            }

            $strategyOrder = $strategy['order'] ?? null;
            $direction = match ($strategyOrder) {
                'asc' => Order::ASC,
                'desc' => Order::DESC,
                default => null,
            };

            if (!$direction) {
                continue;
            }

            $order[] = Order::fromString($attribute)->withDirection($direction);
        }

        $data = $this->informationProvider->getItemIdentificationDataForRemove($item);

        foreach ($data as $key => $value) {
            if ($value === null || $value === '') {
                unset($data[$key]);
            }
        }

        $query = $this->stockHelper->buildIdentificationQueryFromData($data);

        $warehouseItems = $this->entityManager
            ->getRDBRepository(Warehouse::ENTITY_TYPE)
            ->getRelation($this->warehouse, 'items')
            ->clone($query)
            ->order($order)
            ->find();

        $result = new EntityCollection([], WarehouseItem::ENTITY_TYPE);
        $runningQuantity = $item->getQuantity();

        /** @var WarehouseItem $warehouseItem */
        foreach ($warehouseItems as $warehouseItem) {
            $this->warehouseItemService->loadWarehouseQuantities($warehouseItem);

            $quantity = min($warehouseItem->getAvailableQuantity(), $runningQuantity);

            if ($quantity <= 0) {
                continue;
            }

            $newItem = $this->getClonedItem($warehouseItem);
            $newItem->setQuantity($quantity);

            $result->append($newItem);

            $runningQuantity -= $quantity;

            if ($runningQuantity <= 0) {
                break;
            }
        }

        if ($runningQuantity > 0) {
            throw ErrorSilent::createWithBody(
                'Warehouse item quantity is less than 0',
                ErrorBody::create()->withMessageTranslation('notEnoughQuantity', Warehouse::ENTITY_TYPE, [
                    'productName' => $item->get('productName'),
                    'quantityRequested' => $item->getQuantity(),
                    'quantityAvailable' => $item->getQuantity() - $runningQuantity,
                ])->encode()
            );
        }

        return $result;
    }

    protected function getClonedItem(WarehouseItem $warehouseItem): WarehouseItem
    {
        /** @var WarehouseItem $item */
        $item = $this->entityManager->getNewEntity(WarehouseItem::ENTITY_TYPE);

        foreach ($this->attributeMap as $warehouseName => $itemName) {
            $item->set($itemName, $warehouseItem->get($warehouseName));
        }

        return $item;
    }
}
