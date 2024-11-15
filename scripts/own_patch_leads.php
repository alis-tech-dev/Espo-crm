<?php

require __DIR__ . '/vendor/autoload.php';

use Espo\ApiClient\Client;
use Espo\ApiClient\Exception\ResponseError;
use Espo\Core\Application;
use Espo\ORM\EntityManager;

$client = new Client('https://www.alis-is.com');
$client->setApiKey('46035f8976a09f645e5d73d64540ae39');

require dirname(__DIR__) . '/bootstrap.php';

$app = new Application();
$app->setupSystemUser();

/** @var EntityManager */
$entityManager = $app->getContainer()->get('entityManager');

$entities = [
    "Lead",
    "User",
    "User_data",
    "EmailUser",
    "EntityUser",
    "Document",
    "Attachment",
];

wipe_all(
    "lead"
);

echo "Wiped all... \n";

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
                    'maxSize' => $chunkSize,
                ]);
                $parsedBody = $response->getParsedBody();
                if (empty($parsedBody->list)) {
                    echo "No more data for $entity" . PHP_EOL;
                    $hasMore = false;
                } else {
                    foreach ($parsedBody->list as $item) {
                        $existingEntity = $entityManager->getRDBRepository($entity)
                            ->where('id', $item->id)
                            ->findOne();

                        if ($existingEntity) {
                            try {
                                if ($item == "User" && $item->get('isActive') == 0) {
                                    $username = $item->get('username');
                                    $existingEntity->set('isActive', 1);
                                    $existingEntity->set('userName', $username . '_a');
                                } else {
                                    foreach ($item as $key => $value) {
                                        echo "Setting $key to $value \n" . PHP_EOL;
                                        $existingEntity->set($key, $value);
                                    }
                                }
                                $entityManager->saveEntity($existingEntity);

                                echo "Updated $entity with name: " . $existingEntity->get('name') . PHP_EOL;
                            } catch (Exception $e) {
                                echo "Error creating $entity: " . $e->getMessage() . PHP_EOL;
                            }
                        } else {
                            echo "Creating lead with name: $item->accountName" . PHP_EOL;
                            $newEntity = $entityManager->createEntity($entity);
                            if ($item == "User") {
                                    $username = $item->get('username');
                                    $newEntity->set('isActive', 1);
                                    $newEntity->set('userName', $username . '_a');
                                }
                            foreach ($item as $key => $value) {
                                if ($key != 'id') {
                                    $newEntity->set($key, $value);
                                }
                            }
                            $entityManager->saveEntity($newEntity);
                            $id = $newEntity->getId();
                            $name = $newEntity->get('accountName');
                            echo "name: $name\n";
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
function wipe_all(...$entities): void
{
    /** @var EntityManager */
    global $entityManager;

    foreach ($entities as $entity) {
        $entityManager->getSqlExecutor()->execute("DELETE from ${entity}");
    }
}


downloadAndCreateEntities($client, $entityManager, $entities);

echo "Download and creation process completed." . PHP_EOL;