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

$spreadsheet = $xlsReader->load(relative_path('data/komponenty.xlsx'));
wipe_all("production_model", "production_model_item");

foreach ($spreadsheet->getWorksheetIterator() as $sheet) {
    if (empty($sheet->toArray()[0][0])) {
        continue;
    }

    $productCode = trim($sheet->getTitle());

    if (empty($productCode)) {
        continue;
    }

    $product = $entityManager
        ->getRDBRepository('Product')
        ->where('productCode', $productCode)
        ->findOne();

    if (!$product) {
        echo "Product not found: " . $productCode . "\n";
        continue;
    }

    $model = $entityManager
        ->createEntity('ProductionModel', [
            'name' => $productCode,
            'productId' => $product->getId(),
        ]);

    $relation = $entityManager
        ->getRDBRepository('ProductionModel')
        ->getRelation($model, 'billOfMaterials');

    foreach ($sheet->toArray() as $row) {

        if (preg_match('/([0-9]+)x (.*)/', $row[0], $matches)){
            $quantity = trim($matches[1]);
            $componentName = trim($matches[2]);
        } else {
            $quantity = 1;
            $componentName = trim($row[0]);
        }

        if (empty($componentName)) {
            continue;
        }

        $component = $entityManager
            ->getRDBRepository('Product')
            ->where('name', $componentName)
            ->findOne();

        if (empty($component)) {
            echo "Component not found: " . $componentName . "\n";
            continue;
        }

        $item = $entityManager->createEntity('ProductionModelItem', [
            'productId' => $component->getId(),
            'quantity' => $quantity,
        ]);

        $relation->relate($item);
    }
        
}

function relative_path(string $path): string {
    return __DIR__ . '/' . $path;
}


function wipe_all( ...$entities): void {
    /** @var EntityManager */
    global $entityManager;

    foreach ($entities as $entity) {
        $entityManager->getSqlExecutor()->execute("DELETE from ${entity}");
    }
}