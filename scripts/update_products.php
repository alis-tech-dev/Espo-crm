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
    'Component'
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
                    foreach ($parsedBody->list as $item) {
                        $product = $entityManager
                            ->getRDBRepository('Product')
                            ->where('productCode', $item->productCode)
                            ->findOne();

                        if ($product) {
                            // Update product fields here
                            $product->set([
                                'name' => $item->name,
                                // Add other fields you want to update
                            ]);

                            if ($item->imageId) {
                                $contents = $client->request(Client::METHOD_GET, 'Attachment/file/' . $item->imageId)->getBodyPart();

                                if (!is_null($contents)) {
                                    $attributes = (array)$client->request(Client::METHOD_GET, 'Attachment/' . $item->imageId)->getParsedBody();

                                    unset($attributes['id']);
                                    $attributes['field'] = 'image';
                                    $attributes['contents'] = $contents;
                                    $attributes['relatedId'] = $product->getId();
                                    
                                    $attachment = $entityManager->createEntity('Attachment', $attributes);
                                    
                                    $product->set('imageId', $attachment->getId());
                                    
                                    echo "Transferred image for Product: " . $product->getId() . PHP_EOL;
                                } else {
                                    echo "No contents for image of Product: " . $product->getId() . PHP_EOL;
                                }
                            } else {
                                echo "No image for Product: " . $product->getId() . PHP_EOL;
                            }

                            $product->set('productCode', $item->alisID);

                            $entityManager->saveEntity($product);
                            
                            echo "Updated Product: " . $product->getId() . PHP_EOL;
                        } else {
                            echo "No matching Product found for Component with productCode: " . $item->productCode . PHP_EOL;
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