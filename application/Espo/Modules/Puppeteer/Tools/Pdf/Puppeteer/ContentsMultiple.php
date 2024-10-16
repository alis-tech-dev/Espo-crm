<?php

namespace Espo\Modules\Puppeteer\Tools\Pdf\Puppeteer;

use Espo\Tools\Pdf\Contents as ContentsInterface;
use GuzzleHttp\Psr7\Stream;
use Jurosh\PDFMerge\PDFMerger;
use Psr\Http\Message\StreamInterface;
use RuntimeException;

class ContentsMultiple implements ContentsInterface
{
    private ?string $contents = null;

    public function __construct(
        private readonly PDFMerger $merger,
    ) {
    }

    /**
     * @throws \Exception
     */
    public function getStream(): StreamInterface
    {
        $resource = fopen('php://temp', 'r+');

        if ($resource === false) {
            throw new RuntimeException("Could not open temp.");
        }

        fwrite($resource, $this->getString());
        rewind($resource);

        return new Stream($resource);
    }

    /**
     * @throws \Exception
     */
    public function getString(): string
    {
        return $this->getContents();
    }

    /**
     * @throws \Exception
     */
    public function getLength(): int
    {
        return strlen($this->getContents());
    }

    /**
     * @throws \Exception
     */
    private function getContents(): string
    {
        if ($this->contents === null) {
            $this->contents = $this->merger->merge('string');
        }

        return $this->contents;
    }
}
