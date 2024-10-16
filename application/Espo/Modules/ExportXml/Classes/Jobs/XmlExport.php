<?php

namespace Espo\Modules\ExportXml\Classes\Jobs;

use Espo\Core\Job\JobDataLess;
use Espo\Core\Utils\File\Manager as FileManager;
use Espo\Modules\ExportXml\Tools\Xml\Service as XmlService;
use Espo\ORM\EntityManager;

class XmlExport implements JobDataLess
{

    public function __construct(
        private readonly EntityManager $entityManager,
        private readonly FileManager $fileManager,
        private readonly XmlService $xmlService
    ) {
    }

    public function run(): void
    {

    }

}
