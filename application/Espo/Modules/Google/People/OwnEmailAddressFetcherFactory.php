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

use Espo\Core\InjectableFactory;

class OwnEmailAddressFetcherFactory
{
    private $clientProvider;

    private $injectableFactory;

    public function __construct(ClientPrivider $clientProvider, InjectableFactory $injectableFactory)
    {
        $this->clientProvider = $clientProvider;
        $this->injectableFactory = $injectableFactory;
    }

    public function create(string $userId): OwnEmailAddressFetcher
    {
        $client = $this->clientProvider->get($userId)->getPeopleClient();

        return $this->injectableFactory->createWith(OwnEmailAddressFetcher::class, [
            'client' => $client,
        ]);
    }
}
