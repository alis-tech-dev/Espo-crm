<?php

namespace Espo\Modules\WarehouseManagement\Entities;

class GoodsIssue extends \Espo\Core\Templates\Entities\Base
{
    public const ENTITY_TYPE = 'GoodsIssue';

    public const STATUS_DRAFT = 'Draft';
    public const STATUS_RESERVING = 'Reserving';
    public const STATUS_RESERVED = 'Reserved';
    public const STATUS_PROCESSING = 'Processing';
    public const STATUS_ISSUED = 'Issued';
    public const STATUS_CANCELED = 'Canceled';

    public function getStatus(): ?string
    {
        return $this->get('status');
    }

    public function getPreviousStatus(): ?string
    {
        return $this->getFetched('status');
    }
}
