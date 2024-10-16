<?php

namespace Espo\Modules\WarehouseManagement\Services;

class Product extends \Espo\Core\Templates\Services\Base
{
    protected $mandatorySelectAttributeList = ['defaultWarehousePositionId']; //always select because of frontend
}
