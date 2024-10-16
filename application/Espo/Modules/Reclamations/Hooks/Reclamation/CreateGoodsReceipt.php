<?php

namespace Espo\Modules\Reclamations\Hooks\Reclamation;

use Espo\Core\Exceptions\NotFound;
use Espo\Core\Hook\Hook\AfterSave;
use Espo\Core\ORM\EntityManager;
use Espo\Core\Record\CreateParams;
use Espo\Core\Record\ServiceContainer;
use Espo\Core\Utils\Config;
use Espo\Modules\WarehouseManagement\Entities\GoodsReceipt;
use Espo\ORM\Entity;
use Espo\ORM\Repository\Option\SaveOptions;
use Exception;
use LogicException;

class CreateGoodsReceipt implements AfterSave
{
    public function __construct(
        private readonly EntityManager $entityManager,
        private readonly Config $config,
        private readonly ServiceContainer $serviceContainer
    ) {
    }

    public function afterSave(Entity $entity, SaveOptions $options): void
    {
        if ($entity->isNew()) {
            $productId = $entity->get('productId');

            $warehouseId = $this
                ->config
                ->get('reclamationDefaultWarehouseId') ?? throw new Exception("Default warehouse for reclamations is not set");

            $product = $this->entityManager->getEntityById('Product', $productId) ?? throw new NotFound();

            $salesOrderId = $entity->get('salesOrderId') ?? throw new LogicException();
            $salesOrder = $this->entityManager->getEntityById('SalesOrder', $salesOrderId) ?? throw new NotFound();

            // Debugging statements
            $GLOBALS['log']->debug("CreateGoodsReceipt: Sales Order ID from Reclamation: {$salesOrderId}.");
            $GLOBALS['log']->debug("CreateGoodsReceipt: Sales Order found: " . ($salesOrder ? 'Yes' : 'No') . ".");

            $productionOrder = $this
                ->entityManager
                ->getRDBRepository('SalesOrder')
                ->getRelation($salesOrder, 'productionOrders')
                ->where('productId', $productId)
                ->findOne() ?? throw new NotFound();

            // Debugging statements
            $GLOBALS['log']->debug("CreateGoodsReceipt: Production Order found for Sales Order: " . ($productionOrder ? 'Yes' : 'No') . ".");

            if ($productionOrder) {
                $GLOBALS['log']->debug("CreateGoodsReceipt: Production Order Sales Order ID: " . $productionOrder->get('salesOrderId') . ".");
            }

            $map = [];
            $items = null;

            if ($product->get('dismantlable')) {
                $productionModel = $this
                    ->entityManager
                    ->getRDBRepository('ProductionOrder')
                    ->getRelation($productionOrder, 'productionModel')
                    ->findOne() ?? throw new NotFound();

                $materials = $this
                    ->entityManager
                    ->getRDBRepository('ProductionModel')
                    ->getRelation($productionModel, 'billOfMaterials')
                    ->find();

                foreach ($materials as $material) {
                    $product = $this
                        ->entityManager
                        ->getRDBRepository('ProductionModelItem')
                        ->getRelation($material, 'product')
                        ->findOne();

                    if (!$product) {
                        continue;
                    }

                    $quantity = $material->get('quantity');

                    $this->getItemsForProduct($product, $quantity, $map);
                }

                foreach ($map as $productId => $quantity) {
                    $items[] = (object) [
                        'productId' => $productId,
                        'quantity' => $quantity,
                    ];
                };
            } else {
                $items = [
                    (object) [
                        'productId' => $product->getId(),
                        'quantity' => 1,
                    ]
                ];
            }

            $goodsReceipt = $this
                ->serviceContainer
                ->get('GoodsReceipt')
                ->create(
                    (object)[
                        'name' => 'Příjemka pro reklamaci',
                        'status' => GoodsReceipt::STATUS_PROCESSING,
                        'parentId' => $entity->getId(),
                        'parentType' => 'Reclamation',
                        'itemsRecordList' => $items,
                        'warehouseId' => $warehouseId,
                    ],
                    CreateParams::create()
                );

            $this
                ->entityManager
                ->getRDBRepository('Reclamation')
                ->getRelation($entity, 'goodsReceipt')
                ->relate($goodsReceipt);
        }
    }

    private function getItemsForProduct(Entity $product, float $quantity, array &$map): void
    {
        if ($product->get('dismantlable')) {
            $defaultProductionModel = $this
                ->entityManager
                ->getRDBRepository('Product')
                ->getRelation($product, 'defaultProductionModel')
                ->findOne() ?? throw new Exception("No default production model for product");

            $materials = $this
                ->entityManager
                ->getRDBRepository('ProductionModel')
                ->getRelation($defaultProductionModel, 'billOfMaterials')
                ->find();

            foreach ($materials as $material) {
                $product = $this
                    ->entityManager
                    ->getRDBRepository('ProductionModelItem')
                    ->getRelation($material, 'product')
                    ->findOne();

                $quantity = $quantity * $material->get('quantity');

                if (!$product) {
                    continue;
                }

                $this->getItemsForProduct($product, $quantity, $map);
            }
        } else {
            if (isset($map[$product->getId()])) {
                $map[$product->getId()] += $quantity;
            } else {
                $map[$product->getId()] = $quantity;
            }
        }
    }
}
