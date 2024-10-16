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

// File to store the newly created Product IDs
$idFile = __DIR__ . '/new_product_ids.txt';

function downloadAndCreateEntities($client, $entityManager, $idFile, $chunkSize = 200)
{
    $entity = 'Components'; // We're focusing on Component entities
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
                echo "Received data for $entity: " . count($parsedBody->list) . " items" . PHP_EOL;
                foreach ($parsedBody->list as $item) {
                    try {
                        $newProduct = $entityManager->getNewEntity('Product');
                        
                        // Field mapping will go here
                        $fieldMapping = [
                            // 'targetField' => 'sourceField',
                        ];

                        foreach ($fieldMapping as $targetField => $sourceField) {
                            $newProduct->set($targetField, $item->$sourceField ?? null);
                        }

                        $newProduct->set('pricingType', 'No Price');
                        
                        $entityManager->saveEntity($newProduct);

                        $newId = $newProduct->getId();
                        echo "Created Product entity with ID: " . $newId . PHP_EOL;

                        // Append the new ID to the file
                        file_put_contents($idFile, $newId . PHP_EOL, FILE_APPEND);

                    } catch (Exception $e) {
                        echo "Error creating Product: " . $e->getMessage() . PHP_EOL;
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

// Clear the file before starting
file_put_contents($idFile, '');

downloadAndCreateEntities($client, $entityManager, $idFile);

echo "Download and creation process completed." . PHP_EOL;
echo "Newly created Product IDs have been saved to: " . $idFile . PHP_EOL;