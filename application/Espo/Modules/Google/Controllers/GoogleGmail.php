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

namespace Espo\Modules\Google\Controllers;

use Espo\Core\Exceptions\Forbidden;
use Espo\Core\Exceptions\BadRequest;

class GoogleGmail extends \Espo\Core\Controllers\Base
{
    public function postActionConnect($params, $data)
    {
        $entityType = $data->entityType ?? null;
        $id = $data->id ?? null;
        $code = $data->code ?? null;

        if (!$entityType) throw new BadRequest();
        if (!$id) throw new BadRequest();
        if (!$code) throw new BadRequest();

        $this->getServiceFactory()->create('GoogleGmail')->processAccessCheck($entityType, $id);

        return $this->getServiceFactory()->create('GoogleGmail')->connect($entityType, $id, $code);
    }

    public function postActionDisconnect($params, $data)
    {
        $entityType = $data->entityType ?? null;
        $id = $data->id ?? null;

        if (!$entityType) throw new BadRequest();
        if (!$id) throw new BadRequest();

        $this->getServiceFactory()->create('GoogleGmail')->processAccessCheck($entityType, $id);

        return $this->getServiceFactory()->create('GoogleGmail')->disconnect($entityType, $id);
    }

    public function postActionPing($params, $data)
    {
        $entityType = $data->entityType ?? null;
        $id = $data->id ?? null;

        if (!$entityType) throw new BadRequest();
        if (!$id) throw new BadRequest();

        $this->getServiceFactory()->create('GoogleGmail')->processAccessCheck($entityType, $id);

        $integration = $this->getContainer()->get('entityManager')->getEntity('Integration', 'Google');
        if ($integration) {
            return [
                'clientId' => $integration->get('clientId'),
                'redirectUri' => $this->getConfig()->get('siteUrl') . '?entryPoint=oauthCallback',
                'isConnected' => $this->getServiceFactory()->create('GoogleGmail')->ping($entityType, $id),
            ];
        }
    }
}
