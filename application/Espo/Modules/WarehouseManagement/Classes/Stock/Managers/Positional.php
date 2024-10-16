<?php

namespace Espo\Modules\WarehouseManagement\Classes\Stock\Managers;

use Espo\Core\Di;
use Espo\Core\Exceptions\{
    Error,
    Error\Body as ErrorBody,
    ErrorSilent
};
use Espo\Modules\WarehouseManagement\Entities\{
    Warehouse,
    WarehouseItem,
    WarehousePosition
};
use Espo\Modules\WarehouseManagement\Tools\Stock\Manager\DefaultStockManager;

class Positional extends DefaultStockManager implements Di\EntityManagerAware, Di\RecordServiceContainerAware
{
    use Di\EntityManagerSetter;
    use Di\RecordServiceContainerSetter;

    private function findPosition(WarehouseItem $item, string $direction): ?WarehousePosition
    {
        $relationName = match ($direction) {
            self::DIRECTION_ADD => 'positionTo',
            self::DIRECTION_REMOVE => 'positionFrom',
            default => 'position',
        };

        $id = $item->get($relationName . 'Id');

        if (!$id) {
            return null;
        }

        /// Use service to load the entity so the loaders are ran
        /** @var ?WarehousePosition */
        return $this->recordServiceContainer
            ->get('WarehousePosition')
            ->getEntity($id);
    }

    /**
     * @throws Error
     */
    protected function checkItemValidity(WarehouseItem $item, string $direction): void
    {
        parent::checkItemValidity($item, $direction);

        $position = $this->findPosition($item, $direction);

        if (!$position) {
            throw ErrorSilent::createWithBody(
                'Missing position',
                ErrorBody::create()
                    ->withMessageTranslation('itemHasMissingPosition', Warehouse::ENTITY_TYPE)
                    ->encode()
            );
        }

        if ($position->get('warehouseId') !== $this->warehouse->getId()) {
            throw ErrorSilent::createWithBody(
                'Position is not in the warehouse',
                ErrorBody::create()
                    ->withMessageTranslation('itemHasPositionNotInWarehouse', Warehouse::ENTITY_TYPE, [
                        'productName' => $item->get('productName'),
                        'positionName' => $position->get('name'),
                        'warehouseName' => $this->warehouse->get('name'),
                    ])
                    ->encode()
            );
        }

        if ($position->get('capacity') !== null) {
            if ($position->get('filledCapacity') + $item->get('quantity') > $position->get('capacity')) {
                throw ErrorSilent::createWithBody(
                    'Not enough room in position',
                    ErrorBody::create()
                        ->withMessageTranslation('notEnoughRoomInPosition', Warehouse::ENTITY_TYPE, [
                            'positionName' => $position->get('name'),
                            'positionCapacity' => number_format($position->get('capacity'), 2),
                            'positionFilledCapacity' => number_format($position->get('filledCapacity'), 2),
                            'productName' => $item->get('productName'),
                            'quantity' => number_format($item->get('quantity'), 2),
                        ])
                        ->encode()
                );
            }
        }
    }
}
