<?php

namespace Espo\Modules\WarehouseManagement\Entities;

class WarehouseTransfer extends \Espo\Core\Templates\Entities\Base
{
    public const ENTITY_TYPE = 'WarehouseTransfer';

    protected $entityType = 'WarehouseTransfer';

    public const STATUS_DRAFT = 'Draft';
    public const STATUS_PROCESSING = 'Processing';
    public const STATUS_TRANSFERRED = 'Transferred';
    public const STATUS_CANCELED = 'Canceled';

    public function getStatus(): ?string
    {
        return $this->get('status');
    }
}
