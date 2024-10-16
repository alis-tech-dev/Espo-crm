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

use Espo\Core\Exceptions\Error;

class SmtpGroupHandler extends \Espo\Core\Injectable
{
    protected $entityType = 'InboundEmail';

    protected function init()
    {
        $this->addDependency('externalAccountClientManager');
        $this->addDependency('entityManager');
    }

    protected function getExternalAccountClientManager()
    {
        return $this->getInjection('externalAccountClientManager');
    }

    public function applyParams(string $id, array &$params)
    {
        $inboundEmail = $this->getInjection('entityManager')->getRepository($this->entityType)->get($id);

        if (!$inboundEmail) {
            throw new Error("SmtpHandler: {$this->entityType} {$id} not found.");
        }

        $username = $inboundEmail->get('smtpUsername');

        if (!$username) {
            throw new Error("SmtpHandler: {$this->entityType} {$id}: No smtpUsername.");
        }

        $client = $this->getExternalAccountClientManager()->create('Google', $id);

        if (!$client) {
            return;
        }

        if (!$client->getParam('expiresAt')) {
            // for backward compatibility
            $client->getGmailClient()->productPing();
            $accessToken = $client->getGmailClient()->getParam('accessToken');
        } else {
            $client->handleAccessTokenActuality();
            $accessToken = $client->getParam('accessToken');
        }

        if (!$accessToken) {
            return;
        }

        $authString = base64_encode("user={$username}\1auth=Bearer {$accessToken}\1\1");

        $params['smtpAuthClassName'] = '\\Espo\\Modules\\Google\\Core\\Google\\Smtp\\Auth\\Xoauth';
        $params['connectionOptions'] = [
            'authString' => $authString
        ];
    }
}
