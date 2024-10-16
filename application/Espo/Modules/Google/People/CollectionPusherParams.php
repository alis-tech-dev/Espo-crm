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

class CollectionPusherParams
{
    private $contactGroupResourceName = null;

    private $noScheduleOnError = false;

    public function __construct() {}

    public static function create(): self
    {
        return new self();
    }

    public function getContactGroupResourceName(): ?string
    {
        return $this->contactGroupResourceName;
    }

    public function noScheduleOnError(): bool
    {
        return $this->noScheduleOnError;
    }

    public function withContactGroupResourceName(?string $contactGroupResourceName): self
    {
        $obj = clone $this;

        $obj->contactGroupResourceName = $contactGroupResourceName;

        return $obj;
    }

    public function withNoScheduleOnError(bool $noScheduleOnError = true): self
    {
        $obj = clone $this;

        $obj->noScheduleOnError = $noScheduleOnError;

        return $obj;
    }
}

