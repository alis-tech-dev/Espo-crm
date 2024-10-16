<?php
require dirname(__DIR__) . '/bootstrap.php';

use PhpOffice\PhpSpreadsheet\IOFactory;
use Espo\Core\Application as App;
use Espo\Core\ORM\EntityManager;

$app = new App();
$app->setupSystemUser();

/** @var EntityManager */
$entityManager = $app->getContainer()->get('entityManager');

$xlsFile = __DIR__ . '/data/own/pricelistLast.xlsx';

if (!file_exists($xlsFile)) {
    die("File not found.\n");
}

$xlsReader = IOFactory::createReader("Xlsx");

$xlsReader->setLoadSheetsOnly(['Products', 'Components']);

$xlsReader->setReadDataOnly(true);

$spreadsheet = $xlsReader->load($xlsFile);

wipe_all(
    "product",
    "production_model",
    "production_model_item",
    "quote", "quote_item",
    "sales_order",
    "sales_order_item",
    "production_order",
    "product_database",
    "warehouse",
    "warehouse_item",
    "work_performed",
    "goods_issue",
    "goods_receipt",
    "supplier_order",
    "supplier_order_item",
    "wiso"

);

echo "Wiped all... \n";

$ranges = [
    [2, 418]
];

$components = $spreadsheet->getSheet(1);
$data = $components->toArray();

foreach ($data as $i => $row) {
    $inRange = false;

    foreach ($ranges as $range) {
        if ($i >= ($range[0] - 1) && $i <= ($range[1] - 1)) {
            $inRange = true;
            break;
        }
    }

    if (!$inRange || str_contains($row[1], "set")) {
        continue;
    }

    $minimumStockQuantity = is_numeric($row[12]) ? (int)$row[12] : 10;

    $component = $entityManager->getRDBRepository('Product')->where('name', $row[0])->findOne();

    if (!$component) {
        $item = $entityManager->createEntity('Product', [
            'name' => $row[0],
            'alisId' => $row[2],
            'unit' => $row[1],
//            'pricingType' => 'Profit Margin',
//            'costPrice' => 0.0,
            'minimumStockQuantity' => $minimumStockQuantity,
            'categoryId' => '66d9613bcdae9bee8'
        ], ['skipPriceCalculation' => true]);

        $entityManager->createEntity('Warehouse', [
            'name' => $row[0],
            'category' => 'Component',
            'quantity' => 0,
            'type' => 'Simple',
            'availableQuantity' => 0,
            'productId' => $item->getId(),
        ]);
    }
}
$productionModelIds = [];

$products = $spreadsheet->getSheet(0);

foreach ($products->toArray() as $i => $row) {
    $productName = trim($row[0]);

    if (empty($productName) || str_starts_with($productName, "CELKEM")) {
        continue;
    }

    $product = $entityManager
        ->getRDBRepository('Product')
        ->where('name', $productName)
        ->findOne();

    $productAlis = $entityManager
        ->getRDBRepository('Product')
        ->where('alisId', $productName)
        ->findOne();




    if (str_starts_with($productName, "ALIS") && $productAlis) {
        echo "Processing ALIS product: $productName\n";

        $itemId = $productAlis->getId();
        $itemParentId = $productionModelIds[count($productionModelIds) - 1];

        $warehouseItem = $entityManager
            ->getRDBRepository('Warehouse')
            ->where('name', $row[1])
            ->findOne();
        $warehouseItemId = $warehouseItem->getId();

        $productionModelItem = $entityManager->createEntity('ProductionModelItem', [
            'productId' => $itemId,
            'parentId' => $itemParentId,
            'parentType' => 'ProductionModel',
            'quantity' => $row[3],
            'name' => $row[1],
            'warehouseId' => $warehouseItemId
        ]);

//         $productAlis->set('costPrice', $row[2]);
//
//         echo "productAlis costPrice changed. \n";
//
//         $entityManager->saveEntity($productAlis, ['skipPriceCalculation' => true]);
//
//         echo "Updated product cost and added to ProductionModelItem.\n";
    } else if (!$product && !str_starts_with($productName, "ALIS")) {
        echo "Creating new product: $productName\n";

        $product = $entityManager->createEntity('Product', [
            'name' => $row[0],
            'pricingType' => 'No Price',
            'costPrice' => 0.0,
            'isModel' => 1,
            'unit' => $row[5]
        ], ['skipPriceCalculation' => true]);

        $entityManager->createEntity('Warehouse', [
            'name' => $row[0],
            'category' => 'Product',
            'quantity' => 0,
            'type' => 'Simple',
            'availableQuantity' => 0,
            'productId' => $product->getId(),
        ]);


        $productionModel = $entityManager->createEntity('ProductionModel', [
            'name' => $row[0],
            'quantity' => 1,
            'productId' => $product->getId()
        ], ['skipPriceCalculation' => true]);

        $productionModelIds[] = $productionModel->getId();
    } else {
        echo "$productName already exists. Skipping creation.\n";
    }
}

