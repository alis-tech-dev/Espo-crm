<?php

namespace Espo\Modules\OnlyOffice\Tools\OnlyOffice;

use Espo\Core\Acl\Table;
use Espo\Core\Exceptions\BadRequest;
use Espo\Core\Exceptions\Error;
use Espo\Core\Exceptions\Forbidden;
use Espo\Core\Exceptions\NotFoundSilent;
use Espo\Core\FileStorage\Manager as FileStorageManager;
use Espo\Core\Utils\Crypt;
use Espo\Core\Utils\Json;
use Espo\Core\AclManager;
use Espo\Entities\Attachment;
use Espo\Modules\Crm\Entities\Document;
use Espo\Entities\User;
use Espo\ORM\EntityManager;
use JsonException;
use stdClass;

class Service
{

    public function __construct(
        protected readonly EntityManager      $entityManager,
        protected readonly AclManager         $aclManager,
        protected readonly FileStorageManager $fileStorageManager,
        protected readonly Crypt              $crypt,
        protected readonly Util               $util,
    ) {
    }

    /**
     * @throws BadRequest
     * @throws Forbidden
     * @throws NotFoundSilent
     * @throws JsonException
     */
    public function handleCallback(string $key, stdClass $data): stdClass
    {
        $responseJson = new stdClass;

        $responseJson->error = false;

        [$attachment, $user] = $this->getAttachmentAndUser($key);

        if (!empty($data->error)) {
            $responseJson['message'] = $data->error;
            return $responseJson;
        }

        $status = $this->util->getCallbackStatus($data->status);

        switch ($status) {
            case 'MustSave':
            case 'MustForceSave':
                if (!$this->aclManager->checkEntity($user, $attachment, Table::ACTION_EDIT)) {
                    throw new Forbidden();
                }

                $this->save($data->url, $attachment);
                break;
            case 'Editing':
            case 'Corrupted':
            case 'Closed':
            case 'NotFound':
            case 'CorruptedForceSave':
        }

        return $responseJson;
    }

    /**
     * @throws Forbidden
     * @throws JsonException
     * @throws NotFoundSilent
     * @throws Error
     */
    public function handleOpenDocument(string $documentId, User $user): stdClass
    {
        /** @var Document $document */
        $document = $this
            ->entityManager
            ->getEntityById('Document', $documentId)
            ?? throw new NotFoundSilent();

        $attachmentId = $document->get('fileId');

        // Support for multiple files
        if (!$attachmentId && $this->entityManager->getDefs()->getEntity('Document')->hasField('files')) {
            $document->loadLinkMultipleField('files');
            $attachmentId = $document->get('filesIds')[0];
        }

        /** @var Attachment $attachment */
        $attachment = $this
            ->entityManager
            ->getEntityById('Attachment', $attachmentId)
            ?? throw new NotFoundSilent();

        if (!$this->aclManager->checkEntity($user, $attachment)) {
            throw new Forbidden();
        }

        $actualKey = $this->util->getActualKey($attachment);
        $key = $this->util->getFileKey($attachmentId, $user->getId());
        $type = $this->util->getOnlyOfficeType($attachment);
        $extension = $this->util->getExtension($attachment);

        if (!$type) {
            throw new Error();
        }

        return (object)[
            'actualKey' => $actualKey,
            'key' => $key,
            'type' => $type,
            'fileType' => $extension,
            'name' => $attachment->get('name'),
        ];
    }

    protected function save(string $url, Attachment $attachment): stdClass
    {
        $result = new stdClass;
        $result->error = false;

        $new_data = file_get_contents($url);
        if ($new_data === false) {
            $result->error = true;
        }
        $this->fileStorageManager->putContents($attachment, $new_data);
        $size = $this->fileStorageManager->getSize($attachment);

        $attachment->set('modifiedAt', 0);
        $attachment->set('size', $size);

        $this->entityManager->saveEntity($attachment);

        return $result;
    }

    /**
     * @throws BadRequest
     * @throws Forbidden
     * @throws NotFoundSilent
     * @throws JsonException
     */
    public function processGetFile(string $data): OpenFileResult
    {
        [$attachment,] = $this->getAttachmentAndUser($data);

        $stream = $this->fileStorageManager->getStream($attachment);

        $outputFileName = $this->util->sanitizeFileName($attachment->get('name'));

        $size = $stream->getSize() ?? $this->fileStorageManager->getSize($attachment);

        $mimeType = $attachment->get('type');

        return new OpenFileResult($stream, $outputFileName, $size, $mimeType);
    }

    /**
     * @throws NotFoundSilent
     * @throws Forbidden
     * @throws BadRequest
     * @throws JsonException
     */

    protected function getAttachmentAndUser(string $data): array
    {
        $decryptedData = Json::decode($this->util->decrypt($data));

        $attachId = $decryptedData->attachment_id;
        $userId = $decryptedData->user_id;

        if (!$attachId) {
            throw new BadRequest();
        }
        /** @var Attachment $attachment */
        $attachment = $this->entityManager->getEntity('Attachment', $attachId);

        if (!$attachment) {
            throw new NotFoundSilent();
        }
        /** @var User $user */
        $user = $this->entityManager->getEntity('User', $userId);

        if (!$user) {
            throw new BadRequest();
        }

        if (!$this->aclManager->checkEntity($user, $attachment)) {
            throw new Forbidden();
        }

        return [
            $attachment,
            $user,
        ];
    }
}
