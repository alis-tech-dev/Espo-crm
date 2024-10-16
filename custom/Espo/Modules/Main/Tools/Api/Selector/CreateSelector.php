<?php

namespace Espo\Modules\Main\Tools\Api\Selector;

use Espo\Core\Api\Action;
use Espo\Core\Api\Request;
use Espo\Core\Api\Response;
use Espo\Core\Api\ResponseComposer;
use Espo\Core\Exceptions\BadRequest;
use Espo\Core\ORM\EntityManager;
class CreateSelector implements Action
{
    public function __construct(
        private EntityManager $entityManager
    )
    {
    }
    public function process(Request $request): Response
    {
        try {
            $this->entityManager->getTransactionManager()->start();
            $requestData = $request->getBodyContents();

            $data = json_decode($requestData, true);

            $projector = $data['projector'] ?? null;
            $lens = $data['lens'] ?? null;
            $illuminance = isset($data['illuminance']) ? floatval($data['illuminance']) : null;
            $symbolIlluminance = isset($data['symbolIlluminance']) ? floatval($data['symbolIlluminance']) : null;
            $price = isset($data['price']) ? floatval($data['price']) : null;
            $symbolSize = $data['symbolSize'] ?? null;
            $height = isset($data['height']) ? floatval($data['height']) : null;

            $this->entityManager->createEntity('Selector', [
                "name" => $projector,
                "lens" => $lens,
                "illuminance" => $illuminance,
                "symbolIlluminance" => $symbolIlluminance,
                "price" => $price,
                "symbolSize" => $symbolSize,
                "height" => $height
            ]);


            $this->entityManager->getTransactionManager()->commit();
            return ResponseComposer::json(['status' => 'Success']);
        } catch (\Exception $e) {
            $this->entityManager->getTransactionManager()->rollback();
            throw new BadRequest('Error processing request: ' . $e->getMessage());
        }
    }
}