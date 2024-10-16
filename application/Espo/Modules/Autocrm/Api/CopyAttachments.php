<?php

namespace Espo\Modules\Autocrm\Api;

use Espo\Core\Api\Action;
use Espo\Core\Api\Request;
use Espo\Core\Api\Response;
use Espo\Core\Exceptions\BadRequest;
use Espo\Core\Exceptions\Forbidden;
use Espo\Core\Exceptions\NotFound;
use Espo\Core\Acl;
use Espo\Core\ORM\EntityManager;
use Espo\Core\Utils\File\Manager as FileManager;
use Espo\Core\Api\ResponseComposer;
use Espo\Core\Utils\Metadata;

class CopyAttachments implements Action
{
    public function __construct(
        private readonly Acl $acl,
        private readonly EntityManager $entityManager,
        private readonly FileManager $fileManager,
        private readonly Metadata $metadata
    ) {
    }

    public function process(Request $request): Response
    {
        $data = $request->getParsedBody();

        if (empty($data->ids) || !is_array($data->ids)) {
            throw new BadRequest('No attachment IDs provided');
        }

        if (empty($data->parentType)) {
            throw new BadRequest('No parent type provided');
        }

        $attachmentField = $data->attachmentField ?? throw new BadRequest('No attachment field provided');

        // Check if the user has access to create attachments
        if (!$this->acl->check('Attachment', 'create')) {
            throw new Forbidden('No create access for Attachments');
        }

        // Verify the field type
        $fieldType = $this->metadata->get(['entityDefs', $data->parentType, 'fields', $attachmentField, 'type']);
        if ($fieldType !== 'attachmentMultiple') {
            throw new BadRequest('The specified field is not of type attachmentMultiple');
        }

        $copiedAttachments = [];
        $copiedAttachmentsNames = [];

        /** @var \Espo\Repositories\Attachment $attachmentRepository */
        $attachmentRepository = $this->entityManager->getRepository('Attachment');

        if ($data->parentId) {
            // Branch when parent is not null
            $parentEntity = $this->entityManager->getEntity($data->parentType, $data->parentId);

            if (!$parentEntity) {
                throw new NotFound("Parent entity not found");
            }

            foreach ($data->ids as $id) {
                $attachment = $this->entityManager->getEntity('Attachment', $id);

                if (!$attachment || !$this->acl->check($attachment, 'read')) {
                    continue;
                }

                $newAttachment = $attachmentRepository->getCopiedAttachment($attachment);
                $newAttachment->set('parentType', $data->parentType);
                $newAttachment->set('parentId', $data->parentId);
                $newAttachment->set('field', $attachmentField);

                $this->entityManager->saveEntity($newAttachment);

                $copiedAttachments[] = $newAttachment->getId();
                $copiedAttachmentsNames[$newAttachment->getId()] = $newAttachment->get('name');

                $parentEntity->addLinkMultipleId($attachmentField, $newAttachment->getId());
            }

            $this->entityManager->saveEntity($parentEntity);
        } else {
            // Branch when parent is null
            foreach ($data->ids as $id) {
                $attachment = $this->entityManager->getEntity('Attachment', $id);

                if (!$attachment || !$this->acl->check($attachment, 'read')) {
                    continue;
                }

                $newAttachment = $attachmentRepository->getCopiedAttachment($attachment);
                $newAttachment->set('parentType', $data->parentType);
                $newAttachment->set('parentId', null);
                $newAttachment->set('field', $attachmentField);

                $this->entityManager->saveEntity($newAttachment);

                $copiedAttachments[] = $newAttachment->getId();
                $copiedAttachmentsNames[$newAttachment->getId()] = $newAttachment->get('name');
            }
        }

        $response = [
            $attachmentField . 'Ids' => $copiedAttachments,
            $attachmentField . 'Names' => $copiedAttachmentsNames,
        ];

        return ResponseComposer::json($response);
    }
}
