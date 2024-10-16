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

$logFile = __DIR__ . '/update_users_log.log';

file_put_contents($logFile, '');

function writeLog($message) {
    global $logFile;
    $timestamp = date('Y-m-d H:i:s');
    file_put_contents($logFile, "[$timestamp] $message" . PHP_EOL, FILE_APPEND);
}

function fetchRemoteUser($client, $userId) {
    if (!$userId) return null;
    try {
        $userResponse = $client->request(Client::METHOD_GET, "User/$userId", [
            'select' => 'userName'
        ]);
        $userData = $userResponse->getParsedBody();
        return $userData->userName;
    } catch (ResponseError $e) {
        writeLog("Error fetching user details for ID $userId: " . $e->getMessage());
        return null;
    }
}

function updateUsers($client, $entityManager, $chunkSize = 200)
{
    $offset = 0;
    $hasMore = true;

    // Fetch all users from the local instance
    $localUsers = $entityManager->getRepository('User')->find();
    $usernameToIdMap = [];
    foreach ($localUsers as $user) {
        $usernameToIdMap[$user->get('userName')] = $user->getId();
    }

    while ($hasMore) {
        try {
            writeLog("Requesting BusinessProjects with offset $offset and chunk size $chunkSize");
            $response = $client->request(Client::METHOD_GET, 'BusinessProject', [
                'offset' => $offset,
                'maxSize' => $chunkSize,
                'select' => 'id,assignedUserId,createdById,modifiedById'
            ]);
            $parsedBody = $response->getParsedBody();

            if (empty($parsedBody->list)) {
                writeLog("No more data for BusinessProjects");
                $hasMore = false;
            } else {
                foreach ($parsedBody->list as $item) {
                    $salesOrderId = $item->id;
                    $salesOrder = $entityManager->getEntityById('SalesOrder', $salesOrderId);

                    if (!$salesOrder) {
                        writeLog("Warning: SalesOrder not found with ID: $salesOrderId");
                        continue;
                    }

                    $fieldsToUpdate = ['assignedUserId', 'createdById', 'modifiedById'];
                    $updated = false;

                    foreach ($fieldsToUpdate as $field) {
                        $remoteUserId = $item->$field;
                        if ($remoteUserId) {
                            $remoteUserName = fetchRemoteUser($client, $remoteUserId);
                            if ($remoteUserName && isset($usernameToIdMap[$remoteUserName])) {
                                $localUserId = $usernameToIdMap[$remoteUserName];
                                if ($salesOrder->get($field) !== $localUserId) {
                                    $salesOrder->set($field, $localUserId);
                                    $updated = true;
                                    writeLog("Updated SalesOrder $salesOrderId: $field set to user $remoteUserName (ID: $localUserId)");
                                }
                            } else {
                                writeLog("Warning: User not found in local instance for SalesOrder $salesOrderId, field $field");
                            }
                        }
                    }

                    if ($updated) {
                        $entityManager->saveEntity($salesOrder, ['import' => true]);
                    }
                }
                $offset += $chunkSize;
            }
        } catch (ResponseError $e) {
            writeLog("Error fetching BusinessProjects: " . $e->getMessage());
            $hasMore = false;
        }
    }
}

updateUsers($client, $entityManager);

writeLog("User update process completed.");