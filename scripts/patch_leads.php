<?php

require __DIR__ . '/vendor/autoload.php';

use Espo\ApiClient\Client;
use Espo\ApiClient\Exception\ResponseError;
use Espo\Core\Application;
use Espo\ORM\EntityManager;

$client = new Client('https://alis.devcrm.cz');
$client->setApiKey('46035f8976a09f645e5d73d64540ae39');

require dirname(__DIR__) . '/bootstrap.php';

$app = new Application();
$app->setupSystemUser();

/** @var EntityManager */
$entityManager = $app->getContainer()->get('entityManager');

$entities = [
    'Lead'  // Focus only on Lead entities
];

function downloadAndCreateEntities($client, $entityManager, $entities, $chunkSize = 200)
{
    foreach ($entities as $entity) {
        echo "Starting download for entity: $entity" . PHP_EOL;
        $offset = 0;
        $hasMore = true;

        while ($hasMore) {
            try {
                echo "Requesting $entity with offset $offset and chunk size $chunkSize" . PHP_EOL;
                $response = $client->request(Client::METHOD_GET, $entity, [
                    'offset' => $offset,
                    'maxSize' => $chunkSize
                ]);
                $parsedBody = $response->getParsedBody();

                if (empty($parsedBody->list)) {
                    echo "No more data for $entity" . PHP_EOL;
                    $hasMore = false;
                } else {
                    echo "Received data for $entity: " . json_encode($parsedBody) . PHP_EOL;
                    foreach ($parsedBody->list as $item) {
                        $entityId = $item->id; // Assuming 'id' is the identifier field
                        $existingEntity = $entityManager->getEntityById($entity, $entityId);

                        if ($existingEntity) {
                            try {
                                $existingEntity->set( [
                                    'createdAt' => $item->createdAt ?? null,
                                    'modifiedAt' => $item->modifiedAt ?? null,
                                    'jesenoLead' => $item->jesenoLead ?? null,
                                ]);
                                $entityManager->saveEntity($existingEntity, ['import' => true]);

                                echo "Updated $entity with ID: " . $existingEntity->getId() . PHP_EOL;
                            } catch (Exception $e) {
                                echo "Error creating $entity: " . $e->getMessage() . PHP_EOL;
                            }
                        } else {
                            echo "Entity not found with ID: $entityId" . PHP_EOL;
                        }
                    }
                    $offset += $chunkSize;
                }
            } catch (ResponseError $e) {
                echo "Error downloading $entity: " . $e->getMessage() . PHP_EOL;
                $hasMore = false;
            }
        }
    }
}

downloadAndCreateEntities($client, $entityManager, $entities);

echo "Download and creation process completed." . PHP_EOL;