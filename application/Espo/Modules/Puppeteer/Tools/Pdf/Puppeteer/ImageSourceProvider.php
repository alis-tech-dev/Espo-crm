<?php

namespace Espo\Modules\Puppeteer\Tools\Pdf\Puppeteer;

use Espo\Core\Exceptions\Forbidden;
use Espo\Core\FileStorage\Manager as FileStorageManager;
use Espo\Entities\Attachment;
use Espo\ORM\EntityManager;
use Espo\Tools\Attachment\Checker;

// @TODO: Make use of inheritance after Dompdf release.
class ImageSourceProvider
{
    public function __construct(
        private readonly EntityManager $entityManager,
        private readonly Checker $checker,
        private readonly FileStorageManager $fileStorageManager,
    ) {
    }

    public function get(string $id): ?string
    {
        /** @var Attachment $attachment */
        $attachment = $this->entityManager->getEntityById(Attachment::ENTITY_TYPE, $id);

        if (!$attachment) {
            return null;
        }

        try {
            $this->checker->checkTypeImage($attachment);
        } catch (Forbidden) {
            return null;
        }

        $type = $attachment->getType();

        if (!$type) {
            return null;
        }

        $contents = $this->fileStorageManager->getContents($attachment);

        return 'data:' . $type . ';base64,' . base64_encode($contents);
    }
}
