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

namespace Espo\Modules\Google\Core\Google\Clients;

use Exception;

use stdClass;
use RuntimeException;

class People extends Google
{
    protected $baseUrl = 'https://people.googleapis.com/v1/';

    protected function getPingUrl()
    {
        return $this->buildUrl('contactGroups');
    }

    /**
     * @return bool
     */
    public function productPing($url = null)
    {
        try {
            $this->request($this->getPingUrl());

            return true;
        }
        catch (Exception $e) {
            $GLOBALS['log']->debug($e->getMessage());

            return false;
        }
    }

    /**
     * @return stdClass[]
     */
    public function fetchGroupList(int $limit): array
    {
        $url = $this->buildUrl('contactGroups');

        $response = $this->request(
            $url,
            [
                'pageSize' => $limit,
            ],
            'GET'
        );

        if (!is_array($response) || !isset($response['contactGroups'])) {
            throw new RuntimeException("Google, contactGroups: Bad response.");
        }

        $list = [];

        foreach ($response['contactGroups'] as $item) {
            $list[] = (object) $item;
        }

        return $list;
    }

    public function fetchMe(): stdClass
    {
        $url = $this->buildUrl('people/me');

        $response = $this->request(
            $url,
            [
                'personFields' => 'emailAddresses',
            ],
            'GET'
        );

        if (!is_array($response)) {
            throw new RuntimeException("Google, me: Bad response.");
        }

        return json_decode(json_encode($response));
    }
}
