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

function downloadAndCreateEntities($client, $entityManager, $entities, $chunkSize = 200)
{
    foreach ($entities as $entity) {
        $localEntity = 'SalesOrder';

        echo "Starting download for entity: $entity" . PHP_EOL;
        $offset = 0;
        $hasMore = true;

        while ($hasMore) {
            try {
                echo "Requesting $entity with offset $offset and chunk size $chunkSize" . PHP_EOL;
                $response = $client->request(Client::METHOD_GET, $entity, [
                    'offset' => $offset,
                    'maxSize' => $chunkSize,
                    'select' => 'id,documentsIds'
                ]);
                $parsedBody = $response->getParsedBody();

                if (empty($parsedBody->list)) {
                    echo "No more data for $entity" . PHP_EOL;
                    $hasMore = false;
                } else {
                    foreach ($parsedBody->list as $item) {
                        $salesOrder = $entityManager
                            ->getRDBRepository($localEntity)
                            ->where('id', $item->id)
                            ->findOne();

                        if ($salesOrder) {
                            processDocuments($client, $entityManager, $salesOrder, $item->documentsIds);
                        } else {
                            echo "SalesOrder not found for ID: {$item->id}" . PHP_EOL;
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

function processDocuments($client, $entityManager, $salesOrder, $documentIds)
{
    if (empty($documentIds)) {
        echo "No documents for SalesOrder ID: {$salesOrder->getId()}" . PHP_EOL;
        return;
    }

    foreach ($documentIds as $documentId) {
        try {
            $response = $client->request(Client::METHOD_GET, "Document/$documentId", [
                'select' => 'id,name,obrazekDokumentuId,fileIds'
            ]);
            $document = $response->getParsedBody();

            $localDocument = $entityManager->getNewEntity('Document');
            $localDocument->set('name', $document->name);
            $localDocument->set('salesOrderId', $salesOrder->getId());

            $entityManager->saveEntity($localDocument);
                
            $entityManager
                ->getRDBRepository('SalesOrder')
                ->getRelation($salesOrder, 'documents')
                ->relate($localDocument);
    
            // Process 'obrazekDokumentu' (single attachment)
            if (!empty($document->obrazekDokumentuId)) {
                processDocumentAttachment($client, $entityManager, $localDocument, $document->obrazekDokumentuId, 'obrazekDokumentu');
            }

            // Process 'file' (multiple attachments)
            if (!empty($document->fileIds)) {
                foreach ($document->fileIds as $fileId) {
                    processDocumentAttachment($client, $entityManager, $localDocument, $fileId, 'files');
                }
            }

            echo "Document processed for SalesOrder ID: {$salesOrder->getId()}" . PHP_EOL;
        } catch (ResponseError $e) {
            echo "Error processing document ID $documentId for SalesOrder ID {$salesOrder->getId()}: " . $e->getMessage() . PHP_EOL;
        }
    }
}

function processDocumentAttachment($client, $entityManager, $document, $attachmentId, $field)
{
    $contents = $client->request(Client::METHOD_GET, "Attachment/file/$attachmentId")->getBodyPart();

    if (!is_null($contents)) {
        $attributes = (array)$client->request(Client::METHOD_GET, "Attachment/$attachmentId")->getParsedBody();

        unset($attributes['id']);
        $attributes['field'] = $field;
        $attributes['contents'] = $contents;
        $attributes['parentId'] = $document->getId();
        $attributes['parentType'] = 'Document';
        
        $attachment = $entityManager->createEntity('Attachment', $attributes);
        
        $entityManager
            ->getRDBRepository('Document')
            ->getRelation($document, $field)
            ->relate($attachment);
        
        echo "Attachment '$field' processed for Document ID: {$document->getId()}" . PHP_EOL;
    } else {
        echo "No contents for $field attachment, Document ID: {$document->getId()}" . PHP_EOL;
    }
}

downloadAndCreateEntities($client, $entityManager, $entities);

echo "Download and creation process completed." . PHP_EOL;