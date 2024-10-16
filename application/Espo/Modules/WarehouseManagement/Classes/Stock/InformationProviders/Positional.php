<?php

namespace Espo\Modules\WarehouseManagement\Classes\Stock\InformationProviders;

use Espo\Modules\WarehouseManagement\Tools\Stock\InformationProvider\DefaultStockInformationProvider;

class Positional extends DefaultStockInformationProvider
{
    /**
     * @inheritDoc
     */
    public function getItemAttributeMappingForAdd(): array
    {
        $map = parent::getItemAttributeMappingForAdd();
        $map['positionId'] = 'positionToId';

        return $map;
    }

    /**
     * @inheritDoc
     */
    public function getItemAttributeMappingForRemove(): array
    {
        $map = parent::getItemAttributeMappingForRemove();
        $map['positionId'] = 'positionFromId';

        return $map;
    }
}
