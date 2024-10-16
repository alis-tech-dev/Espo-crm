<?php

namespace Espo\Modules\OnlyOffice\Classes\AppParams;

use Espo\Modules\OnlyOffice\Tools\OnlyOffice\Util;
use Espo\Tools\App\AppParam;

class OnlyOfficeAllowedExtensions implements AppParam
{
    public function __construct(
        protected readonly Util $util
    ) {}

    /** @returns string[] */
    public function get(): array
    {
       return $this->util->getAllowedFileTypes();
    }
}
