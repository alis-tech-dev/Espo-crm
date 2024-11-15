<?php

require __DIR__ . '/../bootstrap.php';

use Espo\Core\Application;
use Espo\Core\ORM\EntityManager;

$app = new Application();
$app->setupSystemUser();
$entityManager = $app->getContainer()->get('entityManager');

const FILE_PATH = __DIR__ . '/data/own/products_new.json';

$data = json_decode(file_get_contents(FILE_PATH), true);

if (json_last_error() !== JSON_ERROR_NONE) {
    echo "Error decoding JSON: " . json_last_error_msg() . "\n";
    exit;
}

$categories = [
    '5fb6631a3e3f4cdb8',
    '61963e4f531ec6b8e',
    '614dca2330aa891b0',
    '611a5b46bdd33908a',
    '66d7091da459dd92c',
    '5fb662e0c92801eb6',
    '6244112729896e10b',
    '5fb662f195275cc3d',
    '5fb66300898dbff72',
    '5fb6630e1a6136851',
    '60c07f5f118184413',
    '5fb69e497c514bb43',
    '5fb66326170af10c1',
    '61d5a3a2c1aee5708',
    '619b6d34277b8120b'
];

$fieldsToSet = [
    'name' => 'product_code',
    'productCode' => 'name',
    'deleted' => 'deleted',
    'url' => 'url',
    'description' => 'description',
//    'pricingType' => 'pricing_type',
    'costPrice' => 'cost_price',
    'createdAt' => 'created_at',
    'weight' => 'weight',
    'costPriceCurrency' => 'cost_price_currency',
    'categoryId' => 'category_id',
    'createdById' => 'created_by_id',
    'modifiedById' => 'modified_by_id',
    'type' => 'type',
    'priceMargin' => 'price_margin',
    'taxRate' => 'tax_rate',
    'costPriceWithTax' => 'cost_price_with_tax',
    'salesPrice' => 'sales_price',
    'salesPriceWithTax' => 'sales_price_with_tax',
    'priceMarkup' => 'price_markup',
    'costPriceWithTaxCurrency' => 'cost_price_with_tax_currency',
    'salesPriceCurrency' => 'sales_price_currency',
    'salesPriceWithTaxCurrency' => 'sales_price_with_tax_currency',
    'taxClassId' => 'tax_class_id',
    'ean' => 'ean',
    'alisId' => 'alis_id',
    'qrCode' => 'qr_code',
    'measureUnit' => 'measure_unit',
    'priceA' => 'price_a',
    'priceB' => 'price_b',
    'priceC' => 'price_c',
    'priceEndUser' => 'price_end_user',
    'priceRent' => 'price_rent',
    'priceDamage' => 'price_damage',
    'priceACurrency' => 'price_a_currency',
    'priceBCurrency' => 'price_b_currency',
    'priceCCurrency' => 'price_c_currency',
    'priceEndUserCurrency' => 'price_end_user_currency',
    'priceRentCurrency' => 'price_rent_currency',
    'priceDamageCurrency' => 'price_damage_currency',
    'priceListPrice' => 'price_list_price',
    'priceListPriceCurrency' => 'price_list_price_currency',
    'dismantlable' => 'dismantlable',
    'minimalQuantity' => 'minimal_quantity',
    'ordered' => 'ordered',
    'primarySupplierId' => 'primary_supplier_id',
    'defaultWarehousePositionId' => 'default_warehouse_position_id',
    'cenk' => 'cenk',
    'descriptionEn' => 'description_en',
    'descriptionDe' => 'description_de',
    'priceJesenoCurrency' => 'price_jeseno_currency',
    'priceJesenoConvertedCurrency' => 'price_jeseno_converted_currency',
    'priceJesenoConverted' => 'price_jeseno_converted',
    'componentsCostCurrency' => 'components_cost_currency',
    'componentsCost' => 'components_cost',
    'nameDE' => 'name_d_e',
    'imageId' => 'image_id',
];