function wipe_all(...$entities): void
{
    /** @var EntityManager */
    global $entityManager;

    foreach ($entities as $entity) {
        $entityManager->getSqlExecutor()->execute("DELETE from ${entity}");
    }
}
































// $oneColumnSheets = [0];
//
// foreach ($oneColumnSheets as $sheetIndex) {
//     try {
//         $sheetArray = $spreadsheet->getSheet($sheetIndex)->toArray();
//         echo "sheetArray: $sheetArray[0] \n";
//     } catch (Exception $e) {
//         echo 'Ending: ' . $e->getMessage() . PHP_EOL;
//         break;
//     }
//
//     echo "Sheet #${sheetIndex} named " . $spreadsheet->getSheet($sheetIndex)->getTitle() . PHP_EOL;
//
//     $i = 0;
//
//     $entityManager->getTransactionManager()->run(function () use ($entityManager, $i, $sheetArray) {
//         while (true) {
//             $name = $sheetArray[$i][0];
//
//             if (empty($name)) {
//                 break;
//             }
//
//             //echo 'Product name: ' . $name . PHP_EOL;
//
//             $product = $entityManager->getRDBRepository('Product')->where([
//                 'name' => $name
//             ])->findOne();
//
//             if (!$product) {
//                 $product = $entityManager->createEntity('Product', [
//                     'name' => $name,
//                     'pricingType' => 'Profit Margin',
//                     'costPrice' => 0.0,
//                 ], ['skipPriceCalculation' => true]);
//             }
//
//             $i += 2;
//
//             $productionModel = $entityManager->createEntity('ProductionModel', [
//                 'name' => $name,
//             ]);
//
//             $entityManager
//                 ->getRDBRepository('Product')
//                 ->getRelation($product, 'productionModels')
//                 ->relate($productionModel);
//
//             $product->set('defaultProductionModelId', $productionModel->getId());
//
//             $entityManager->saveEntity($product, ['skipPriceCalculation' => true]);
//
//             while (($alisId = $sheetArray[$i][0]) !== 'CELKEM (EUR)') {
//                 if ($i > 600) {
//                     break 2;
//                 }
//
//                 if (empty($alisId)) {
//                     goto next;
//                 }
//
//                 $componentProduct = $entityManager
//                     ->getRDBRepository('Product')
//                     ->where([
//                         'name' => $sheetArray[$i][1],
//                     ])->findOne();
//
//                 if (!$componentProduct) {
//                     $componentProduct = $entityManager->createEntity('Product', [
//                         'name' => $sheetArray[$i][1],
//                         'alisId' => $alisId,
//                         'pricingType' => 'Profit Margin',
//                         'costPrice' => 0.0,
//                     ], ['skipPriceCalculation' => true]);
//                 }
//
//                 //echo "Component on line ${i}: " . $componentProduct->get('name') . " with alisId: ${alisId}" . PHP_EOL;
//
//                 $entityManager->createEntity('ProductionModelItem', [
//                     'productId' => $componentProduct->getId(),
//                     'quantity' => $sheetArray[$i][2],
//                     'parentId' => $productionModel->getId(),
//                     'parentType' => 'ProductionModel'
//                 ]);
//
//                 next:
//                 $i++;
//             }
//
//             $i += 1;
//
//             while (array_key_exists($i, $sheetArray) && empty($sheetArray[$i][0])) {
//                 $i++;
//             }
//         }
//     });
// }

