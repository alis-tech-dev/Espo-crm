<?php

require __DIR__ . '/../bootstrap.php';

use Espo\Core\Application;
use Espo\Core\ORM\EntityManager;

$app = new Application();
$app->setupSystemUser();
$entityManager = $app->getContainer()->get('entityManager');

const FILE_PATH = __DIR__ . '/data/own/products.json';

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

foreach ($data as $product) {
    $productName = $product['name'];
    $productCode = $product['product_code'];
    $alisId = $product['alis_id'];
    $categoryId = $product['category_id'];
    $imageId = $product['image_id'];
    $unitItem = $product['unit'];

    $productCodeMain = $entityManager
        ->getRDBRepository('Product')
        ->where('name', $productCode)
        ->findOne();

    $productNameMain = $entityManager
        ->getRDBRepository('Product')
        ->where('name', $productName)
        ->findOne();

    $name = "";
    $productAlis = false;

    if ($productCodeMain && !$productNameMain) {
        $productAlis = $productCodeMain;
    } elseif (!$productCodeMain && $productNameMain) {
        $productAlis = $productNameMain;
    }

    if ($productAlis) {
        $name = $productAlis->get('name');
    }

    $codeName = explode(' ', $productName, 2);
    if ($codeName[0] === $productCode) {
        $productName = $codeName[1];
    };



    if ($productAlis && ($productCode === $name || $productName === $name) && !in_array($categoryId, $categories) && $categoryId) {
        echo "Product with code '$productCode' exists. Editing...\n";
        echo "Product with name '$name' exists. Editing...\n\n";

        echo "Product name: " . $productAlis->get('name') . "\n";
        echo "Product code: " . $productAlis->get('productCode') . "\n";
        echo "Product alis id: " . $productAlis->get('alisId') . "\n";
        echo "Product category id: " . $productAlis->get('categoryId') . "\n";
        echo "Product image id: " . $productAlis->get('imageId') . "\n\n";

        echo "Product source name : $productName \n";
        echo "Product source code: $productCode \n";
        echo "Product source alisID: $alisId \n";
        echo "Product source category ID: $categoryId \n";
        echo "Product source image ID: $imageId \n\n";

        $productAlis->set('productCode', $productName);
        $productAlis->set('deleted', $product['deleted']);
        $productAlis->set('url', $product['url']);
        $productAlis->set('description', $product['description']);
        $productAlis->set('pricingType', $product['pricing_type']);
        $productAlis->set('costPrice', $product['cost_price']);
        $productAlis->set('createdAt', $product['created_at']);
        $productAlis->set('modifiedAt', $product['modified_at']);
        $productAlis->set('weight', $product['weight']);
        $productAlis->set('costPriceCurrency', $product['cost_price_currency']);

        $productAlis->set('categoryId', $categoryId);

        $productAlis->set('createdById', $product['created_by_id']);
        $productAlis->set('modifiedById', $product['modified_by_id']);
        $productAlis->set('type', $product['type']);
        $productAlis->set('priceMargin', $product['price_margin']);
        $productAlis->set('taxRate', $product['tax_rate']);
        $productAlis->set('costPriceWithTax', $product['cost_price_with_tax']);
        $productAlis->set('salesPrice', $product['sales_price']);
        $productAlis->set('salesPriceWithTax', $product['sales_price_with_tax']);
        $productAlis->set('priceMarkup', $product['price_markup']);
        $productAlis->set('costPriceWithTaxCurrency', $product['cost_price_with_tax_currency']);
        $productAlis->set('salesPriceCurrency', $product['sales_price_currency']);
        $productAlis->set('salesPriceWithTaxCurrency', $product['sales_price_with_tax_currency']);
        $productAlis->set('taxClassId', $product['tax_class_id']);
        $productAlis->set('ean', $product['ean']);
        $productAlis->set('alisId', $product['alis_id']);
        $productAlis->set('qrCode', $product['qr_code']);
        $productAlis->set('measureUnit', $product['measure_unit']);
        $productAlis->set('priceA', $product['price_a']);
        $productAlis->set('priceB', $product['price_b']);
        $productAlis->set('priceC', $product['price_c']);
        $productAlis->set('priceEndUser', $product['price_end_user']);
        $productAlis->set('priceRent', $product['price_rent']);
        $productAlis->set('priceDamage', $product['price_damage']);
        $productAlis->set('priceACurrency', $product['price_a_currency']);
        $productAlis->set('priceBCurrency', $product['price_b_currency']);
        $productAlis->set('priceCCurrency', $product['price_c_currency']);
        $productAlis->set('priceEndUserCurrency', $product['price_end_user_currency']);
        $productAlis->set('priceRentCurrency', $product['price_rent_currency']);
        $productAlis->set('priceDamageCurrency', $product['price_damage_currency']);
        $productAlis->set('priceListPrice', $product['price_list_price']);
        $productAlis->set('priceListPriceCurrency', $product['price_list_price_currency']);
        $productAlis->set('dismantlable', $product['dismantlable']);
        $productAlis->set('minimalQuantity', $product['minimal_quantity']);
        $productAlis->set('ordered', $product['ordered']);
        $productAlis->set('primarySupplierId', $product['primary_supplier_id']);
        $productAlis->set('defaultWarehousePositionId', $product['default_warehouse_position_id']);
        $productAlis->set('cenk', $product['cenk']);
        $productAlis->set('descriptionEn', $product['description_en']);
        $productAlis->set('descriptionDe', $product['description_de']);
        $productAlis->set('priceJesenoCurrency', $product['price_jeseno_currency']);
        $productAlis->set('priceJesenoConvertedCurrency', $product['price_jeseno_converted_currency']);
        $productAlis->set('priceJesenoConverted', $product['price_jeseno_converted']);
        $productAlis->set('componentsCostCurrency', $product['components_cost_currency']);
        $productAlis->set('componentsCost', $product['components_cost']);
        $productAlis->set('nameDE', $product['name_d_e']);
        $productAlis->set('imageId', $product['image_id']);

        $entityManager->saveEntity($productAlis, ['skipPriceCalculation' => true]);
        echo "Product updated name: " . $productAlis->get('name') . "\n";
        echo "Product updated code: " . $productAlis->get('productCode') . "\n";
        echo "Product updated alis id: " . $productAlis->get('alisId') . "\n";
        echo "Product updeted category id: " . $productAlis->get('categoryId') . "\n";
        echo "Product updated image id: " . $productAlis->get('imageId') . "\n\n\n";

        $warehouse = $entityManager->getRDBRepository('Warehouse')
            ->where('name', $productName)
            ->findOne();

        if ($warehouse) {
            $warehouse->set('productCode', $productName);
            $warehouse->set('url', $product['url']);
            $warehouse->set('description', $product['description']);
            $warehouse->set('pricingType', $product['pricing_type']);
            $warehouse->set('costPrice', $product['cost_price']);
            $warehouse->set('weight', $product['weight']);
            $warehouse->set('costPriceCurrency', $product['cost_price_currency']);
            $warehouse->set('productCategoryId', $categoryId);
            $warehouse->set('productType', $product['type']);
            $warehouse->set('priceMargin', $product['price_margin']);
            $warehouse->set('taxRate', $product['tax_rate']);
            $warehouse->set('costPriceWithTax', $product['cost_price_with_tax']);
            $warehouse->set('salesPrice', $product['sales_price']);
            $warehouse->set('salesPriceWithTax', $product['sales_price_with_tax']);
            $warehouse->set('priceMarkup', $product['price_markup']);
            $warehouse->set('costPriceWithTaxCurrency', $product['cost_price_with_tax_currency']);
            $warehouse->set('salesPriceCurrency', $product['sales_price_currency']);
            $warehouse->set('salesPriceWithTaxCurrency', $product['sales_price_with_tax_currency']);
            $warehouse->set('taxClassId', $product['tax_class_id']);
            $warehouse->set('ean', $product['ean']);
            $warehouse->set('alisId', $product['alis_id']);
            $warehouse->set('qrCode', $product['qr_code']);
            $warehouse->set('measureUnit', $product['measure_unit']);
            $warehouse->set('priceA', $product['price_a']);
            $warehouse->set('priceB', $product['price_b']);
            $warehouse->set('priceC', $product['price_c']);
            $warehouse->set('priceEndUser', $product['price_end_user']);
            $warehouse->set('priceRent', $product['price_rent']);
            $warehouse->set('priceDamage', $product['price_damage']);
            $warehouse->set('priceACurrency', $product['price_a_currency']);
            $warehouse->set('priceBCurrency', $product['price_b_currency']);
            $warehouse->set('priceCCurrency', $product['price_c_currency']);
            $warehouse->set('priceEndUserCurrency', $product['price_end_user_currency']);
            $warehouse->set('priceRentCurrency', $product['price_rent_currency']);
            $warehouse->set('priceDamageCurrency', $product['price_damage_currency']);
            $warehouse->set('priceListPrice', $product['price_list_price']);
            $warehouse->set('priceListPriceCurrency', $product['price_list_price_currency']);
            $warehouse->set('dismantlable', $product['dismantlable']);
            $warehouse->set('minimumStockQuantity', $product['minimal_quantity']);
            $warehouse->set('ordered', $product['ordered']);
            $warehouse->set('defaultWarehousePositionId', $product['default_warehouse_position_id']);
            $warehouse->set('descriptionEn', $product['description_en']);
            $warehouse->set('descriptionDe', $product['description_de']);
            $warehouse->set('priceJesenoCurrency', $product['price_jeseno_currency']);
            $warehouse->set('priceJesenoConvertedCurrency', $product['price_jeseno_converted_currency']);
            $warehouse->set('priceJesenoConverted', $product['price_jeseno_converted']);
            $warehouse->set('componentsCostCurrency', $product['components_cost_currency']);
            $warehouse->set('componentsCost', $product['components_cost']);
            $warehouse->set('nameDE', $product['name_d_e']);
            $warehouse->set('imageId', $product['image_id']);

            $entityManager->saveEntity($productAlis, ['skipPriceCalculation' => true]);
        }

    } elseif ($categoryId) {
        echo "Product with code '$productCode' or alisId '$alisId' does not exist. Creating...\n\n";

        $isArchive = 0;

        if (in_array($categoryId, $categories)) {
            $isArchive = 1;
        }

//        if ($isArchive == 0) {
//            $name = $product['product_code'];
//            if (!$name && $productName) {
//                $name = $productName;
//            } else {
//                continue;
//            }
//        }


        echo "Product created category: $categoryId \n\n";


        $item = $entityManager->createEntity('Product', [
            "productCode" => $productName,
            "name" => $product['product_code'],
            "deleted" => $product['deleted'],
            "url" => $product['url'],
            "description" => $product['description'],
            "pricingType" => $product['pricing_type'],
            "costPrice" => $product['cost_price'],
            "createdAt" => $product['created_at'],
            "modifiedAt" => $product['modified_at'],
            "weight" => $product['weight'],
            "costPriceCurrency" => $product['cost_price_currency'],
            "categoryId" => $categoryId,
            "createdById" => $product['created_by_id'],
            "modifiedById" => $product['modified_by_id'],
            "type" => $product['type'],
            "priceMargin" => $product['price_margin'],
            "taxRate" => $product['tax_rate'],
            "costPriceWithTax" => $product['cost_price_with_tax'],
            "salesPrice" => $product['sales_price'],
            "salesPriceWithTax" => $product['sales_price_with_tax'],
            "priceMarkup" => $product['price_markup'],
            "costPriceWithTaxCurrency" => $product['cost_price_with_tax_currency'],
            "salesPriceCurrency" => $product['sales_price_currency'],
            "salesPriceWithTaxCurrency" => $product['sales_price_with_tax_currency'],
            "taxClassId" => $product['tax_class_id'],
            "ean" => $product['ean'],
            "alisId" => $product['alis_id'],
            "qrCode" => $product['qr_code'],
            "measureUnit" => $product['measure_unit'],
            "priceA" => $product['price_a'],
            "priceB" => $product['price_b'],
            "priceC" => $product['price_c'],
            "priceEndUser" => $product['price_end_user'],
            "priceRent" => $product['price_rent'],
            "priceDamage" => $product['price_damage'],
            "priceACurrency" => $product['price_a_currency'],
            "priceBCurrency" => $product['price_b_currency'],
            "priceCCurrency" => $product['price_c_currency'],
            "priceEndUserCurrency" => $product['price_end_user_currency'],
            "priceRentCurrency" => $product['price_rent_currency'],
            "priceDamageCurrency" => $product['price_damage_currency'],
            "priceListPrice" => $product['price_list_price'],
            "priceListPriceCurrency" => $product['price_list_price_currency'],
            "dismantlable" => $product['dismantlable'],
            "minimalQuantity" => $product['minimal_quantity'],
            "ordered" => $product['ordered'],
            "primarySupplierId" => $product['primary_supplier_id'],
            "defaultWarehousePositionId" => $product['default_warehouse_position_id'],
            "cenk" => $product['cenk'],
            "descriptionEn" => $product['description_en'],
            "descriptionDe" => $product['description_de'],
            "priceJesenoCurrency" => $product['price_jeseno_currency'],
            "priceJesenoConvertedCurrency" => $product['price_jeseno_converted_currency'],
            "priceJesenoConverted" => $product['price_jeseno_converted'],
            "componentsCostCurrency" => $product['components_cost_currency'],
            "componentsCost" => $product['components_cost'],
            "nameDE" => $product['name_d_e'],
            "imageId" => $product['image_id'],
            "isArchive" => $isArchive
        ]);

        $itemArchive = $item->get('isArchive');


        $entityManager->createEntity('Warehouse', [
            'name' => $product['product_code'],
            'category' => 'Product',
            'quantity' => 0,
            'type' => 'Simple',
            'productId' => $item->getId(),
            'availableQuantity' => 0,

            "productCode" => $productName,
            "productName" => $product['product_code'],
            "deleted" => $product['deleted'],
            "url" => $product['url'],
            "description" => $product['description'],
            "pricingType" => $product['pricing_type'],
            "costPrice" => $product['cost_price'],
            "weight" => $product['weight'],
            "costPriceCurrency" => $product['cost_price_currency'],
            "productCategoryId" => $categoryId,
            "productType" => $product['type'],
            "priceMargin" => $product['price_margin'],
            "taxRate" => $product['tax_rate'],
            "costPriceWithTax" => $product['cost_price_with_tax'],
            "salesPrice" => $product['sales_price'],
            "salesPriceWithTax" => $product['sales_price_with_tax'],
            "priceMarkup" => $product['price_markup'],
            "costPriceWithTaxCurrency" => $product['cost_price_with_tax_currency'],
            "salesPriceCurrency" => $product['sales_price_currency'],
            "salesPriceWithTaxCurrency" => $product['sales_price_with_tax_currency'],
            "ean" => $product['ean'],
            "alisId" => $product['alis_id'],
            "qrCode" => $product['qr_code'],
            "unit" => $product['measure_unit'],
            "priceA" => $product['price_a'],
            "priceB" => $product['price_b'],
            "priceC" => $product['price_c'],
            "priceEndUser" => $product['price_end_user'],
            "priceRent" => $product['price_rent'],
            "priceDamage" => $product['price_damage'],
            "priceACurrency" => $product['price_a_currency'],
            "priceBCurrency" => $product['price_b_currency'],
            "priceCCurrency" => $product['price_c_currency'],
            "priceEndUserCurrency" => $product['price_end_user_currency'],
            "priceRentCurrency" => $product['price_rent_currency'],
            "priceDamageCurrency" => $product['price_damage_currency'],
            "priceListPrice" => $product['price_list_price'],
            "priceListPriceCurrency" => $product['price_list_price_currency'],
            "dismantlable" => $product['dismantlable'],
            "minimumStockQuantity" => $product['minimal_quantity'],
            "ordered" => $product['ordered'],
            "descriptionEn" => $product['description_en'],
            "descriptionDe" => $product['description_de'],
            "priceJesenoCurrency" => $product['price_jeseno_currency'],
            "priceJesenoConvertedCurrency" => $product['price_jeseno_converted_currency'],
            "priceJesenoConverted" => $product['price_jeseno_converted'],
            "componentsCostCurrency" => $product['components_cost_currency'],
            "componentsCost" => $product['components_cost'],
            "nameDE" => $product['name_d_e'],
            "imageId" => $product['image_id'],
            "isArchive" => $isArchive

        ]);

    }
}
echo "Processing complete.\n";