$created = 0;
$updated = 0;
foreach ($data as $product) {

    if ($product['deleted'] == 1) {
        continue;
    }

    $productName = $product['name'];
    $productCode = $product['product_code'];
    $alisId = $product['alis_id'];
    $categoryId = $product['category_id'];
    $imageId = $product['image_id'];
    $unitItem = $product['unit'];

    $codeName = explode(' ', $productName, 2);
    if ($codeName[0] === $productCode) {
        $productName = $codeName[1];
    };

    $productCodeMain = $entityManager
        ->getRDBRepository('Product')
        ->where('name', $productCode)
        ->findOne();

    $productNameMain = $entityManager
        ->getRDBRepository('Product')
        ->where('name', $product['name'])
        ->findOne();

    $name = "";
    $code = "";
    $productAlis = false;

    if ($productCodeMain && !$productNameMain) {
        $productAlis = $productCodeMain;
    } elseif (!$productCodeMain && $productNameMain) {
        $productAlis = $productNameMain;
    }

    if ($productAlis) {
        $name = $productAlis->get('name');
        $code = $productAlis->get('productCode');
        echo "Product name: $name     Product code: $code\n";
    } else {
        echo "\n***********************************************\n";
    }


    if ($productAlis && ($productCode === $name || $productCode === $code || $productName === $name || $productName === $code)) {
        echo "Product with code $productCode exists. Editing...\n";
        foreach ($fieldsToSet as $entityField => $sourceField) {
            if (isset($product[$sourceField])) {
                if ($entityField == 'name') {
                    continue;
                } else {
                    $productAlis->set($entityField, $product[$sourceField]);
                }
            }
        }
        $entityManager->saveEntity($productAlis, ['skipPriceCalculation' => true]);

        $warehouse = $entityManager->getRDBRepository('Warehouse')
            ->where('name', $productName)
            ->findOne();

        if ($warehouse) {

            foreach ($fieldsToSet as $entityField => $sourceField) {
                if (isset($product[$sourceField])) {
                    if ($entityField == 'name') {
                        continue;
                    } else {
                        if ($entityField == 'type') {
                            $entityField = 'productType';
                        } elseif ($entityField == 'categoryId') {
                            $entityField = 'productCategoryId';
                        }
                    }
                    $warehouse->set($entityField, $product[$sourceField]);
                }
            }
            $entityManager->saveEntity($warehouse);
        }
        $updated = $updated + 1;

    } else {
        echo "Product with code $productCode NOT exists. Creating...\n";
        $newProductCode = $product["product_code"];
        $newProductName = $product["name"];
        $isArchive = 0;

        if (in_array($categoryId, $categories)) {
            $isArchive = 1;
        }

        try {
            $item = $entityManager->createEntity('Product', [
                'pricingType' => 'No Price'
            ]);
        } catch (Exception $e) {
            echo "Error creating Product entity: " . $e->getMessage() . "\n";
            echo "Stack trace:\n" . $e->getTraceAsString() . "\n";
        }


        foreach ($fieldsToSet as $entityField => $sourceField) {
            if (isset($product[$sourceField])) {
                if (str_starts_with($newProductCode, "ALIS")) {
                    echo "\n~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ALIS~~~~~~~~~~~~~~~~~~~~~~~~~~~~~\n";
                    echo "NEW Product name: $newProductName    NEW Product code: $newProductCode\n";
                    $item->set('name', $newProductName);
                    $item->set('productCode', $newProductCode);
                } else {
                    $item->set('name', $newProductCode);
                    $item->set('productCode', $newProductName);
                }
                if ($entityField === 'name' || $entityField === 'productCode') {
                    continue;
                } else {
                    $item->set($entityField, $product[$sourceField]);
                }

            }
        }
        $entityManager->saveEntity($item, ['skipPriceCalculation' => true]);

        $newWarehouse = $entityManager->createEntity('Warehouse', [
            'name' => $item->get('name'),
            'category' => 'Product',
            'quantity' => 0,
            'type' => 'Simple',
            'productId' => $item->getId(),
            'availableQuantity' => 0,
        ]);
        foreach ($fieldsToSet as $entityField => $sourceField) {
            if (isset($product[$sourceField])) {
                if ($entityField == 'name') {
                    $newWarehouse->set('productName', $item->get('name'));
                    continue;
                } elseif ($entityField == 'productCode') {
                    $newWarehouse->set('productCode', $item->get('productCode'));
                    continue;
                } else {
                    if ($entityField == 'type') {
                        $entityField = 'productType';
                    } elseif ($entityField == 'categoryId') {
                        $entityField = 'productCategoryId';
                    }
                }
                $newWarehouse->set($entityField, $product[$sourceField]);
            }
        }
        $entityManager->saveEntity($newWarehouse);
        $created = $created + 1;
    }
}
echo "$created PRODUCTS CREATED \n";
echo "$updated PRODUCTS UPDATED \n";
echo "Processing complete.\n";

