<?php

namespace Espo\Modules\Puppeteer\Tools\Pdf\Puppeteer;

use Espo\Modules\Puppeteer\Tools\Pdf\Puppeteer\Contents as BrowsershotContents;
use Espo\Modules\Puppeteer\Tools\Pdf\Puppeteer\ContentsMultiple as BrowsershotContentsMultiple;
use Espo\ORM\Collection;
use Espo\Tools\Pdf\{
    CollectionPrinter as CollectionPrinterInterface,
    Contents,
    IdDataMap,
    Params,
    Template,
};
use Jurosh\PDFMerge\PDFMerger;
use Spatie\Browsershot\Browsershot;
use Spatie\Browsershot\Exceptions\HtmlIsNotAllowedToContainFile;

class CollectionPrinter implements CollectionPrinterInterface
{
    public function __construct(
        private readonly EntityProcessor $entityProcessor,
    ) {
    }

    /**
     * @throws HtmlIsNotAllowedToContainFile
     * @throws \Exception
     */
    public function print(Template $template, Collection $collection, Params $params, IdDataMap $idDataMap): Contents
    {
        $merger = new PDFMerger();

        foreach ($collection as $entity) {
            $data = $idDataMap->get($entity->getId());

            assert($data !== null);

            $browsershot = new Browsershot();

            $this->entityProcessor->processEntity($browsershot, $template, $entity, $params, $data);

            $contents = new BrowsershotContents($browsershot);

            $merger->addPDF(VarStream::createReference($contents->getStream()));
        }

        return new BrowsershotContentsMultiple($merger);
    }
}
