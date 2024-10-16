<?php


namespace Espo\Modules\WarehouseManagement\Tools\SupplierOrder\Api;

use Espo\Core\Api\Action;
use Espo\Core\Api\Request;
use Espo\Core\Api\Response;
use Espo\Core\Api\ResponseComposer;
use Espo\Core\Exceptions\BadRequest;
use Espo\Core\ORM\EntityManager;
use Espo\Core\Utils\Config;
use Espo\ORM\Query\Part\Expression;
use PDO;

class HintProducts implements Action
{
    public function __construct(
        private readonly EntityManager $entityManager,
        private readonly Config $config
    ) {
    }

    public function process(Request $request): Response
    {
        $exceptIds = $request->getQueryParams()['exceptIds'] ?? [];
        $accountId = $request->getQueryParam('accountId') ?? throw new BadRequest();

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
            ->where('product.primarySupplierId', $accountId)
            ->where('product.id!=', $exceptIds)
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

        $records = $this
            ->entityManager
            ->getQueryExecutor()
            ->execute($query->build())
            ->fetchAll(PDO::FETCH_OBJ);

        return ResponseComposer::json($records);
    }
}
