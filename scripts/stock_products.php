<?php

require __DIR__ . '/../bootstrap.php';

use Espo\Core\Application;
use Espo\Custom\Entities\Warehouse;
use Espo\Modules\ProductBase\Entities\Product;
use Espo\Modules\WarehouseManagement\Entities\GoodsReceipt;
use Espo\Modules\WarehouseManagement\Entities\WarehouseItem;
use Espo\Modules\WarehouseManagement\Entities\WarehousePosition;

$app = new Application();
$app->setupSystemUser();

const BRNO_WAREHOUSE_ID = '650067377ec266179';
const PROSTEJOV_WAREHOUSE_ID = '65006dec0dfcb5f11';

const BRNO_PREFIXES = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J'];
const PROSTEJOV_PREFIXES = ['M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V'];

const FILE_PATH = __DIR__ . '/export-components.json';
/** @var \Espo\ORM\EntityManager $entityManager */
$entityManager = $app->getContainer()->get('entityManager');
$data = json_decode(file_get_contents(FILE_PATH), true);

$stock_items = (object) array_filter($data, function ($item) {
    return $item['sklad'] > 0;
});

$goodsReceiptBrno = $entityManager->createEntity(GoodsReceipt::ENTITY_TYPE,[
    'name' => 'Brno',
    'warehouseType' => 'Positional',
    'warehouseId' => BRNO_WAREHOUSE_ID,
]);

$goodsReceiptProstejov = $entityManager->createEntity(GoodsReceipt::ENTITY_TYPE,[
    'name' => 'Prostejov',
    'warehouseType' => 'Positional',
    'warehouseId' => PROSTEJOV_WAREHOUSE_ID,
]);
foreach ($data as $stock_item){

    if ($stock_item['id'] !== "" && $stock_item['id'] !== null){
        $product = $entityManager
            ->getRDBRepository(Product::ENTITY_TYPE)
            ->where('alisId', $stock_item['id'])
            ->findOne();
    }else{
        $product = $entityManager
            ->getRDBRepository(Product::ENTITY_TYPE)
            ->where('name', $stock_item['nazev'])
            ->findOne();
    }

    if (!$product) {
        echo "Product not found: " . $stock_item['nazev'] . "\n";
        continue;
    }
    $product->set('minimumStockQuantity', $stock_item['min']);
    $entityManager->saveEntity($product);

}
foreach ($stock_items as $stock_item){
    $warehouseId = in_array($stock_item['regal'],BRNO_PREFIXES) ? BRNO_WAREHOUSE_ID : PROSTEJOV_WAREHOUSE_ID;
    $goodsReceiptId = in_array($stock_item['regal'],BRNO_PREFIXES) ? $goodsReceiptBrno->getId() : $goodsReceiptProstejov->getId();
    
    $wearhousePosition = $stock_item['regal'] . $stock_item['patro'];
    if (strlen($wearhousePosition) != 2){
        echo "Warehouse position not found: " . $wearhousePosition ." Product name ".$stock_item['nazev']. "\n";
        $wearhousePosition = "IMAGINARNI";
        $goodsReceiptId = $goodsReceiptProstejov->getId();
    }
    if ($stock_item['id'] !== "" && $stock_item['id'] !== null){
        $product = $entityManager
            ->getRDBRepository(Product::ENTITY_TYPE)
            ->where('alisId', $stock_item['id'])
            ->findOne();
    }else{
        $product = $entityManager
            ->getRDBRepository(Product::ENTITY_TYPE)
            ->where('name', $stock_item['nazev'])
            ->findOne();
    }

    if (!$product) {
        echo "Product not found: " . $stock_item['nazev'] . "\n";
        continue;
    }

    $wearhousePositionEntity = $entityManager
        ->getRDBRepository(WarehousePosition::ENTITY_TYPE)
        ->where('name', $wearhousePosition)
        ->findOne();
    if (!$wearhousePositionEntity) {
        echo "Warehouse position not found: " . $wearhousePosition ." Product name".$stock_item['nazev']. "\n";
        $wearhousePosition = "IMAGINARNI";
        $goodsReceiptId = $goodsReceiptProstejov->getId();
    }

    $goodsReceiptItem = $entityManager->createEntity(WarehouseItem::ENTITY_TYPE,[
        'quantity' => $stock_item['sklad'],
        'price' => 0,
        'priceCurrency' => "CZK",
        'parentType'=> "GoodsReceipt",
        'parentId'=> $goodsReceiptId, 
        'productId' => $product->getId(),
        'positionToId' => $wearhousePositionEntity->getId(),
    ]);
}