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

namespace Espo\Modules\Google\Core\Google;

class SmtpHandler extends \Espo\Core\Injectable
{
    protected function init()
    {
        $this->addDependency('externalAccountClientManager');
    }

    protected function getExternalAccountClientManager()
    {
        return $this->getInjection('externalAccountClientManager');
    }

    public function applyParams(string $userId, string $emailAddress, array &$params)
    {
        $username = $emailAddress;
        if (!$username) return;

        $client = $this->getExternalAccountClientManager()->create('Google', $userId);
        if (!$client) return;

        if (!$client->getParam('expiresAt')) {
            // for backward compatibility
            $client->getGmailClient()->productPing();
            $accessToken = $client->getGmailClient()->getParam('accessToken');
        } else {
            $client->handleAccessTokenActuality();
            $accessToken = $client->getParam('accessToken');
        }

        $authString = base64_encode("user={$username}\1auth=Bearer {$accessToken}\1\1");

        $params['smtpAuthClassName'] = '\\Espo\\Modules\\Google\\Core\\Google\\Smtp\\Auth\\Xoauth';
        $params['connectionOptions'] = [
            'authString' => $authString
        ];
    }
}
