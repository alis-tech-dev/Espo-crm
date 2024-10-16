<?php

require __DIR__ . '/../bootstrap.php';

use Espo\Core\Application;
use Espo\Modules\WarehouseManagement\Entities\WarehousePosition;

$app = new Application();
$app->setupSystemUser();

/** @var \Espo\ORM\EntityManager $entityManager */
$entityManager = $app->getContainer()->get('entityManager');

const BRNO_WAREHOUSE_ID = '650067377ec266179';
const PROSTEJOV_WAREHOUSE_ID = '65006dec0dfcb5f11';

const BRNO_PREFIXES = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J'];
const PROSTEJOV_PREFIXES = ['M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V'];

foreach (BRNO_PREFIXES as $prefix) {
	for ($i = 0; $i <= 4; $i++) {
		$entityManager->createEntity(WarehousePosition::ENTITY_TYPE, [
			'warehouseId' => BRNO_WAREHOUSE_ID,
			'name' => $prefix . $i,
		]);
	}
}

foreach (PROSTEJOV_PREFIXES as $prefix) {
	for ($i = 0; $i <= 4; $i++) {
		$entityManager->createEntity(WarehousePosition::ENTITY_TYPE, [
			'warehouseId' => PROSTEJOV_WAREHOUSE_ID,
			'name' => $prefix . $i,
		]);
	}
}
