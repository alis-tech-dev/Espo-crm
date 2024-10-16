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

namespace Espo\Modules\Google\Services;

use Espo\Core\Exceptions\Forbidden;

class GoogleGmail extends \Espo\Core\Services\Base
{
    protected function init()
    {
        parent::init();

        $this->addDependency('externalAccountClientManager');
        $this->addDependency('acl');
    }

    public function processAccessCheck(string $entityType, string $id)
    {
        if ($this->getUser()->isAdmin()) {
            return;
        }

        if ($entityType === 'EmailAccount') {
            $record = $this->getEntityManager()->getEntity('EmailAccount', $id);

            if (!$record) {
                throw new Forbidden();
            }

            if (!$this->getInjection('acl')->check($record)) {
                throw new Forbidden();
            }

            return;
        }

        throw new Forbidden();
    }

    public function connect(string $entityType, string $id, string $code)
    {
        $em = $this->getEntityManager();

        $result = $this->getServiceFactory()->create('ExternalAccount')->authorizationCode('Google', $id, $code);

        if ($entityType === 'EmailAccount') {
            $imapHandler = 'Espo\\Modules\\Google\\Core\\Google\\ImapPersonalHandler';
            $smtpHandler = 'Espo\\Modules\\Google\\Core\\Google\\SmtpPersonalHandler';
        }
        else {
            $imapHandler = 'Espo\\Modules\\Google\\Core\\Google\\ImapGroupHandler';
            $smtpHandler = 'Espo\\Modules\\Google\\Core\\Google\\SmtpGroupHandler';
        }

        $inboundEmail = $em->getRepository($entityType)->get($id);

        if ($inboundEmail) {
            $inboundEmail->set('imapHandler', $imapHandler);
            $inboundEmail->set('smtpHandler', $smtpHandler);

            $em->saveEntity($inboundEmail);
        }

        return $result;
    }

    public function disconnect(string $entityType, string $id)
    {
        $em = $this->getEntityManager();
        $ea = $em->getRepository('ExternalAccount')->get('Google__' . $id);

        if ($ea) {
            $ea->set([
                'accessToken' => null,
                'refreshToken' => null,
                'tokenType' => null,
                'enabled' => false,
            ]);

            $em->saveEntity($ea, ['silent' => true]);
        }

        $inboundEmail = $em->getRepository($entityType)->get($id);

        if ($inboundEmail) {
            $inboundEmail->set('imapHandler', null);
            $inboundEmail->set('smtpHandler', null);
            $em->saveEntity($inboundEmail);
        }

        return true;
    }

    public function ping(string $entityType, string $id) : bool
    {
        $integration = $this->getEntityManager()->getEntity('ExternalAccount', 'Google__' . $id);

        if (!$integration) {
            return false;
        }

        try {
            $client = $this->getInjection('externalAccountClientManager')->create('Google', $id);

            if ($client) {
                return $client->getGmailClient()->productPing();
            }
        }
        catch (\Exception $e) {}

        return false;
    }
}
