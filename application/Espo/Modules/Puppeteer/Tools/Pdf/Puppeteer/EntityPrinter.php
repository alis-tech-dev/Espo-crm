<?php

namespace Espo\Modules\Puppeteer\Tools\Pdf\Puppeteer;

use Espo\Modules\Puppeteer\Tools\Pdf\Puppeteer\Contents as BrowsershotContents;
use Espo\ORM\Entity;
use Espo\Tools\Pdf\{
    Contents,
    Data,
    EntityPrinter as EntityPrinterInterface,
    Params,
    Template
};
use Spatie\Browsershot\Browsershot;
use Spatie\Browsershot\Exceptions\HtmlIsNotAllowedToContainFile;

class EntityPrinter implements EntityPrinterInterface
{
    public function __construct(
        private readonly EntityProcessor $entityProcessor,
    ) {
    }

    /**
     * @throws HtmlIsNotAllowedToContainFile
     */
    public function print(Template $template, Entity $entity, Params $params, Data $data): Contents
    {
        $browsershot = new Browsershot();

        $this->entityProcessor->processEntity($browsershot, $template, $entity, $params, $data);

        return new BrowsershotContents($browsershot);
    }
}
