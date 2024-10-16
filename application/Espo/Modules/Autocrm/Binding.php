<?php

namespace Espo\Modules\Autocrm;

use Espo\Core\Binding\{
    Binder,
    BindingProcessor};
use Espo\Core\Utils\Layout as LayoutUtil;
use Espo\Tools\EmailTemplate\Processor;
use Espo\Tools\Layout\LayoutProvider;

class Binding implements BindingProcessor
{
    public function process(Binder $binder): void
    {
        $binder->bindService(Processor::class, 'templateProcessor');

        if (class_exists(LayoutProvider::class)) {
            $binder->bindService(LayoutProvider::class, 'layoutProvider');
        }

        if (class_exists(LayoutUtil::class)) {
            $binder->bindService(LayoutUtil::class, 'layoutUtil');
        }
    }
}

