<?php

namespace Espo\Modules\AccountingCz\Api;

use Espo\Core\Acl;
use Espo\Core\Api\Action;
use Espo\Core\Api\Request;
use Espo\Core\Api\Response;
use Espo\Core\Api\ResponseComposer;
use Espo\Core\Exceptions\BadRequest;
use Espo\Core\Exceptions\Forbidden;
use Espo\Core\Exceptions\NotFound;
use Espo\Core\Field\Date;
use Espo\Core\ORM\EntityManager;
use Espo\Modules\AccountingCz\Tools\Isdoc\Isdoc as IsdocTool;
use Espo\Core\MassAction\QueryBuilder;
use Espo\Core\Utils\File\MimeType;
use Espo\Entities\Attachment;
use Espo\Core\FileStorage\Manager as FileStorageManager;
use Espo\Core\ORM\Repository\Option\SaveOption;
use Espo\Entities\User;
use Espo\ORM\Entity;
use Isdoc\Invoice as IsdocInvoice;

class ExportToIsdoc implements Action
{
    public function __construct(
        private readonly EntityManager $entityManager,
        private readonly IsdocTool $isdoc,
        private readonly QueryBuilder $queryBuilder,
        private readonly MimeType $mimeType,
        private readonly FileStorageManager $fileStorageManager,
        private readonly User $user,
        private readonly Acl $acl,
    ) {
    }

    public function process(Request $request): Response
    {
        $entityType = $request->getQueryParam("entityType") ?? throw new BadRequest("Missing entityType");
        $id = $request->getQueryParam("id") ?? throw new BadRequest("Missing id");

        $entity = $this->entityManager->getEntityById($entityType, $id);

        if(!$entity) {
            throw new NotFound("Entity not found");
        }

        if(!$this->acl->checkEntityRead($entity)) {
            throw new Forbidden();
        }

        $isdoc = $this->isdoc->convertToIsdoc($entity);

        $attachment = $this->createAttachment(
           $this->createName($entity) . ".isdoc",
            $isdoc
        );

        return ResponseComposer::json([
            "attachmentId" => $attachment->getId(),
        ]);
    }

    private function createName(Entity $entity): string {
        $name = $entity->get("number")
            ?? $entity->get("name")
            ?? $entity->getEntityType();

        $now = Date::createToday()->getString();

        $name = "$name-$now";

        return $name;
    }

    private function createAttachment(
        string $name,
        IsdocInvoice $isdoc
    ): Attachment {
        $isdocStr = $isdoc->toString();

        $attachment = $this->entityManager->getRepositoryByClass(Attachment::class)->getNew();

        $attachment
            ->setRole(Attachment::ROLE_EXPORT_FILE)
            ->setSize(strlen($isdocStr))
            ->setName($name)
            ->setType("application/isdoc");

        $this->entityManager->saveEntity($attachment, [
            SaveOption::CREATED_BY_ID => $this->user->getId(),
        ]);

        $this->fileStorageManager->putContents($attachment, $isdocStr);

        return $attachment;
    }
}
