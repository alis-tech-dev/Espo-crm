<?php

namespace Espo\Modules\CustomProduction\Tools\SalesOrder\Api;

use Espo\Core\Api\Action;
use Espo\Core\Api\Request;
use Espo\Core\Api\Response;
use Espo\Core\Api\ResponseComposer;
use Espo\Core\Di\RecordServiceContainerAware;
use Espo\Core\Di\RecordServiceContainerSetter;
use Espo\Core\Di\UserAware;
use Espo\Core\Di\UserSetter;
use Espo\Core\Exceptions\BadRequest;
use Espo\Core\Exceptions\NotFound;
use Espo\ORM\EntityManager;

class CreateProductionOrders implements Action, RecordServiceContainerAware, UserAware
{
    use RecordServiceContainerSetter;
    use UserSetter;

    public function __construct(
        private readonly EntityManager $entityManager
    ) {
    }

    public function process(Request $request): Response
    {
        $em = $this->entityManager;
        $id = $request->getRouteParam('id');

        if (is_null($id)) {
            throw new BadRequest();
        }

        $salesOrder = $this
            ->recordServiceContainer
            ->get('SalesOrder')
            ->getEntity($id);

        if (is_null($salesOrder)) {
            throw new NotFound('salesOrder not found');
        }

        $useCaseNames = [];
        $useCases = $salesOrder->get('productionUseCasesRecordList');
        if (!is_null($useCases)) {
            $useCaseNames = $this->getUseCaseNames($useCases);
        }
        $createdUseCases = [];

        $entryData = $salesOrder->get('salesOrderEntryData');
        foreach ($entryData as $entry) {
            $name = $entry->name;
            $solution = $entry->solution;
            $requirements = $entry->description;
            $attachments = $entry->filesIds;
            $items = $entry->ids;
            if (in_array($name, $useCaseNames)) {
                continue;
            } else {
                $payload = [
                    "name" => $name,
                    "items" => $items,
                    "solution" => $solution,
                    "requirements" => $requirements,
                    "salesOrderId" => $id
                ];
                $useCase = $em->createEntity('ProductionUseCase', $payload);
                $useCase->set('filesIds', $attachments);
                $em->saveEntity($useCase);
                $createdUseCases[] = $useCase;
            }
        }



        $items = $salesOrder->get('itemsRecordList') ?? [];

        $hasProducts = false;

        try {
            $em->getTransactionManager()->start();

            foreach ($items as $item) {
                $productId = $item->productId;
                $entryKey = $item->entryKey;
                $useCase = $this->getUseCase($entryKey);
                if ($useCase) {
                    $number = $useCase->get('number');
                } else {
                    foreach ($createdUseCases as $createdUseCase) {
                        $items = $createdUseCase->get('items');
                        if (in_array($entryKey, $items)) {
                            $number = $createdUseCase->get('number');
                            break;
                        }
                    }
                }

                if (is_null($productId)) {
                    continue;
                }

                $product = $em->getEntity('Product', $productId);
                if (!$product) {
                    throw new NotFound('Product not found');
                }

                $productName = $product->get('name');
                $warehouse = $em->getRDBRepository('Warehouse')
                    ->where('name', $productName)
                    ->findOne();

                $warehouseId = $warehouse ? $warehouse->get('id') : null;

                $isIgnored = $product->get('isIgnored');
                if ($isIgnored) {
                    continue;
                }

                $productionModelId = $product->get('defaultProductionModelId');
                $productionOrder = $this->entityManager->getRDBRepository('ProductionOrder')
                    ->where('entryKey', $entryKey)
                    ->having('deleted', 0)
                    ->findOne();

                if ($productionOrder) {
                    $hasProducts = true;
                    continue;
                }
                $newProductionOrder = $em->createEntity('ProductionOrder', [
                    'productId' => $productId,
                    'quantityPlanned' => $item->quantity,
                    'productionModelId' => $productionModelId,
                    'name' => $product->get('name'),
                    'salesOrderId' => $salesOrder->get('id'),
                    'productWarehouseId' => $warehouseId,
                    'materialWarehouseId' => $warehouseId,
                    'entryKey' => $entryKey,
                    'useCaseNumber' => $number
                ]);
                $productionOrderId = $newProductionOrder->getId();
                $hasProducts = true;
                
            }
            $em->getTransactionManager()->commit();
        } catch (\Exception $e) {
            $em->getTransactionManager()->rollback();
            throw new BadRequest($e);
        }

        $result = $hasProducts ? 'Success' : 'NoProducts';
        return ResponseComposer::json([
            'status' => $result
        ]);
    }
    public function getUseCaseNames($useCases): array
    {
        $names = [];
        foreach ($useCases as $useCase) {
            $names[] = $useCase->name;
        }
        return $names;
    }
    public function getUseCase($entryKey) {
        return $this->entityManager->getRDBRepository('ProductionUseCase')
            ->where('JSON_CONTAINS(items, ?)', ['"' . $entryKey . '"'])
            ->findOne();
    }
}