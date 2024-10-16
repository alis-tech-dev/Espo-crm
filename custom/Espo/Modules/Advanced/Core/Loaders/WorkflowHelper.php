<?php
/*********************************************************************************
 * The contents of this file are subject to the EspoCRM Advanced Pack
 * Agreement ("License") which can be viewed at
 * https://www.espocrm.com/advanced-pack-agreement.
 * By installing or using this file, You have unconditionally agreed to the
 * terms and conditions of the License, and You may not use this file except in
 * compliance with the License.  Under the terms of the license, You shall not,
 * sublicense, resell, rent, lease, distribute, or otherwise  transfer rights
 * or usage to the software.
 *
 * Copyright (C) 2015-2023 Letrium Ltd.
 *
 * License ID: 9e71abacf6ac199ee59911e8bc81aa87
 ***********************************************************************************/

namespace Espo\Modules\Advanced\Core\Loaders;

use Espo\Core\Container;
use Espo\Core\Container\Loader;
use Espo\Modules\Advanced\Core\Workflow\Helper as Service;

class WorkflowHelper implements Loader
{
    private Container $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    public function load(): Service
    {
        return new Service($this->container);
    }
}
