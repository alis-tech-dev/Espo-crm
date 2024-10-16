<?php

namespace Espo\Modules\WarehouseManagement\Entities;

class GoodsReceipt extends \Espo\Core\Templates\Entities\Base
{
    public const ENTITY_TYPE = 'GoodsReceipt';


    public const STATUS_DRAFT = 'Draft';
    public const STATUS_PROCESSING = 'Processing';
    public const STATUS_RECEIVED = 'Received';
    public const STATUS_CANCELED = 'Canceled';

    public function getStatus(): ?string
    {
        return $this->get('status');
    }
}
