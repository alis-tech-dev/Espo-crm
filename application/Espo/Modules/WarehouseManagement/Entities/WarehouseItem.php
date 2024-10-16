<?php

namespace Espo\Modules\WarehouseManagement\Entities;

class WarehouseItem extends \Espo\Core\Templates\Entities\Base
{
    public const ENTITY_TYPE = 'WarehouseItem';
    private const ROUND_PRECISION = 3;

    public function isWarehouseItem(): bool
    {
        return $this->get('parentType') === Warehouse::ENTITY_TYPE;
    }

    public function getQuantity(): float
    {
        return $this->get('quantity');
    }

    public function getAvailableQuantity(): float
    {
        if (!$this->isWarehouseItem()) {
            throw new \RuntimeException('Available quantity is not available for non-warehouse items');
        }

        $quantityAvailable = $this->get('quantityAvailable');

        if ($quantityAvailable === null) {
            throw new \RuntimeException('Available quantity is not loaded');
        }

        return $quantityAvailable;
    }

    public function setQuantity(float $quantity): void
    {
        $this->set('quantity', $this->round($quantity));
    }

    public function addQuantity(float $quantity): void
    {
        $this->setQuantity($this->getQuantity() + $quantity);
    }

    public function removeQuantity(float $quantity): void
    {
        $this->setQuantity($this->getQuantity() - $quantity);
    }

    private function round(float $value): float
    {
        return round($value, self::ROUND_PRECISION);
    }
}
