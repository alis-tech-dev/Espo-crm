<?php
require dirname(__DIR__) . '/bootstrap.php';

use PhpOffice\PhpSpreadsheet\IOFactory;
use Espo\Core\Application as App;
use Espo\Core\ORM\EntityManager;

$app = new App();

$app->setupSystemUser();

/** @var EntityManager */
$entityManager = $app->getContainer()->get('entityManager');

$xlsReader = IOFactory::createReader("Xlsx");

$xlsReader->setLoadSheetsOnly(['Price list - internal', 'Components', 'Wrists', 'Vehicle Tags', 'Readers', 'Control Units', /*'Projectors',*/ 'Projectors Line', 'Lights', 'Sensors', 'Accessories', 'Safety Bar', 'Mirrors']);
$xlsReader->setReadDataOnly(true);

$spreadsheet = $xlsReader->load(__DIR__ . '/data/pricelist2024.xlsx');

wipe_all("product", "production_model", "production_model_item");

$ranges = [
    [2, 282],
    [289, 316]
];

$components = $spreadsheet->getSheet(1);

foreach ($components->toArray() as $i => $row) {
    $inRange = false;

    foreach ($ranges as $range) {
        if ($i >= ($range[0] - 1) && $i <= ($range[1] - 1)) {
            $inRange = true;
            break;
        }
    }

    if (!$inRange) {
        continue;
    }

    $entityManager->createEntity('Product', [
        'name' => $row[0],
        'alisId' => $row[1],
        'pricingType' => 'Profit Margin',
        'costPrice' => 0.0,
    ], ['skipPriceCalculation' => true]);
}

$oneColumnSheets = [2, 3, 4, 5, 7, 8, 9, 10, 11];

foreach ($oneColumnSheets as $sheetIndex) {
    try {
        $sheetArray = $spreadsheet->getSheet($sheetIndex)->toArray();
    } catch (Exception $e) {
        echo 'Ending: ' . $e->getMessage() . PHP_EOL;
        break;
    }

    echo "Sheet #${sheetIndex} named " . $spreadsheet->getSheet($sheetIndex)->getTitle() . PHP_EOL;

    $i = 0;

    $entityManager->getTransactionManager()->run(function () use ($entityManager, $i, $sheetArray) {
        while (true) {
            $name = $sheetArray[$i][0];

            if (empty($name)) {
                break;
            }

            //echo 'Product name: ' . $name . PHP_EOL;

            $product = $entityManager->getRDBRepository('Product')->where([
                'name' => $name
            ])->findOne();

            if (!$product) {
                $product = $entityManager->createEntity('Product', [
                    'name' => $name,
                    'pricingType' => 'Profit Margin',
                    'costPrice' => 0.0,
                ], ['skipPriceCalculation' => true]);
            }

            $i += 2;

            $productionModel = $entityManager->createEntity('ProductionModel', [
                'name' => $name,
            ]);

            $entityManager
                ->getRDBRepository('Product')
                ->getRelation($product, 'productionModels')
                ->relate($productionModel);

            $product->set('defaultProductionModelId', $productionModel->getId());

            $entityManager->saveEntity($product, ['skipPriceCalculation' => true]);

            while (($alisId = $sheetArray[$i][0]) !== 'CELKEM (EUR)') {
                if ($i > 600) {
                    break 2;
                }

                if (empty($alisId)) {
                    goto next;
                }

                $componentProduct = $entityManager
                    ->getRDBRepository('Product')
                    ->where([
                        'name' => $sheetArray[$i][1],
                    ])->findOne();

                if (!$componentProduct) {
                    $componentProduct = $entityManager->createEntity('Product', [
                        'name' => $sheetArray[$i][1],
                        'alisId' => $alisId,
                        'pricingType' => 'Profit Margin',
                        'costPrice' => 0.0,
                    ], ['skipPriceCalculation' => true]);
                }

                //echo "Component on line ${i}: " . $componentProduct->get('name') . " with alisId: ${alisId}" . PHP_EOL;

                $entityManager->createEntity('ProductionModelItem', [
                    'productId' => $componentProduct->getId(),
                    'quantity' => $sheetArray[$i][2],
                    'parentId' => $productionModel->getId(),
                    'parentType' => 'ProductionModel'
                ]);

                next:
                $i++;
            }

            $i += 1;

            while (array_key_exists($i, $sheetArray) && empty($sheetArray[$i][0])) {
                $i++;
            }
        }
    });
}

