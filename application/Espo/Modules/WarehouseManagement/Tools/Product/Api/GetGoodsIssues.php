<?php

namespace Espo\Modules\WarehouseManagement\Tools\Product\Api;

use Espo\Modules\WarehouseManagement\Entities\GoodsIssue;

class GetGoodsIssues extends GetGoodsReceipts
{
    protected const SCOPE = GoodsIssue::ENTITY_TYPE;
    protected const LINK = 'selectedItems';
}
