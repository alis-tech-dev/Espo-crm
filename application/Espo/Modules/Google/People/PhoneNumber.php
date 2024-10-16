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

class PhoneNumber
{
    private $number;

    private $type;

    private $typeMap = [
        'Mobile' => 'mobile',
        'Office' => 'work',
        'Home' => 'home',
        'Fax'  => 'fax',
        'Other' => 'other',
    ];

    private $defaultType = 'Other';

    public function __construct(string $number, ?string $type = null)
    {
        $this->number = $number;
        $this->type = $type;
    }

    public static function create(string $number, ?string $type = null): self
    {
        return new self($number, $type);
    }

    public function getNumber(): ?string
    {
        return $this->number;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function getGoogleType(): string
    {
        return
            $this->typeMap[$this->getType() ?? $this->defaultType] ??
            $this->typeMap[$this->defaultType];
    }
}
