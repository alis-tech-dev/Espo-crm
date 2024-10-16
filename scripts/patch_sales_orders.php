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
    'BusinessProject'
];

$logFile = __DIR__ . '/log.log';

file_put_contents($logFile, '');

function writeLog($message) {
    global $logFile;
    $timestamp = date('Y-m-d H:i:s');
    file_put_contents($logFile, "[$timestamp] $message" . PHP_EOL, FILE_APPEND);
}

function downloadAndCreateEntities($client, $entityManager, $entities, $chunkSize = 200)
{
    foreach ($entities as $entity) {
        writeLog("Starting download for entity: $entity");
        $offset = 0;
        $hasMore = true;

        while ($hasMore) {
            try {
                writeLog("Requesting $entity with offset $offset and chunk size $chunkSize");
                $response = $client->request(Client::METHOD_GET, $entity, [
                    'offset' => $offset,
                    'maxSize' => $chunkSize,
                    'select' => 'id,name,bOnumber,account1Id,internDeadline,approvalDate,billingAdressStreet,billingAdressCity,billingAdressState,billingAdressCountry,billingAdressPostalCode'
                ]);
                $parsedBody = $response->getParsedBody();

                if (empty($parsedBody->list)) {
                    writeLog("No more data for $entity");
                    $hasMore = false;
                } else {
                    writeLog("Received data for $entity: " . json_encode($parsedBody));
                    foreach ($parsedBody->list as $item) {
                        $entityId = $item->id;
                        $existingEntity = $entityManager->getEntityById('SalesOrder', $entityId);

                        if ($existingEntity) {
                            try {
                                $existingEntity->set([
                                    'accountId' => $item->account1Id ?? null,
                                    'internalDeadline' => $item->internDeadline ?? null,
                                    'dateOrdered' => $item->approvalDate ?? null,   
                                    'name' => $item->name,
                                    'number' => $item->bOnumber,
                                    'billingAddressStreet' => $item->billingAdressStreet,
                                    'billingAddressCity' => $item->billingAdressCity,
                                    'billingAddressState' => $item->billingAdressState,
                                    'billingAddressCountry' => $item->billingAdressCountry,
                                    'billingAddressPostalCode' => $item->billingAdressPostalCode,
                                ]);

                                // Fetch quotes for this BusinessProject
                                $quotesResponse = $client->request(Client::METHOD_GET, "BusinessProject/{$entityId}/quotesBusiness", [
                                    'select' => 'id'
                                ]);
                                $quotes = $quotesResponse->getParsedBody()->list;

                                if (!empty($quotes)) {
                                    // Set the first quote as quoteId
                                    $existingEntity->set('quoteId', $quotes[0]->id);

                                    // Relate all quotes
                                    $quoteRepository = $entityManager->getRepository('Quote');
                                    foreach ($quotes as $quote) {
                                        $quoteEntity = $entityManager->getEntityById('Quote', $quote->id);
                                        
                                        if ($quoteEntity) {
                                            $entityManager->getRDBRepository('SalesOrder')
                                                ->getRelation($existingEntity, 'quotes')
                                                ->relate($quoteEntity);
                                        }
                                    }
                                }

                                $entityManager->saveEntity($existingEntity, ['import' => true]);

                                writeLog("Updated $entity with ID: " . $existingEntity->getId());
                            } catch (Exception $e) {
                                writeLog("Error updating $entity: " . $e->getMessage());
                            }
                        } else {
                            writeLog("Entity not found with ID: $entityId");
                        }
                    }
                    $offset += $chunkSize;
                }
            } catch (ResponseError $e) {
                writeLog("Error downloading $entity: " . $e->getMessage());
                $hasMore = false;
            }
        }
    }
}

downloadAndCreateEntities($client, $entityManager, $entities);

writeLog("Download and creation process completed.");