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

use Espo\Core\ExternalAccount\ClientManager;
use Espo\Modules\Google\Core\Google\Clients\Google as Client;

use RuntimeException;

class ClientPrivider
{
    private $hashMap = [];

    private $clientManager;

    public function __construct(ClientManager $externalAccountClientManager)
    {
        $this->clientManager = $externalAccountClientManager;
    }

    public function get(string $userId): Client
    {
        if (array_key_exists($userId, $this->hashMap)) {
            return $this->hasMap[$userId];
        }

        $client = $this->clientManager->create('Google', $userId);

        if (!$client) {
            throw new RuntimeException("Google client could not be created for user '{$userId}.'");
        }

        $this->hasMap[$userId] = $client;

        return $client;
    }
}
