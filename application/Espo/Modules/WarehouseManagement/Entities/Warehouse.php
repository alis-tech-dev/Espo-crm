<?php

namespace Espo\Modules\WarehouseManagement\Entities;

class Warehouse extends \Espo\Core\Templates\Entities\Base
{
    public const ENTITY_TYPE = 'Warehouse';

    protected $entityType = 'Warehouse';

    public function getType(): ?string
    {
        return $this->get('type');
    }

    public function getName(): ?string
    {
        return $this->get('name');
    }

}
