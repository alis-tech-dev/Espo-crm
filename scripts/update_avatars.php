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

$logFile = __DIR__ . '/avatar_update_log.log';

function writeLog($message) {
    global $logFile;
    $timestamp = date('Y-m-d H:i:s');
    file_put_contents($logFile, "[$timestamp] $message" . PHP_EOL, FILE_APPEND);
}

function updateUserAvatars($client, $entityManager, $chunkSize = 50)
{
    writeLog("Starting user avatar update process");
    $offset = 0;
    $hasMore = true;

    while ($hasMore) {
        try {
            writeLog("Requesting users with offset $offset and chunk size $chunkSize");
            $response = $client->request(Client::METHOD_GET, 'User', [
                'offset' => $offset,
                'maxSize' => $chunkSize,
                'select' => 'id,userName,avatarId'
            ]);
            $parsedBody = $response->getParsedBody();

            if (empty($parsedBody->list)) {
                writeLog("No more users to process");
                $hasMore = false;
            } else {
                foreach ($parsedBody->list as $remoteUser) {
                    // Find local user by username instead of ID
                    $localUser = $entityManager->getRepository('User')
                        ->where(['userName' => $remoteUser->userName])
                        ->findOne();

                    if ($localUser) {
                        if (!empty($remoteUser->avatarId)) {
                            try {
                                // Download avatar from remote system
                                $avatarResponse = $client->request(Client::METHOD_GET, "Attachment/file/{$remoteUser->avatarId}");
                                $avatarContent = $avatarResponse->getBodyPart();

                                if ($avatarContent) {
                                    // Get avatar metadata
                                    $avatarMetadata = $client->request(Client::METHOD_GET, "Attachment/{$remoteUser->avatarId}")->getParsedBody();

                                    // Create new attachment for avatar
                                    $attachment = $entityManager->getNewEntity('Attachment');
                                    $attachment->set([
                                        'name' => $avatarMetadata->name,
                                        'type' => $avatarMetadata->type,
                                        'size' => strlen($avatarContent),
                                        'role' => 'Attachment',
                                        'relatedType' => 'User',
                                        'relatedId' => $localUser->getId(),
                                        'field' => 'avatar',
                                        'contents' => $avatarContent
                                    ]);
                                    $entityManager->saveEntity($attachment);

                                    // Update user's avatar
                                    $localUser->set('avatarId', $attachment->getId());
                                    $entityManager->saveEntity($localUser);

                                    writeLog("Updated avatar for user: {$localUser->get('userName')}");
                                } else {
                                    writeLog("No avatar content for user: {$localUser->get('userName')}");
                                }
                            } catch (Exception $e) {
                                writeLog("Error updating avatar for user {$localUser->get('userName')}: " . $e->getMessage());
                            }
                        } else {
                            writeLog("No avatar ID for user: {$localUser->get('userName')}");
                        }
                    } else {
                        writeLog("Local user not found for username: {$remoteUser->userName}");
                    }
                }
                $offset += $chunkSize;
            }
        } catch (ResponseError $e) {
            writeLog("Error fetching users: " . $e->getMessage());
            $hasMore = false;
        }
    }
}

updateUserAvatars($client, $entityManager);

writeLog("User avatar update process completed.");