$multipleSheets = [/* 10, */6];

foreach ($multipleSheets as $sheetIndex) {
    try {
        $sheetArray = $spreadsheet->getSheet($sheetIndex)->toArray();
    } catch (Exception $e) {
        echo 'Ending: ' . $e->getMessage() . PHP_EOL;
        break;
    }

    echo "Sheet #${sheetIndex} named " . $spreadsheet->getSheet($sheetIndex)->getTitle() . PHP_EOL;

    $entityManager->getTransactionManager()->run(function () use ($entityManager, $i, $sheetArray) {
        $columns = [0, 5, 10, 15, 20];

        $i = 0;

        foreach ($columns as $_ => $columnIndex) {
            do {

                $productName = $sheetArray[$i][$columnIndex];

                //echo $productName . PHP_EOL;

                if (empty($productName)) {
                    break;
                }

                $product = $entityManager->getRDBRepository('Product')->where([
                    'name' => $productName
                ])->findOne();

                if (!$product) {
                    $product = $entityManager->createEntity('Product', [
                        'name' => $productName,
                        'pricingType' => 'Profit Margin',
                        'costPrice' => 0.0,
                    ], ['skipPriceCalculation' => true]);
                }

                $productionModel = $entityManager->createEntity('ProductionModel', [
                    'name' => $productName,
                ]);

                $entityManager
                    ->getRDBRepository('Product')
                    ->getRelation($product, 'productionModels')
                    ->relate($productionModel);

                $product->set('defaultProductionModelId', $productionModel->getId());

                $entityManager->saveEntity($product, ['skipPriceCalculation' => true]);

                $i += 2;

                while (true) {
                    $alisId = $sheetArray[$i][$columnIndex];

                    if ($alisId === 'CELKEM (EUR)') {
                        break;
                    }

                    $componentName =  $sheetArray[$i][$columnIndex + 1];

                    if (empty($componentName)) {
                        break;
                    }

                    //echo "Component on line ${i}: " . $sheetArray[$i][$columnIndex + 1] . " with alisId: ${alisId}" . PHP_EOL;

                    $componentProduct = $entityManager
                        ->getRDBRepository('Product')
                        ->where([
                            'alisId' => $alisId,
                        ])->findOne();

                    if (!$componentProduct) {
                        $componentProduct = $entityManager->createEntity('Product', [
                            'name' => $componentName,
                            'alisId' => $alisId,
                            'costPrice' => 0.0,
                            'pricingType' => 'Profit Margin'
                        ], ['skipPriceCalculation' => true]);
                    }

                    $entityManager->createEntity('ProductionModelItem', [
                        'productId' => $componentProduct->getId(),
                        'quantity' => $sheetArray[$i][$columnIndex + 2],
                        'parentId' => $productionModel->getId(),
                        'parentType' => 'ProductionModel'
                    ]);

                    $i++;
                }

                $i += 2;
            } while ($i < 279);

            $i = 0;
        }
    });
}

$prices = $spreadsheet->getSheet(0);

$ranges = [
    [2, 67],
    [69, 210],
    [213, 229],
];

foreach ($prices->toArray() as $i => $row) {
    $inRange = false;

    foreach ($ranges as $range) {
        if ($i >= ($range[0] - 1) && $i <= ($range[1] - 1)) {
            $inRange = true;
            break;
        }
    }

    if (!$inRange) {
        continue;
    }

    $productName = $row[0];

    $product = $entityManager
        ->getRDBRepository('Product')
        ->where('name', $productName)
        ->findOne();

    if (!$product) {
        echo 'Creating product: ' . $productName . PHP_EOL;

        $product = $entityManager->createEntity('Product', [
            'name' => $productName,
            'costPrice' => $row[1] ?? 0.0,
            'priceMargin' => $row[2] * 100,
            'salesPrice' => $row[3],
            'pricingType' => 'Profit Margin'
        ], ['skipPriceCalculation' => true]);
    } else {
        $product->set([
            'costPrice' => $row[1] ?? 0.0,
            'priceMargin' => $row[2],
            'salesPrice' => $row[3],
            'pricingType' => 'Profit Margin'
        ]);

        $entityManager->saveEntity($product, ['skipPriceCalculation' => true]);
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
