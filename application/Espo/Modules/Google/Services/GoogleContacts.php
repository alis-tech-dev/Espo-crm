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
use Espo\Core\Exceptions\BadRequest;

use Espo\ORM\EntityManager;
use Espo\ORM\Collection;

use Espo\Core\Container;
use Espo\Core\Select\SelectManagerFactory;
use Espo\Core\Utils\Metadata;
use Espo\Core\Utils\Config;

use Espo\Entities\User;
use Espo\Entities\ExternalAccount;

use Espo\Modules\Google\People\ContactGroupFetcherFactory;
use Espo\Modules\Google\People\CollectionPusherFactory;
use Espo\Modules\Google\People\CollectionPusherParams;
use Espo\Modules\Google\People\Util;
use Espo\Modules\Google\People\PushResult;

use DateTime;
use DateTimeZone;
use stdClass;

class GoogleContacts
{
    /**
     * 200 is max allowed by API
     */
    private const PUSH_PORTION = 100;

    private const PUSH_PORTION_INTERVAL_PERIOD = '1 minute';

    private $entityManager;

    private $container;

    private $selectManagerFactory;

    private $metadata;

    private $config;

    private $user;

    private $contactGroupFetcherFactory;

    private $collectionPusherFactory;

    public function __construct(
        EntityManager $entityManager,
        Container $container,
        SelectManagerFactory $selectManagerFactory,
        Metadata $metadata,
        Config $config,
        User $user,
        ContactGroupFetcherFactory $contactGroupFetcherFactory,
        CollectionPusherFactory $collectionPusherFactory
    ) {
        $this->entityManager = $entityManager;
        $this->container = $container;
        $this->selectManagerFactory = $selectManagerFactory;
        $this->metadata = $metadata;
        $this->config = $config;
        $this->user = $user;
        $this->contactGroupFetcherFactory = $contactGroupFetcherFactory;
        $this->collectionPusherFactory = $collectionPusherFactory;
    }

    public function usersContactsGroups(): array
    {
        $fetcher = $this->contactGroupFetcherFactory->create($this->user->get('id'));

        $groupList = $fetcher->fetch();

        $map = [];

        foreach ($groupList as $group) {
            $map[$group->getResourceName()] = $group->getName();
        }

        return $map;
    }

    public function push(string $entityType, array $rawSearchParams): int
    {
        $integrationEntity = $this->entityManager->getEntity('Integration', 'Google');

        if (
            !$integrationEntity ||
            !$integrationEntity->get('enabled')
        ) {
            throw new Forbidden();
        }

        $userId = $this->user->get('id');

        $externalAccount = $this->entityManager->getEntity('ExternalAccount', 'Google__' . $userId);

        if (!$externalAccount->get('enabled') || !$externalAccount->get('googleContactsEnabled')) {
            throw new Forbidden("Google Contacts is not enabled for user '{$userId}'.");
        }

        if (array_key_exists('ids', $rawSearchParams)) {
            $ids = $rawSearchParams['ids'];

            $where = [
                [
                    'type' => 'in',
                    'field' => 'id',
                    'value' => $ids,
                ]
            ];
        }
        else if (array_key_exists('where', $rawSearchParams)) {
            $where = $rawSearchParams['where'];
        }
        else {
            throw new BadRequest();
        }

        // @todo Use selectBuilder instead. Once v7.0 is the min supported version.
        $selectManger = $this->selectManagerFactory->create($entityType);

        $searchParams = [
            'where' => $where,
        ];

        $selectParams = $selectManger->getSelectParams($searchParams, true, true);

        $total = $this->entityManager
            ->getRepository($entityType)
            ->count($selectParams);

        $searchParams['maxSize'] = $this->getPortionSize();

        if (!$total) {
            return 0;
        }

        $result = null;

        $runNow = true;

        $offset = 0;

        $now = new DateTime('NOW', new DateTimeZone('UTC'));

        while ($offset < $total) {
            $searchParams['offset'] = $offset;

            $selectParams = $selectManger->getSelectParams($searchParams, true, true);

            $collection = $this->entityManager
                ->getRepository($entityType)
                ->find($selectParams);

            $offset += $this->getPortionSize();

            if ($runNow) {
                $result = $this->pushPortion($userId, $collection, $externalAccount);

                $runNow = false;

                continue;
            }

            $ids = [];

            foreach ($collection as $entity) {
                $ids[] = $entity->get('id');
            }

            $data = [
                'ids' => $ids,
                'userId' => $userId,
                'entityType' => $entityType,
            ];

            $now->modify('+' . $this->getPortionIntervalPeriod());

            $this->entityManager->createEntity('Job', [
                'methodName' => 'jobPushPortion',
                'serviceName' => 'GoogleContacts',
                'executeTime' => $now->format('Y-m-d H:i:00'),
                'data' => json_encode($data),
            ]);
        }

        if (!$result) {
            return 0;
        }

        return $result->getPushedCount();
    }

