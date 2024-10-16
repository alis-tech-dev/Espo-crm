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

use Espo\Modules\Google\Core\Google\Clients\People as Client;

use RuntimeException;

class ContactGroupFetcher
{
    private $client;

    private const LIMIT = 1000;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @return ContactGroup[]
     */
    public function fetch(): array
    {
        $list = [];

        $dataList = $this->client->fetchGroupList(self::LIMIT);

        foreach ($dataList as $item) {
            if (!isset($item->resourceName)) {
                throw new RuntimeException("No resource name returned for a group.");
            }

            $type = $item->groupType ?? null;
            $resourceName = $item->resourceName ?? null;

            if (
                $type === 'SYSTEM_CONTACT_GROUP' &&
                !in_array($resourceName, ['contactGroups/myContacts'])
            ) {
                continue;
            }

            $list[] = ContactGroup::create(
                $resourceName,
                $item->formattedName ?? $item->name ?? 'no-name'
            );
        }

        return $list;
    }
}
