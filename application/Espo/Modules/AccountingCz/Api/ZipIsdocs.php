<?php

namespace Espo\Modules\AccountingCz\Api;

use Espo\Core\Acl;
use Espo\Core\Acl\Table;
use Espo\Core\Api\Action;
use Espo\Core\Api\Request;
use Espo\Core\Api\Response;
use Espo\Core\Api\ResponseComposer;
use Espo\Core\Exceptions\BadRequest;
use Espo\Core\Exceptions\Forbidden;
use Espo\Core\ORM\EntityManager;
use Espo\Modules\AccountingCz\Tools\Isdoc\Isdoc;
use Espo\Core\MassAction\Params;
use Espo\Core\MassAction\QueryBuilder;
use Espo\Core\Utils\File\MimeType;
use Espo\Entities\Attachment;
use ZipStream\ZipStream;
use ZipStream\Option\Archive as ArchiveOptions;
use Espo\Core\FileStorage\Manager as FileStorageManager;
use Espo\Core\ORM\Repository\Option\SaveOption;
use Espo\Entities\User;
use GuzzleHttp\Psr7\Stream;
use Espo\Core\Field\Date;
use Espo\Core\Utils\Json;
use Espo\Core\Utils\Util;
use Espo\Modules\Accounting\Entities\Invoice;

use stdClass;

class ZipIsdocs implements Action
{
    public function __construct(
        private readonly EntityManager $entityManager,
        private readonly Isdoc $isdoc,
        private readonly QueryBuilder $queryBuilder,
        private readonly MimeType $mimeType,
        private readonly FileStorageManager $fileStorageManager,
        private readonly User $user,
        private readonly Acl $acl,
    ) {
    }

    public function process(Request $request): Response
    {
        if (!$this->acl->checkScope(Invoice::ENTITY_TYPE, Table::ACTION_READ)) {
            throw new Forbidden();
        }

        $body = $request->getParsedBody();

        $params = Params::fromRaw(
            $this->prepareMassActionParams($body->params ?? null),
            $body->entityType ?? null
        );

        $stream = $this->zipIsdocs($params);

        $now = Date::createToday()->getString();

        $attachment = $this->createAttachment(
            "Isdoc-{$now}.zip",
            $this->mimeType->getMimeTypeByExtension("zip"),
            $stream
        );

        return ResponseComposer::json([
            "attachmentId" => $attachment->getId(),
        ]);
    }

    private function prepareMassActionParams(stdClass $data): array
    {
        $where = $data->where ?? null;
        $searchParams = $data->searchParams ?? $data->selectData ?? null;
        $ids = $data->ids ?? null;

        if (!is_null($where) || !is_null($searchParams)) {
            $params = [];

            if (!is_null($where)) {
                $params['where'] = json_decode(Json::encode($where), true);
            }

            if (!is_null($searchParams)) {
                $params['searchParams'] = json_decode(Json::encode($searchParams), true);
            }

            return $params;
        }

        if (is_null($ids)) {
            throw new BadRequest("Bad search params for mass action.");
        }

        return ['ids' => $ids];
    }

    private function zipIsdocs(Params $params): Stream
    {
        $query = $this->queryBuilder->build($params);

        $collection = $this->entityManager->getRDBRepository($params->getEntityType())
            ->clone($query)
            ->sth()
            ->find();

        $resource = fopen('php://temp', 'r+');

        if ($resource === false) {
            throw new \RuntimeException('Failed to create temporary resource');
        }

        $options = new ArchiveOptions();
        $options->setOutputStream($resource);

        $zip = new ZipStream(opt: $options);

        foreach ($collection as $invoice) {
            $isdoc = $this->isdoc->convertToIsdoc($invoice);

            $identifier = $invoice->get("number") ?? $invoice->getId();
            $fileName = Util::sanitizeFileName($identifier . '.isdoc');

            $zip->addFile($fileName, $isdoc->toString());
        }

        $zip->finish();

        $stream = new Stream($resource);
        $stream->seek(0);

        return $stream;
    }

    private function createAttachment(
        string $name,
        string $type,
        Stream $stream
    ): Attachment {
        $attachment = $this->entityManager->getRepositoryByClass(Attachment::class)->getNew();

        $attachment
            ->setRole(Attachment::ROLE_EXPORT_FILE)
            ->setSize($stream->getSize())
            ->setName($name)
            ->setType($type);

        $this->entityManager->saveEntity($attachment, [
            SaveOption::CREATED_BY_ID => $this->user->getId(),
        ]);

        $this->fileStorageManager->putStream($attachment, $stream);

        return $attachment;
    }
}
