<?php

namespace Espo\Modules\WarehouseManagement\Hooks\SupplierOrder;

use Espo\Core\Hook\Hook\BeforeSave;
use Espo\Core\ORM\EntityManager;
use Espo\Core\Record\CreateParams;
use Espo\Core\Record\ServiceContainer;
use Espo\ORM\Entity;
use Espo\ORM\Repository\Option\SaveOptions;

class CreateGoodsIssue implements BeforeSave
{
    public function __construct(
        private readonly EntityManager $entityManager,
        private readonly ServiceContainer $serviceContainer
    ) {
    }

    public function beforeSave(Entity $entity, SaveOptions $options): void
    {
//        if ($entity->get('status') == 'Delivered' && $entity->getFetched('status') !== 'Delivered') {
//            $recordList = array_map(fn ($item) => (object)[
//                'productId' => $item->productId,
//                'productName' => $item->productName,
//                'name' => $item->productName,
//                'quantity' => $item->quantity,
//            ], $entity->get('itemsRecordList') ?? []);
//
//            $goodsReceipt = $this->serviceContainer->get('GoodsReceipt')->create((object)[
//                'itemsRecordList' => $recordList,
//                'parentId' => $entity->getId(),
//                'parentType' => 'SupplierOrder',
//                'warehouseId' => '654d9a13badfff424',
//                'name' => 'Příjemka k objednávce u dodavatele ' . $entity->get('accountName')
//            ], CreateParams::create());
//
//            $entity->set('goodsReceiptId', $goodsReceipt->getId());
//        }
    }
}
