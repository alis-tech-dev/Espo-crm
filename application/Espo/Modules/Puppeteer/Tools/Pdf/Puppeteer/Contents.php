<?php

namespace Espo\Modules\Puppeteer\Tools\Pdf\Puppeteer;

use Espo\Tools\Pdf\Contents as ContentsInterface;
use GuzzleHttp\Psr7\Stream;
use Psr\Http\Message\StreamInterface;
use RuntimeException;
use Spatie\Browsershot\Browsershot;

class Contents implements ContentsInterface
{
    private ?string $contents = null;

    public function __construct(
        private readonly Browsershot $browsershot,
    ) {
    }

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

    public function getString(): string
    {
        return $this->getContents();
    }

    public function getLength(): int
    {
        return strlen($this->getContents());
    }

    private function getContents(): string
    {
        if ($this->contents === null) {
            $this->contents = $this->browsershot->pdf();
        }

        return $this->contents;
    }
}
