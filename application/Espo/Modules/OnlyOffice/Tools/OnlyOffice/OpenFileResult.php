<?php

namespace Espo\Modules\OnlyOffice\Tools\OnlyOffice;

use Psr\Http\Message\StreamInterface;

class OpenFileResult
{
    public function __construct(
        private readonly StreamInterface $stream,
        private readonly string          $filename,
        private readonly int             $size,
        private readonly ?string         $mimeType = null,
    ) {}

    public function getStream(): StreamInterface
    {
        return $this->stream;
    }

    public function getFilename(): string
    {
        return $this->filename;
    }

    public function getSize(): int
    {
        return $this->size;
    }

    public function getMimeType(): ?string
    {
        return $this->mimeType;
    }
}
