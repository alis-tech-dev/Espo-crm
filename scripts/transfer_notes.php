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

$logFile = __DIR__ . '/port_notes_log.log';

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

function portNotes($client, $entityManager, $chunkSize = 200)
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
                'select' => 'id'
            ]);
            $parsedBody = $response->getParsedBody();

            if (empty($parsedBody->list)) {
                writeLog("No more data for BusinessProjects");
                $hasMore = false;
            } else {
                foreach ($parsedBody->list as $item) {
                    $businessProjectId = $item->id;
                    $salesOrder = $entityManager->getEntityById('SalesOrder', $businessProjectId);

                    if (!$salesOrder) {
                        writeLog("Warning: SalesOrder not found with ID: $businessProjectId");
                        continue;
                    }

                    // Fetch notes for this BusinessProject
                    try {
                        $notesResponse = $client->request(Client::METHOD_GET, "BusinessProject/$businessProjectId/stream", [
                            'orderBy' => 'createdAt',
                            'order' => 'ASC',
                            'maxSize' => 1000 // Adjust this value if needed
                        ]);
                        $notes = $notesResponse->getParsedBody()->list;

                        foreach ($notes as $note) {
                            $existingNote = $entityManager->getRepository('Note')->where([
                                'relatedId' => $businessProjectId,
                                'relatedType' => 'SalesOrder',
                                'createdAt' => $note->createdAt
                            ])->findOne();

                            if (!$existingNote) {
                                $newNote = $entityManager->getEntity('Note');
                                $newNote->set([
                                    'type' => $note->type,
                                    'post' => $note->post,
                                    'data' => $note->data,
                                    'parentId' => $salesOrder->getId(),
                                    'parentType' => 'SalesOrder',
                                    'relatedId' => $salesOrder->getId(),
                                    'relatedType' => 'SalesOrder',
                                    'createdAt' => $note->createdAt,
                                    'modifiedAt' => $note->modifiedAt,
                                    'isGlobal' => $note->isGlobal ?? false,
                                    'isInternal' => $note->isInternal ?? false,
                                ]);

                                // Set created by and modified by users
                                $createdByUsername = fetchRemoteUser($client, $note->createdById);
                                $modifiedByUsername = fetchRemoteUser($client, $note->modifiedById);

                                if ($createdByUsername && isset($usernameToIdMap[$createdByUsername])) {
                                    $newNote->set('createdById', $usernameToIdMap[$createdByUsername]);
                                }
                                if ($modifiedByUsername && isset($usernameToIdMap[$modifiedByUsername])) {
                                    $newNote->set('modifiedById', $usernameToIdMap[$modifiedByUsername]);
                                }

                                $entityManager->saveEntity($newNote, ['import' => true]);
                                writeLog("Created new Note for SalesOrder $businessProjectId");
                            } else {
                                writeLog("Note already exists for SalesOrder $businessProjectId, created at " . $note->createdAt);
                            }
                        }
                    } catch (ResponseError $e) {
                        writeLog("Error fetching notes for BusinessProject $businessProjectId: " . $e->getMessage());
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

portNotes($client, $entityManager);

writeLog("Note porting process completed.");