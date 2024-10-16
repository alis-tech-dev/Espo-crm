<?php

namespace Espo\Modules\WarehouseManagement\Tools\Stock\Hook;

use Espo\Core\HookManager;
use Espo\Modules\ProductBase\Entities\Product;
use Espo\Modules\WarehouseManagement\Entities\Warehouse;
use Espo\Modules\WarehouseManagement\Entities\WarehouseItem;

class HookMediator
{
    public function __construct(
        private readonly HookManager $hookManager,
    ) {
    }

    /**
     * @param Warehouse     $warehouse Warehouse where stock is added
     * @param WarehouseItem $item      Item to add
     * @param array         $options   Additional options
     *
     * @return void
     */
    public function beforeAddStock(Warehouse $warehouse, WarehouseItem $item, array $options = []): void
    {
        if (!empty($options[HookOptions::SILENT])) {
            return;
        }

        $this->hookManager->process(
            Warehouse::ENTITY_TYPE,
            'beforeAddStock',
            $warehouse,
            $options,
            [
                HookData::ITEM => $item,
            ]
        );
    }

    /**
     * @param Warehouse     $warehouse Warehouse where stock is added
     * @param WarehouseItem $item      Added item
     * @param array         $options   Additional options
     *
     * @return void
     */
    public function afterAddStock(Warehouse $warehouse, WarehouseItem $item, array $options = []): void
    {
        if (!empty($options[HookOptions::SILENT])) {
            return;
        }

        $this->hookManager->process(
            Warehouse::ENTITY_TYPE,
            'afterAddStock',
            $warehouse,
            $options,
            [
                HookData::ITEM => $item,
            ]
        );
    }

    /**
     * @param Warehouse     $warehouse Warehouse where stock is removed
     * @param WarehouseItem $item      Item to remove
     * @param array         $options   Additional options
     *
     * @return void
     */
    public function beforeRemoveStock(Warehouse $warehouse, WarehouseItem $item, array $options = []): void
    {
        if (!empty($options[HookOptions::SILENT])) {
            return;
        }

        $this->hookManager->process(
            Warehouse::ENTITY_TYPE,
            'beforeRemoveStock',
            $warehouse,
            $options,
            [
                HookData::ITEM => $item,
            ]
        );
    }

    /**
     * @param Warehouse     $warehouse Warehouse where stock is removed
     * @param WarehouseItem $item      Removed item
     * @param array         $options   Additional options
     *
     * @return void
     */
    public function afterRemoveStock(Warehouse $warehouse, WarehouseItem $item, array $options = []): void
    {
        if (!empty($options[HookOptions::SILENT])) {
            return;
        }

        $this->hookManager->process(
            Warehouse::ENTITY_TYPE,
            'afterRemoveStock',
            $warehouse,
            $options,
            [
                HookData::ITEM => $item,
            ]
        );
    }

    /**
     * @param Product       $product   Product that is stocked
     * @param Warehouse     $warehouse Warehouse where stock is added
     * @param WarehouseItem $item      Added item
     * @param array         $options   Additional options
     *
     * @return void
     */
    public function afterStocked(Product $product, Warehouse $warehouse, WarehouseItem $item, array $options = []): void
    {
        if (!empty($options[HookOptions::SILENT])) {
            return;
        }

        $this->hookManager->process(
            Product::ENTITY_TYPE,
            'afterStocked',
            $product,
            $options,
            [
                HookData::WAREHOUSE => $warehouse,
                HookData::ITEM => $item,
            ]
        );
    }

    /**
     * @param Product       $product   Product that is unstocked
     * @param Warehouse     $warehouse Warehouse where stock is removed
     * @param WarehouseItem $item      Removed item
     * @param array         $options   Additional options
     *
     * @return void
     */
    public function afterUnstocked(Product $product, Warehouse $warehouse, WarehouseItem $item, array $options = []): void
    {
        if (!empty($options[HookOptions::SILENT])) {
            return;
        }

        $this->hookManager->process(
            Product::ENTITY_TYPE,
            'afterUnstocked',
            $product,
            $options,
            [
                HookData::WAREHOUSE => $warehouse,
                HookData::ITEM => $item,
            ]
        );
    }
}
