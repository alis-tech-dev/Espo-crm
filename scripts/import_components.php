<?php

require __DIR__ . '/../bootstrap.php';

use Espo\Core\Application;
use Espo\Custom\Entities\Warehouse;
use Espo\Modules\ProductBase\Entities\Product;
use Espo\Modules\WarehouseManagement\Entities\GoodsReceipt;
use Espo\Modules\WarehouseManagement\Entities\WarehouseItem;

$app = new Application();
$app->setupSystemUser();

const FILE_PATH = __DIR__ . '/alis-tech-components.json';

/** @var \Espo\ORM\EntityManager $entityManager */
$entityManager = $app->getContainer()->get('entityManager');
$data = json_decode(file_get_contents(FILE_PATH), true);

foreach ($data as $product) {
	$costPriceCZK = $product['defaultCZK'];
	$costPriceEUR = $product['defaultEUR'];
	$costPriceUSD = $product['defaultUSD'];

	if ($costPriceUSD) {
		$currency = 'USD';
		$costPrice = $costPriceUSD;
	} else if ($costPriceEUR) {
		$currency = 'EUR';
		$costPrice = $costPriceEUR;
	} else {
		$currency = 'CZK';
		$costPrice = $costPriceCZK;
	}

	$data = [
		'name' => $product['name'],
		'productCode' => $product['componentCode'],
		'description' => $product['description'],
		'type' => 'Component',
		'alisId' => $product['alisID'],
		'url' => $product['url'],
		'qrCode' => $product['qrCode'],
		'costPrice' => $costPrice,
		'costPriceCurrency' => $currency,
	];

	if ($costPrice) {
		$data['pricingType'] = Product::PRICING_TYPE_MARKUP;
		$data['priceMarkup'] = (($product['vPN'] ?? 1) - 1) * 100;
	} else {
		$data['pricingType'] = Product::PRICING_TYPE_NO_PRICE;
	}

	$entityManager->createEntity(Product::ENTITY_TYPE, $data);
}
