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

class GoogleContacts extends \Espo\Core\Controllers\Base
{
    public function actionUsersContactsGroups($params, $data, $request)
    {
        return $this->getService('GoogleContacts')->usersContactsGroups();
    }

    public function actionPush($params, $data, $request)
    {
        if (!$this->getAcl()->checkScope($this->name)) {
            throw new Forbidden();
        }

        $entityType = $data->entityType;

        $params = [];

        if (isset($data->byWhere) && $data->byWhere) {
            $params['where'] = [];

            foreach ($data->where as $cause) {
                $params['where'][] = (array) $cause;
            }
        }
        else {
            $params['ids'] = $data->idList;
        }

        return [
            'count' => $this->getService('GoogleContacts')->push($entityType, $params)
        ];
    }
}
