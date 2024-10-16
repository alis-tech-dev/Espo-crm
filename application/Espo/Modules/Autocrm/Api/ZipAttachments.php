<?php

namespace Espo\Modules\Autocrm\Api;

use Espo\Core\Api\Action;
use Espo\Core\Api\Request;
use Espo\Core\Api\Response;
use Espo\Core\Api\ResponseComposer;
use Espo\Core\Exceptions\BadRequest;
use Espo\Core\ORM\EntityManager;
use Espo\Core\Utils\Metadata;
use Espo\Core\Utils\Util;
use Espo\Repositories\Attachment as AttachmentRepository;
use ZipStream\ZipStream;
use ZipStream\Option\Archive as ArchiveOptions;
use ReflectionClass;
use Espo\Entities\Attachment;

class ZipAttachments implements Action
{
    private AttachmentRepository $attachmentRepository;

    public function __construct(
        private readonly EntityManager $entityManager,
        private readonly Metadata $metadata
    ) {
        // AttachmentRepository can't be injected directly because the constructor needs an 'entityType' parameter
        $this->attachmentRepository = $this->entityManager->getRepository('Attachment');
    }

    public function process(Request $request): Response
    {
        $ids = $request->getQueryParam('ids');
        $field = $request->getQueryParam('field');
        $entityType = $request->getQueryParam('entityType');

        if (!$ids) {
            throw new BadRequest("Missing required parameter: ids");
        }
        if (!$field) {
            throw new BadRequest("Missing required parameter: field");
        }
        if (!$entityType) {
            throw new BadRequest("Missing required parameter: entityType");
        }

        $ids = explode(',', $ids);

        $fieldType = $this->metadata->get(['entityDefs', $entityType, 'fields', $field, 'type']);

        if ($fieldType !== 'file' && $fieldType !== 'attachmentMultiple') {
            throw new BadRequest("Invalid field type");
        }

        $zipFileName = 'attachments.zip';

        $response = ResponseComposer::empty()
            ->setHeader('Content-Type', 'application/zip')
            ->setHeader('Content-Disposition', 'attachment; filename="' . $zipFileName . '"');

        $resource = fopen('php://temp', 'r+');

        if ($resource === false) {
            throw new \RuntimeException('Failed to create temporary resource');
        }

        $zip = $this->createZipStream($zipFileName, $resource);

        $attachmentFound = false;

        foreach ($ids as $id) {
            $entity = $this->entityManager->getEntity($entityType, $id);

            if (!$entity) {
                continue;
            }

            if ($fieldType === 'file') {
                $attachment = $entity->get($field);

                if ($attachment) {
                    $this->addAttachmentToZip($zip, $attachment);
                    $attachmentFound = true;
                }
            } elseif ($fieldType === 'attachmentMultiple') {
                $attachments = $entity->get($field);

                if ($attachments) {
                    foreach ($attachments as $attachment) {
                        $this->addAttachmentToZip($zip, $attachment);
                        $attachmentFound = true;
                    }
                }
            }
        }

        if (!$attachmentFound) {
            throw new BadRequest("No attachments found in any of the entity fields");
        }

        $zip->finish();

        rewind($resource);
        $zipContent = stream_get_contents($resource);
        fclose($resource);

        return $response
            ->setHeader('Content-Length', strlen($zipContent))
            ->writeBody($zipContent);
    }

    private function addAttachmentToZip(ZipStream $zip, Attachment $attachment)
    {
        $contents = $this->attachmentRepository->getContents($attachment);
        $fileName = $attachment->get('name');
        $fileName = Util::sanitizeFileName($fileName);

        $zip->addFile($fileName, $contents);
    }

    /**
     * Creates a ZipStream instance using reflection to handle different versions of the ZipStream library.
     * 
     * This method uses reflection to determine the correct way to instantiate the ZipStream class,
     * as different versions of the library have different constructor signatures. This approach
     * ensures compatibility with both older and newer versions of the ZipStream library without
     * requiring code changes when the library is updated.
     *
     * @param string $outputName The name of the output zip file.
     * @param resource $outputStream The output stream to write the zip file to.
     * @return ZipStream The created ZipStream instance.
     */
    private function createZipStream(string $outputName, $outputStream): ZipStream
    {
        $reflection = new ReflectionClass(ZipStream::class);
        $constructor = $reflection->getConstructor();
        $parameters = $constructor->getParameters();

        if (count($parameters) === 1 && $parameters[0]->getName() === 'opt') {
            // New version
            return new ZipStream(outputName: $outputName, outputStream: $outputStream);
        } else {
            // Old version

            $options = new ArchiveOptions();
            $options->setOutputStream($outputStream);
            return new ZipStream($outputName, $options);
        }
    }
}
