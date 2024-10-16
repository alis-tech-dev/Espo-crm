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

namespace Espo\Modules\Google\Core\Google\Actions;

use Espo\Core\Container;
use Espo\Core\Exceptions\Error;
use Espo\Core\ExternalAccount\ClientManager;
use Espo\Core\Utils\Config;
use Espo\Modules\Google\Core\Google\Clients\Google;
use Espo\ORM\EntityManager;

abstract class Base
{
    protected $baseUrl = 'https://www.googleapis.com/calendar/v3/';
    protected $userId;
    /** @var ?Google */
    protected $client;
    protected $configPath = 'data/google/config.json';
    protected $entityManager;
    protected $clientManager;
    protected $acl;
    protected $container;
    protected $metadata;
    protected $config;

    public function __construct($container, $entityManager, $metadata, $config)
    {
        $this->entityManager = $entityManager;
        $this->metadata = $metadata;
        $this->config = $config;
        $this->container = $container;
    }

    protected function getMetadata()
    {
        return $this->metadata;
    }

    protected function getAcl()
    {
        return $this->acl;
    }

    protected function setAcl()
    {
        $user = $this->getEntityManager()->getEntity('User', $this->getUserId());

        if (!$user) {
            throw new Error("No User with id: " . $this->getUserId());
        }

        $this->acl = $this->container->get('aclManager')->createUserAcl($user);
    }

    /**
     * @return EntityManager
     */
    protected function getEntityManager()
    {
        return $this->entityManager;
    }

    /**
     * @return Config
     */
    protected function getConfig()
    {
        return $this->config;
    }

    public function setUserId($userId)
    {
        $this->userId = $userId;
        $this->client = null;

        $this->setAcl();
    }

    /**
     * @return string
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @return Container
     */
    protected function getContainer()
    {
        return $this->container;
    }

    protected function getClientManager(): ClientManager
    {
        if (!$this->clientManager) {
            $this->clientManager = $this->container->get('externalAccountClientManager');
        }

        return $this->clientManager;
    }

    /**
     * @return Google
     */
    protected function getClient()
    {
        if (!$this->client) {
            $this->client = $this->getClientManager()->create('Google', $this->getUserId());
        }

        return $this->client;
    }
}
