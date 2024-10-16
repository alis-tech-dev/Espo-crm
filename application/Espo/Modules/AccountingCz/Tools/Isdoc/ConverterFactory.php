<?php

namespace Espo\Modules\AccountingCz\Tools\Isdoc;

use Espo\Core\InjectableFactory;
use Espo\Core\Utils\Metadata;
use RuntimeException;

class ConverterFactory
{
    public function __construct(
        private readonly InjectableFactory $injectableFactory,
        private readonly Metadata $metadata,
    ) {
    }

    public function create(ConvertType $convertType): ToIsdoc|FromIsdoc
    {
        $implementation = match ($convertType) {
            ConvertType::ToIsdoc => $this->metadata->get([
                "isdoc",
                "converters",
                "toIsdocClassName",
            ]),
            ConvertType::FromIsdoc => $this->metadata->get([
                "isdoc",
                "converters",
                "fromIsdocClassName",
            ])
        };

        if (!$implementation || !class_exists($implementation)) {
            throw new RuntimeException("Class {$implementation} does not exist");
        }

        return $this->injectableFactory->create($implementation);
    }
}
