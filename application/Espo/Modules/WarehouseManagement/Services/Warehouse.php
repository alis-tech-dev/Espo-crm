<?php

namespace Espo\Modules\WarehouseManagement\Services;

class Warehouse extends \Espo\Core\Templates\Services\Base
{
    protected $mandatorySelectAttributeList = ['type']; //always select because of frontend
}
