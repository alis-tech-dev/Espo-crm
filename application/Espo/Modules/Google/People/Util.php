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

class Util
{
    public static function convertContactIdToResourceName(string $id): string
    {
        return 'people/c' . hexdec($id);
    }

    public static function convertContactGroupIdToResourceName(string $id): string
    {
        return 'contactGroups/' . array_slice(explode('/', $id), -1, 1)[0];
    }

    public static function isLegacyContactGroupId(string $id): bool
    {
        return strpos($id, 'www.google.com') !== false;
    }

    public static function normalizeGroupResourceName(string $name): string
    {
        if (self::isLegacyContactGroupId($name)) {
            return self::convertContactGroupIdToResourceName($name);
        }

        return $name;
    }
}
