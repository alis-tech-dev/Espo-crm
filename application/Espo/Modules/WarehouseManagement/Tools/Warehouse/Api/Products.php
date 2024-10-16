<?php

namespace Espo\Modules\WarehouseManagement\Tools\Warehouse\Api;

use Espo\Core\Api\Action;
use Espo\Core\Api\Request;
use Espo\Core\Api\Response;
use Espo\Core\Api\ResponseComposer;
use Espo\Core\Exceptions\NotFound;
use Espo\Core\ORM\EntityManager;
use Espo\Core\Utils\Config;
use Espo\ORM\Query\Part\Expression;
use PDO;

class Products implements Action
{
    public function __construct(
        private readonly EntityManager $entityManager,
        private readonly Config $config
    ) {
    }

    public function process(Request $request): Response
    {
        $warehouseId = $request->getQueryParam('warehouseId');

        // Test that the warehouse exists
        if ($warehouseId) {
            $this->entityManager->getEntityById('Warehouse', $warehouseId) ?? throw new NotFound();
        }

        $queryBuilder = $this->entityManager->getQueryBuilder();

        $query = $queryBuilder
            ->select('product.id', 'id')
            ->select('product.name', 'name')
            ->select('SUM:quantity', 'totalWarehouseQuantity')
            ->select('product.primarySupplierId', 'primarySupplierId')
            ->select('supplier.name', 'primarySupplierName')
            ->select('product.minimumStockQuantity', 'minimumStockQuantity')
            ->from('WarehouseItem')
            ->leftJoin('product', 'product')
            ->leftJoin('Account', 'supplier', ['product.primarySupplierId:' => 'supplier.id'])
            ->having(
                Expression::lessOrEqual(
                    Expression::sum(
                        Expression::column('quantity')
                    ),
                    Expression::multiply(
                        Expression::column('product.minimumStockQuantity'),
                        $this->config->get('warehouseRunningOutMultiplier') ?? 1.1
                    )
                )
            )
            ->group('product.id')
            ->group('product.minimumStockQuantity'); //This is very sus, but it doesn't work without it

        if ($warehouseId) {
            $query->where('parentId', $warehouseId);
            $query->where('parentType', 'Warehouse');
        }

        $records = $this
            ->entityManager
            ->getQueryExecutor()
            ->execute($query->build())
            ->fetchAll(PDO::FETCH_OBJ);

        foreach ($records as &$record) {
            $ordered = (bool)$this
                ->entityManager
                ->getRDBRepository('SupplierOrderItem')
                ->join('supplierOrder')
                ->where('supplierOrder.status', 'Processing')
                ->where('productId', $record->id)
                ->findOne();

            $record->ordered = $ordered;
        }

        return ResponseComposer::json([
            'list' => $records,
            'count' => count($records),
        ]);
    }
}
