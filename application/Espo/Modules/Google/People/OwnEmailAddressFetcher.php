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

class OwnEmailAddressFetcher
{
    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function fetch(): string
    {
        $data = $this->client->fetchMe();

        if (!property_exists($data, 'emailAddresses')) {
            throw new RuntimeException("No email addresses in 'me' response.");
        }

        foreach ($data->emailAddresses as $item) {
            $value = $item->value ?? null;

            $metadata = $item->metadata ?? null;

            if (!$metadata) {
                continue;
            }

            $primary = $metadata->primary ?? false;
            $source = $metadata->source ?? null;

            if (!$source) {
                continue;
            }

            $type = $source->type ?? null;


            if (
                strtoupper($type) === 'ACCOUNT' ||
                strtoupper($type) === 'DOMAIN_PROFILE' && $primary
            ) {
                return $value;
            }
        }

        throw new RuntimeException("No account email address in 'me' response.");
    }
}