    private function pushPortion(
        string $userId,
        Collection $collection,
        ExternalAccount $externalAccount
    ): PushResult {

        $pusher = $this->collectionPusherFactory->create($userId);

        $storedGroupResourceName = ($externalAccount->get('contactsGroupsIds') ?? [])[0] ?? null;

        $groupResourceName = $storedGroupResourceName ?
            Util::normalizeGroupResourceName($storedGroupResourceName) : null;

        $params = CollectionPusherParams
            ::create()
            ->withContactGroupResourceName($groupResourceName);

        return $pusher->push($collection, $params);
    }

    public function jobPushPortion(stdClass $data): void
    {
        $integrationEntity = $this->entityManager->getEntity('Integration', 'Google');

        if (
            !$integrationEntity ||
            !$integrationEntity->get('enabled')
        ) {
            throw new Forbidden("Google Contacts: Integration disabled.");
        }

        $userId = $data->userId;
        $entityType = $data->entityType;
        $ids = $data->ids;

        $externalAccount = $this->entityManager->getEntity('ExternalAccount', 'Google__' . $userId);

        if (!$externalAccount->get('enabled') || !$externalAccount->get('googleContactsEnabled')) {
            throw new Forbidden("Google Contacts: Integration disabled for user '{$userId}'.");
        }

        $where = [
            [
                'type' => 'in',
                'field' => 'id',
                'value' => $ids,
            ]
        ];

        $selectManger = $this->selectManagerFactory->create($entityType);

        $selectParams = $selectManger->getSelectParams(['where' => $where], true, true);

        $collection = $this->entityManager
            ->getRepository($entityType)
            ->find($selectParams);

        $this->pushPortion($userId, $collection, $externalAccount);
    }

    public function jobUpdateOneByOne(stdClass $data): void
    {
        $integrationEntity = $this->entityManager->getEntity('Integration', 'Google');

        if (
            !$integrationEntity ||
            !$integrationEntity->get('enabled')
        ) {
            throw new Forbidden("Google Contacts: Integration disabled.");
        }

        $userId = $data->userId;
        $entityType = $data->entityType;
        $ids = $data->ids;

        $externalAccount = $this->entityManager->getEntity('ExternalAccount', 'Google__' . $userId);

        if (!$externalAccount->get('enabled') || !$externalAccount->get('googleContactsEnabled')) {
            throw new Forbidden("Google Contacts: Integration disabled for user '{$userId}'.");
        }

        $where = [
            [
                'type' => 'in',
                'field' => 'id',
                'value' => $ids,
            ]
        ];

        $selectManger = $this->selectManagerFactory->create($entityType);

        $selectParams = $selectManger->getSelectParams(['where' => $where], true, true);

        $collection = $this->entityManager
            ->getRepository($entityType)
            ->find($selectParams);

        $pusher = $this->collectionPusherFactory->create($userId);

        $storedGroupResourceName = ($externalAccount->get('contactsGroupsIds') ?? [])[0] ?? null;

        $groupResourceName = $storedGroupResourceName ?
            Util::normalizeGroupResourceName($storedGroupResourceName) : null;

        $params = CollectionPusherParams
            ::create()
            ->withContactGroupResourceName($groupResourceName);

        $pusher->updateOneByOne($collection, $params);
    }

    private function getPortionSize(): int
    {
        return $this->config->get('googleContactsPushPortionSize') ?? self::PUSH_PORTION;
    }

    private function getPortionIntervalPeriod(): string
    {
        return $this->config->get('googleContactsPushPortionIntervalPeriod') ?? self::PUSH_PORTION_INTERVAL_PERIOD;
    }
}
