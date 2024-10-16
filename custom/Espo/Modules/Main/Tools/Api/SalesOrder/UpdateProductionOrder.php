<?php

namespace Espo\Modules\Main\Tools\Api\SalesOrder;

use Espo\Core\Api\Action;
use Espo\Core\Api\Request;
use Espo\Core\Api\Response;
use Espo\Core\Api\ResponseComposer;
use Espo\Core\Exceptions\BadRequest;
use Espo\Core\ORM\EntityManager;

class UpdateProductionOrder implements Action
{
    public function __construct(
        private EntityManager $entityManager
    )
    {
    }
    public function process(Request $request): Response
    {
        ini_set('error_log', '/home/admin/web/crm.alis-is.com/public_html/data/logs/logPHP.log');
        try {
            $this->entityManager->getTransactionManager()->start();
            $id = $request->getRouteParam('id') ?? throw new BadRequest('Id not found');
            $quantityStr = $request->getRouteParam('quantity') ?? throw new BadRequest('quantity not found');
            $quantity = intval($quantityStr);

            $stock = $request->getRouteParam('stock') ?? throw new BadRequest('Stock not found');
            if ($stock === 'brno') {
                $stockAvailableQuantity = 'availableBrno';
            } elseif ($stock == 'pv') {
                $stockAvailableQuantity = 'availablePv';
            }

            $item = $this->entityManager->getRDBRepository('SalesOrderItem')
                ->where('id', $id)
                ->findOne();
            $itemEntryKey = $item->get('entryKey');
            $productionOrder = $this->entityManager->getRDBRepository('ProductionOrder')
                    ->where('entryKey', $itemEntryKey)
                    ->findOne();
            if ($productionOrder) {

                $productId = $productionOrder->get('productId');
                $product = $this->entityManager->getRDBRepository('Product')
                    ->where('id', $productId)
                    ->findOne();
                $productUnit = $product->get('unit');

                $warehouseId = $productionOrder->get('productWarehouseId');
                $salesOrderId = $productionOrder->get('salesOrderId');
                $warehouse = $this->entityManager->getRDBRepository('Warehouse')
                    ->where('id', $warehouseId)
                    ->findOne();
                $serialNumber = $warehouse->get('isSerialNumber');
                $warehouseAvailableQuantity = $warehouse->get($stockAvailableQuantity);

                $mainUnits = ['ks', 'pcs', 'set'];
                $units = ['hod', 'day', 'km', 'h'];


                $quantityProduced = $productionOrder->get('quantityProduced');
                $fromStock = $productionOrder->get('fromWarehouse');
                $totalQuantity = $quantityProduced + $fromStock;
                $differentQuantity = $totalQuantity - $quantity;

                if ($quantity < $totalQuantity) {
                    if (in_array($productUnit, $mainUnits) && $serialNumber == 1) {
                        $warehouseItems = $this->entityManager->getRDBRepository('WarehouseItem')
                            ->where('productId', $productId)
                            ->having('salesOrderId', $salesOrderId)
                            ->order('serialNumber', 'DESC')
                            ->limit(null, $differentQuantity)
                            ->find();

                        if (!$warehouseItems) {
                            throw new BadRequest('Warehouse items not found');
                        }

                        foreach ($warehouseItems as $item) {
                            $item->set('isReserved', 0);
                            $item->set('salesOrderId', null);
                            $item->set('stockLocation', $stock);
                            $this->entityManager->saveEntity($item);
                        }
                    } elseif ($productUnit == 'm' || $serialNumber == 0) {
                        $wiso = $this->entityManager->getRDBRepository('Wiso')
                            ->where('entryKey', $itemEntryKey)
                            ->findOne();
//                        $warehouseItemId = $wiso->get('warehouseItem1Id');
//                        $warehouseItem = $this->entityManager->getRDBRepository('WarehouseItem')
//                            ->where('id', $warehouseItemId)
//                            ->findOne();
                        $warehouseItemQuantity = $wiso->get('quantity');
                        $warehouseItemResultQuantity = $warehouseItemQuantity - $differentQuantity;
                        $wiso->set('quantity', $warehouseItemResultQuantity);
                        $this->entityManager->saveEntity($wiso);
                    }

                    if (!in_array($productUnit, $units)) {

                        $warehouseResultQuantity = $warehouseAvailableQuantity + $differentQuantity;
                        $warehouse->set($stockAvailableQuantity, $warehouseResultQuantity);
                        $this->entityManager->saveEntity($warehouse);
                    }

                    if ($differentQuantity <= $fromStock) {
                        $resultFromStock = $fromStock - $differentQuantity;
                        $productionOrder->set('fromWarehouse', $resultFromStock);
                    } else {
                        $resultQuantityProduced = $differentQuantity - $fromStock;
                        $productionOrder->set('fromWarehouse', 0);

                        $productionOrderId = $productionOrder->getId();
                        $worksPerformed = $this->entityManager->getRDBRepository('WorkPerformed')
                            ->where('parentId', $productionOrderId)
                            ->order('producedAmount', 'DESC')
                            ->find();

                        $counter = 0;
                        foreach ($worksPerformed as $work) {
                            $producedAmount = $work->get('producedAmount');
                            $remainingQuantityToDeduct = $resultQuantityProduced - $counter;

                            if ($remainingQuantityToDeduct >= $producedAmount) {
                                $counter += $producedAmount;
                                $work->set('producedAmount', 0);
                            } else {
                                $producedAmount -= $remainingQuantityToDeduct;
                                $work->set('producedAmount', $producedAmount);
                                $counter += $remainingQuantityToDeduct;
                            }

                            $this->entityManager->saveEntity($work);

                            if ($counter >= $resultQuantityProduced) {
                                break;
                            }
                        }
                    }
                }
                $productionOrder->set('quantityPlanned', $quantity);
                $this->entityManager->saveEntity($productionOrder, ['skipHooks' => true]);
                $this->entityManager->getTransactionManager()->commit();
//                error_log("Transaction committed for Production Order ID: " . $productionOrder->getId());
                return ResponseComposer::json(['status' => "Success"]);
            } else {
                $this->entityManager->getTransactionManager()->commit();
                return ResponseComposer::json(['status' => 'Update']);
            }

        } catch (\Exception $e) {
            $this->entityManager->getTransactionManager()->rollback();
            throw new BadRequest('Error processing request: ' . $e->getMessage());
        }
    }
}