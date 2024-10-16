<?php

namespace Espo\Modules\WarehouseManagement\Tools\Stock\Manager;

use Espo\Core\Exceptions\{
    Error,
    Error\Body as ErrorBody,
    ErrorSilent};
use Espo\Modules\ProductBase\Entities\Product;
use Espo\Modules\WarehouseManagement\Entities\{
    Warehouse,
    WarehouseItem};
use Espo\Modules\WarehouseManagement\Services\WarehouseItem as WarehouseItemService;
use Espo\Modules\WarehouseManagement\Tools\Stock\Hook\HookMediator;
use Espo\Modules\WarehouseManagement\Tools\Stock\InformationProvider\StockInformationProvider;
use Espo\Modules\WarehouseManagement\Tools\Stock\StockHelper;
use Espo\ORM\EntityManager;

class DefaultStockManager extends StockManager
{
    protected const DIRECTION_ADD = 'add';
    protected const DIRECTION_REMOVE = 'remove';

    private ?Product $cachedProduct = null;

    public function __construct(
        private readonly StockHelper $stockHelper,
        private readonly WarehouseItemService $warehouseItemService,
        private readonly EntityManager $entityManager,
        private readonly HookMediator $hookMediator,
        Warehouse $warehouse,
        StockInformationProvider $informationProvider,
    ) {
        parent::__construct($warehouse, $informationProvider);
    }

    /**
     * @inheritDoc
     */
    public function addStock(WarehouseItem $item, array $options = []): void
    {
        $this->clearCachedProduct();

        $this->hookMediator->beforeAddStock($this->warehouse, $item, $options);

        $warehouseItem = $this->getOrCreateWarehouseItem($item, self::DIRECTION_ADD);
        $warehouseItem->addQuantity($item->getQuantity());

        $this->entityManager->saveEntity($warehouseItem, [
            self::TRIGGERED_BY_STOCK_MANAGER => true,
        ]);

        $product = $this->getProduct($item);

        $this->hookMediator->afterAddStock($this->warehouse, $item, $options);
        $this->hookMediator->afterStocked($product, $this->warehouse, $item, $options);
    }

    /**
     * @inheritDoc
     */
    public function removeStock(WarehouseItem $item, array $options = []): void
    {
        $this->clearCachedProduct();

        $this->hookMediator->beforeRemoveStock($this->warehouse, $item, $options);

        $warehouseItem = $this->getOrCreateWarehouseItem($item, self::DIRECTION_REMOVE);

        $this->warehouseItemService->loadWarehouseQuantities($warehouseItem);

        $requestedQuantity = $item->getQuantity();
        $availableQuantity = $warehouseItem->getAvailableQuantity();

        if ($requestedQuantity > $availableQuantity) {
            throw ErrorSilent::createWithBody(
                'Not enough quantity',
                ErrorBody::create()->withMessageTranslation('notEnoughQuantity', Warehouse::ENTITY_TYPE, [
                    'productName' => $item->get('productName'),
                    'quantityRequested' => $requestedQuantity,
                    'quantityAvailable' => $availableQuantity,
                ])->encode()
            );
        }

        $warehouseItem->removeQuantity($requestedQuantity);

        $saveOptions = [self::TRIGGERED_BY_STOCK_MANAGER => true];

        // newQuantity is guaranteed to be a float, because of `round` return type
        if ($warehouseItem->getQuantity() === 0.0) {
            if (!$warehouseItem->isNew()) {
                $this->entityManager->removeEntity($warehouseItem, $saveOptions);
            }
        } else {
            $this->entityManager->saveEntity($warehouseItem, $saveOptions);
        }

        $product = $this->getProduct($item);

        $this->hookMediator->afterRemoveStock($this->warehouse, $item, $options);
        $this->hookMediator->afterUnstocked($product, $this->warehouse, $item, $options);
    }

    /**
     * @throws Error
     */
    protected function checkItemValidity(WarehouseItem $item, string $direction): void
    {
        $product = $this->getProduct($item);

        if (!$product) {
            throw ErrorSilent::createWithBody(
                'Missing product',
                ErrorBody::create()
                    ->withMessageTranslation('itemHasMissingProduct', Warehouse::ENTITY_TYPE)
                    ->encode()
            );
        }

        assert($product instanceof Product);

        if (!$this->stockHelper->isProductStockable($product)) {
            throw ErrorSilent::createWithBody(
                'Product is not stockable',
                ErrorBody::create()
                    ->withMessageTranslation('productIsNotStockable', Warehouse::ENTITY_TYPE, [
                        'productName' => $product->get('name'),
                        'type' => $product->getType(),
                    ])
                    ->encode()
            );
        }
    }

    /**
     * @throws Error
     */
    private function getOrCreateWarehouseItem(WarehouseItem $item, string $direction): WarehouseItem
    {
        $this->checkItemValidity($item, $direction);

        $query = match ($direction) {
            self::DIRECTION_ADD => $this->informationProvider->getItemIdentificationQueryForAdd($item),
            self::DIRECTION_REMOVE => $this->informationProvider->getItemIdentificationQueryForRemove($item),
        };

        /** @var ?WarehouseItem $warehouseItem */
        $warehouseItem = $this->entityManager
            ->getRDBRepository(Warehouse::ENTITY_TYPE)
            ->getRelation($this->warehouse, 'items')
            ->clone($query)
            ->findOne();

        if ($warehouseItem) {
            return $warehouseItem;
        }

        /** @var WarehouseItem $warehouseItem */
        $warehouseItem = $this->entityManager->getNewEntity(WarehouseItem::ENTITY_TYPE);

        $data = match ($direction) {
            self::DIRECTION_ADD => $this->informationProvider->getItemIdentificationDataForAdd($item),
            self::DIRECTION_REMOVE => $this->informationProvider->getItemIdentificationQueryForRemove($item),
        };

        $warehouseItem->set($data);
        $warehouseItem->set([
            'parentType' => Warehouse::ENTITY_TYPE,
            'parentId' => $this->warehouse->getId(),
            'quantity' => 0,
        ]);

        return $warehouseItem;
    }

    private function clearCachedProduct(): void
    {
        $this->cachedProduct = null;
    }

    private function getProduct(WarehouseItem $item): ?Product
    {
        if ($this->cachedProduct) {
            return $this->cachedProduct;
        }

        $productId = $item->get('productId');

        if (!$productId) {
            return null;
        }

        /** @var ?Product $product */
        $product = $this->entityManager->getEntityById(Product::ENTITY_TYPE, $productId);

        if (!$product) {
            return null;
        }

        $this->cachedProduct = $product;

        return $product;
    }
}