// $multipleSheets = [/* 10, */6];
//
// foreach ($multipleSheets as $sheetIndex) {
//     try {
//         $sheetArray = $spreadsheet->getSheet($sheetIndex)->toArray();
//     } catch (Exception $e) {
//         echo 'Ending: ' . $e->getMessage() . PHP_EOL;
//         break;
//     }
//
//     echo "Sheet #${sheetIndex} named " . $spreadsheet->getSheet($sheetIndex)->getTitle() . PHP_EOL;
//
//     $entityManager->getTransactionManager()->run(function () use ($entityManager, $i, $sheetArray) {
//         $columns = [0, 5, 10, 15, 20];
//
//         $i = 0;
//
//         foreach ($columns as $_ => $columnIndex) {
//             do {
//
//                 $productName = $sheetArray[$i][$columnIndex];
//
//                 //echo $productName . PHP_EOL;
//
//                 if (empty($productName)) {
//                     break;
//                 }
//
//                 $product = $entityManager->getRDBRepository('Product')->where([
//                     'name' => $productName
//                 ])->findOne();
//
//                 if (!$product) {
//                     $product = $entityManager->createEntity('Product', [
//                         'name' => $productName,
//                         'pricingType' => 'Profit Margin',
//                         'costPrice' => 0.0,
//                     ], ['skipPriceCalculation' => true]);
//                 }
//
//                 $productionModel = $entityManager->createEntity('ProductionModel', [
//                     'name' => $productName,
//                 ]);
//
//                 $entityManager
//                     ->getRDBRepository('Product')
//                     ->getRelation($product, 'productionModels')
//                     ->relate($productionModel);
//
//                 $product->set('defaultProductionModelId', $productionModel->getId());
//
//                 $entityManager->saveEntity($product, ['skipPriceCalculation' => true]);
//
//                 $i += 2;
//
//                 while (true) {
//                     $alisId = $sheetArray[$i][$columnIndex];
//
//                     if ($alisId === 'CELKEM (EUR)') {
//                         break;
//                     }
//
//                     $componentName =  $sheetArray[$i][$columnIndex + 1];
//
//                     if (empty($componentName)) {
//                         break;
//                     }
//
//                     //echo "Component on line ${i}: " . $sheetArray[$i][$columnIndex + 1] . " with alisId: ${alisId}" . PHP_EOL;
//
//                     $componentProduct = $entityManager
//                         ->getRDBRepository('Product')
//                         ->where([
//                             'alisId' => $alisId,
//                         ])->findOne();
//
//                     if (!$componentProduct) {
//                         $componentProduct = $entityManager->createEntity('Product', [
//                             'name' => $componentName,
//                             'alisId' => $alisId,
//                             'costPrice' => 0.0,
//                             'pricingType' => 'Profit Margin'
//                         ], ['skipPriceCalculation' => true]);
//                     }
//
//                     $entityManager->createEntity('ProductionModelItem', [
//                         'productId' => $componentProduct->getId(),
//                         'quantity' => $sheetArray[$i][$columnIndex + 2],
//                         'parentId' => $productionModel->getId(),
//                         'parentType' => 'ProductionModel'
//                     ]);
//
//                     $i++;
//                 }
//
//                 $i += 2;
//             } while ($i < 279);
//
//             $i = 0;
//         }
//     });
// }
//
// $prices = $spreadsheet->getSheet(0);
//
// $ranges = [
//     [2, 67],
//     [69, 210],
//     [213, 229],
// ];
//
// foreach ($prices->toArray() as $i => $row) {
//     $inRange = false;
//
//     foreach ($ranges as $range) {
//         if ($i >= ($range[0] - 1) && $i <= ($range[1] - 1)) {
//             $inRange = true;
//             break;
//         }
//     }
//
//     if (!$inRange) {
//         continue;
//     }
//
//     $productName = $row[0];
//
//     $product = $entityManager
//         ->getRDBRepository('Product')
//         ->where('name', $productName)
//         ->findOne();
//
//     if (!$product) {
//         echo 'Creating product: ' . $productName . PHP_EOL;
//
//         $product = $entityManager->createEntity('Product', [
//             'name' => $productName,
//             'costPrice' => $row[1] ?? 0.0,
//             'priceMargin' => $row[2] * 100,
//             'salesPrice' => $row[3],
//             'pricingType' => 'Profit Margin'
//         ], ['skipPriceCalculation' => true]);
//     } else {
//         $product->set([
//             'costPrice' => $row[1] ?? 0.0,
//             'priceMargin' => $row[2],
//             'salesPrice' => $row[3],
//             'pricingType' => 'Profit Margin'
//         ]);
//
//         $entityManager->saveEntity($product, ['skipPriceCalculation' => true]);
//     }
// }
//


