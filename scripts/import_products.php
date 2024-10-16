<?php

require __DIR__ . '/../bootstrap.php';

use Espo\Core\Application;
use Espo\Modules\ProductBase\Entities\Product;

$app = new Application();
$app->setupSystemUser();

const FILE_PATH = __DIR__ . '/alis-tech-products.json';

/** @var \Espo\ORM\EntityManager $entityManager */
$entityManager = $app->getContainer()->get('entityManager');
$data = json_decode(file_get_contents(FILE_PATH), true);

$components = $entityManager->getRDBRepository(Product::ENTITY_TYPE)
	->where('type', 'Component')
	->find();

$componentMap = [];

foreach ($components as $component) {
	$componentMap[$component->get('name')] = $component->getId();
}

foreach ($data as $product) {
	$categoryId = $product['categoryId'];

	if ($categoryId === 'MEDICAL') {
		$categoryId = '5fb662e0c92801eb6';
	}

	$data = [
		'name' => $product['name'],
		'productCode' => $product['productCode'],
		'description' => $product['description'],
		'type' => 'Product',
		'alisId' => $product['alisID'],
		'url' => $product['url'],
		'categoryId' => $categoryId,
		'costPrice' => $product['buyPrice'],
		'costPriceCurrency' => $product['buyPriceCurrency'],
		'salesPrice' => $product['unitPrice'],
		'salesPriceCurrency' => $product['unitPriceCurrency'],
		'pricingType' => Product::PRICING_TYPE_FIXED,
		'priceA' => $product['priceA'],
		'priceACurrency' => $product['priceACurrency'],
		'priceB' => $product['priceB'],
		'priceBCurrency' => $product['priceBCurrency'],
		'priceC' => $product['priceC'],
		'priceCCurrency' => $product['priceCCurrency'],
		'priceEndUser' => $product['priceE'],
		'priceEndUserCurrency' => $product['priceECurrency'],
		'priceRent' => $product['rentPrice'],
		'priceDamage' => $product['priceSkoda'],
		'measureUnit' => $product['unit'],
		'componentsRecordList' => array_map(function ($component) use ($componentMap) {
			return (object)[
				'id' => $componentMap[$component],
				'componentQuantity' => 1,
			];
		}, array_values($product['componentsNames']) ?? []),
	];

	if (!$data['salesPrice']) {
		$data['pricingType'] = Product::PRICING_TYPE_NO_PRICE;
	}

	$entityManager->createEntity(Product::ENTITY_TYPE, $data);
}
