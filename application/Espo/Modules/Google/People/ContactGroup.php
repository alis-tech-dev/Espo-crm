<?php
/*********************************************************************************
 * The contents of this file are subject to the EspoCRM Google Integration
 * Agreement ("License") which can be viewed at
 * https://www.espocrm.com/google-integration-agreement.
 * By installing or using this file, You have unconditionally agreed to the
 * terms and conditions of the License, and You may not use this file except in
 * compliance with the License.  Under the terms of the license, You shall not,
 * sublicense, resell, rent, lease, distribute, or otherwise  transfer rights
 * or usage to the software.
 *
 * Copyright (C) 2015-2023 Letrium Ltd.
 *
 * License ID: d222cd5ec22d93ad3eb7a092569d85b3
 ***********************************************************************************/

namespace Espo\Modules\Google\People;

class ContactGroup
{
    private $resourceName;

    private $name;

    public function __construct(string $resourceName, string $name)
    {
        $this->resourceName = $resourceName;
        $this->name = $name;
    }

    public static function create(string $resourceName, string $name): self
    {
        return new self($resourceName, $name);
    }

    public function getResourceName(): string
    {
        return $this->resourceName;
    }

    public function getName(): string
    {
        return $this->name;
    }
}
