<?php

namespace Espo\Modules\Autocrm\Classes\FieldProcessing\Formula;

use Espo\Core\{
    FieldProcessing\Loader as LoaderInterface,
};

class ListLoader extends ReadLoader implements LoaderInterface
{
    protected string $loaderType = 'list';
}
