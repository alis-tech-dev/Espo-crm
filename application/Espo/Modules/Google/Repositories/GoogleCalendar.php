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

namespace Espo\Modules\Google\Repositories;

use Espo\ORM\Query\DeleteBuilder;
use Espo\ORM\Query\InsertBuilder;
use Espo\ORM\Query\SelectBuilder;
use Espo\ORM\Query\UnionBuilder;
use Espo\ORM\Query\UpdateBuilder;

class GoogleCalendar extends \Espo\Core\ORM\Repositories\RDB
{
    private $allowedEventTypes = null;

    private $coreEventTypes = ['Meeting', 'Call'];

    private $usersMiddles = [
        'Meeting' => 'MeetingUser',
        'Call' => 'CallUser',
    ];

    private $usersJoinForeignKeys2 = [
        'Meeting' => 'meetingId',
        'Call' => 'callId',
    ];

    private function validateEventTypes($types)
    {
        if (!is_array($this->allowedEventTypes)) {
            $this->loadAllowedEventTypes();
        }

        $selectedEventTypes = [];
        $eventTypes = (is_array($types)) ? $types : [$types];

        foreach ($eventTypes as $eventType) {
            if (
                in_array($eventType, $this->allowedEventTypes) &&
                !in_array($eventType, $selectedEventTypes)
            ) {
                $selectedEventTypes[] = $eventType;
            }
        }

        return $selectedEventTypes;
    }

    private function loadAllowedEventTypes()
    {
        $scopes = $this->getMetadata()->get('scopes');
        $allowedTypes = [];

        foreach ($scopes as $scope => $defs) {
            if (
                !empty($defs['activity']) &&
                !empty($defs['entity']) &&
                !empty($defs['object']) &&
                empty($defs['disabled']) &&
                $scope !== 'Email'
            ) {

                $allowedTypes[] = $scope;
            }
        }
        $this->allowedEventTypes = $allowedTypes;
    }

    /**
     * @param string $userId
     * @return array<string, array<string, mixed>>
     */
    public function storedUsersCalendars($userId)
    {
        $query = $this->entityManager
            ->getQueryBuilder()
            ->select([
                ['gcuser.id', 'id'],
                ['gcuser.type', 'type'],
                ['gcuser.googleCalendarId', 'googleCalendarId'],
                ['gcuser.active', 'active'],
                ['gc.name', 'name'],
                ['gc.calendarId', 'calendarId']
            ])
            ->from('GoogleCalendarUser', 'gcuser')
            ->join('GoogleCalendar', 'gc', ['gcuser.googleCalendarId:' => 'gc.id'])
            ->where([
                'gcuser.userId' => $userId,
            ])
            ->build();

        $sth = $this->entityManager->getQueryExecutor()->execute($query);

        $rows = $sth->fetchAll(\PDO::FETCH_ASSOC);

        $result = [
            'monitored' => [],
            'main' => [],
        ];

        foreach ($rows as $row) {
            $type = $row['type'];
            $googleCalendarId = $row['googleCalendarId'];

            $result[$type][$googleCalendarId] = $row;
        }

        return $result;
    }

    public function getCalendarByGCId($googleCalendarId)
    {
        return $this->entityManager
            ->getRDBRepository('GoogleCalendar')
            ->where(['calendarId' => $googleCalendarId])
            ->findOne();
    }

    public function getEventAttendees($eventType, $eventId)
    {
        if (
            !in_array($eventType, $this->allowedEventTypes ?? []) ||
            !in_array($eventType, $this->coreEventTypes)
        ) {
            return null;
        }

        $event = $this->entityManager->getEntity($eventType, $eventId);

        if (!$event) {
            return [];
        }

        $result = [];

        $links = ['users', 'contacts', 'leads'];

        foreach ($links as $link) {
            /*$sql = "
                SELECT " . $pdo->quote($scope) . " AS scope, {$relTable}_id AS id, status AS status
                FROM `$relation`
                WHERE deleted=0 AND {$idField}=" . $pdo->quote($eventId);*/

            $attendees = $this->entityManager
                ->getRDBRepository($eventType)
                ->getRelation($event, $link)
                ->select([
                    'id',
                    'acceptanceStatus',
                ])
                ->find();

            foreach ($attendees as $attendee) {
                $emailData = $this->entityManager
                    ->getRepository('EmailAddress')
                    ->getEmailAddressData($attendee);

                $result[] = [
                    'emailData' => $emailData,
                    'status' => $attendee->get('acceptanceStatus'),
                    'id' => $attendee->getId(),
                    'scope' => $attendee->getEntityType(),
                    'entityType' => $attendee->getEntityType(),
                ];
            }

            /*try {
                $sth = $pdo->prepare($sql);
                $sth->execute();
                $rows = $sth->fetchAll(\PDO::FETCH_ASSOC);

                foreach ($rows as $row) {
                    $emailData = [];
                    $relatedEntity = $this->entityManager->getEntity($scope, $row['id']);

                    if (!empty($relatedEntity)) {
                        $emailData = $this->entityManager
                            ->getRepository('EmailAddress')
                            ->getEmailAddressData($relatedEntity);
                    }

                    $result[] = $row + [
                        'emailData' => $emailData,
                        'entityType' => $scope,
                    ];
                }
            }
            catch (\Exception $e) {
                $GLOBALS['log']->error("GoogleCalendarERROR: Failed query " . $sql . " ; " . $e->getMessage());
            }*/
        }

        return $result;
    }

    public function getUsersMainCalendar($userId)
    {
        return $this->entityManager
            ->getRDBRepository('GoogleCalendarUser')
            ->where([
                'active' => true,
                'userId' => $userId,
                'type' => 'main',
            ])
            ->findOne();
    }

    public function addRecurrentEventToQueue($calendarId, $eventId)
    {
        $this->removeRecurrentEventFromQueueByEventId($eventId);

        $this->entityManager->createEntity('GoogleCalendarRecurrentEvent', [
            'googleCalendarUserId' => $calendarId,
            'eventId' => $eventId,
        ]);
    }

    public function removeRecurrentEventFromQueue($id)
    {
        $delete = DeleteBuilder::create()
            ->from('GoogleCalendarRecurrentEvent')
            ->where(['id' => $id])
            ->build();

        $this->entityManager->getQueryExecutor()->execute($delete);
    }

    public function removeRecurrentEventFromQueueByEventId($eventId)
    {
        $delete = DeleteBuilder::create()
            ->from('GoogleCalendarRecurrentEvent')
            ->where(['eventId' => $eventId])
            ->build();

        $this->entityManager->getQueryExecutor()->execute($delete);
    }

    public function getRecurrentEventFromQueue($calendarId)
    {
        $maxRange = new \DateTime();
        $maxRange->modify('+6 months');

        $select = SelectBuilder::create()
            ->from('GoogleCalendarRecurrentEvent')
            ->select([
                'id',
                'eventId',
                'pageToken',
                ['lastLoadedEventTime', 'lastEventTime']
            ])
            ->where([
                'googleCalendarUserId' => $calendarId,
                [
                    'OR' => [
                        ['lastLoadedEventTime' => null],
                        ['lastLoadedEventTime<' => $maxRange->format('Y-m-d H:i:s')],
                    ],
                ],
            ])
            ->order('lastLoadedEventTime')
            ->build();

        /*
        $query = "
            SELECT
                id AS id,
                event_id as eventId,
                page_token as pageToken,
                last_loaded_event_time as lastEventTime
            FROM `google_calendar_recurrent_event`
            WHERE deleted=0 AND google_calendar_user_id=" . $pdo->quote($calendarId) .
            "  AND (last_loaded_event_time IS NULL OR last_loaded_event_time < " . $pdo->quote($maxRange->format('Y-m-d H:i:s')) . ")
            ORDER BY lastEventTime ASC";*/

        try {
            $sth = $this->entityManager->getQueryExecutor()->execute($select);

            return $sth->fetch(\PDO::FETCH_ASSOC);
        } catch (\Exception $e) {
            $GLOBALS['log']->error("GoogleCalendarERROR: Failed query: " . $e->getMessage());

            return false;
        }
    }

    public function updateRecurrentEvent($id, $pageToken = '', $lastEventTime = null)
    {
        $update = UpdateBuilder::create()
            ->in('GoogleCalendarRecurrentEvent')
            ->set([
                'pageToken' => $pageToken,
                'lastLoadedEventTime' => !empty($lastEventTime) ? $lastEventTime : null,
            ])
            ->where(['id' => $id])
            ->build();

        /*$query = "
            UPDATE google_calendar_recurrent_event
            SET
                page_token=" . $pdo->quote($pageToken) . ",
                last_loaded_event_time=". ((empty($lastEventTime)) ? 'NULL' : $pdo->quote($lastEventTime)) . "
            WHERE id=" . $pdo->quote($id);*/

        try {
            $this->entityManager->getQueryExecutor()->execute($update);
        } catch (\Exception $e) {
            $GLOBALS['log']->error("GoogleCalendarERROR: Failed query: " . $e->getMessage());
        }
    }

    public function isCalendarActive($email)
    {
        $calendar = $this
            ->where(['calendarId' => $email])
            ->findOne();

        return !empty($calendar);
    }

    public function getEntitiesByGCId($userId, $eventId, $eventTypes)
    {
        $results = [];

        $eventTypes = $this->validateEventTypes($eventTypes);

        foreach ($eventTypes as $eventType) {
            if (in_array($eventType, $this->coreEventTypes)) {
                $events = $this->entityManager
                    ->getRDBRepository($eventType)
                    ->clone(
                        SelectBuilder::create()
                            ->from($eventType)
                            ->withDeleted()
                            ->build()
                    )
                    ->where([
                        //'assignedUserId' => $userId,
                        'googleCalendarEventId' => $eventId
                    ])
                    ->order('modifiedAt', true)
                    ->find();

                foreach ($events as $event) {
                    $results[] = $event;
                }

                continue;
            }

            $select = SelectBuilder::create()
                ->select('gce.entityId', 'entityId')
                ->from('GoogleCalendarEvent', 'gce')
                ->join($eventType, 'entityTable', [
                    'entityTable.id:' => 'gce.entityId',
                    'entityTable.deleted' => false,
                ])
                ->where([
                    'entityTable.assignedUserId' => $userId,
                    'gce.googleCalendarEventId' => $eventId,
                ])
                ->order('entityTable.modifiedAt', 'DESC')
                ->build();

            /*$sql = "
                SELECT `google_calendar_event`.entity_id AS entityId
                FROM `google_calendar_event`
                INNER JOIN `{$table}` entity_table ON
                    entity_table.id=`google_calendar_event`.entity_id AND
                    entity_table.deleted = 0
                WHERE
                    entity_table.assigned_user_id = " . $pdo->quote($userId) . " AND
                    `google_calendar_event`.google_calendar_event_id=" . $pdo->quote($eventId) . "
                ORDER BY entity_table.modified_at DESC
            ";*/

            try {
                //$sth = $pdo->prepare($sql);
                //$sth->execute();

                $sth = $this->entityManager->getQueryExecutor()->execute($select);

                $rows = $sth->fetchAll(\PDO::FETCH_ASSOC);

                foreach ($rows as $row) {
                    $event = $this->entityManager->getEntity($eventType, $row['entityId']);

                    if ($event) {
                        $results[] = $event;
                    }
                }
            } catch (\Exception $e) {
                $GLOBALS['log']->error("GoogleCalendarERROR: Failed query: " . $e->getMessage());

                return false;
            }
        }

        return $results;
    }

    public function getEvents($userId, $eventTypes, $since, $to, $lastEventId, $googleCalendarId, $limit = 20)
    {
        $googleCalendar = $this->getCalendarByGCId($googleCalendarId);

        if (empty($googleCalendar)) {
            return [];
        }

        //$lowerLimitDateQuery = " event_table.modified_at > ".$pdo->quote($since);

        /*if (!empty($lastEventId)) {
             $lowerLimitDateQuery = " (" . $lowerLimitDateQuery .
                 " OR event_table.modified_at = " . $pdo->quote($since) .
                 " AND STRCMP(event_table.id," . $pdo->quote($lastEventId) . ")=1 )";
        }*/

        $lowerLimitWhere = $lastEventId ?
            [
                'OR' => [
                    'modifiedAt>' => $since,
                    [
                        'modifiedAt' => $since,
                        'id>' => $lastEventId,
                    ]
                ]
            ] :
            ['modifiedAt>' => $since];

        $eventTypes = $this->validateEventTypes($eventTypes);

        $queryList = [];

        foreach ($eventTypes as $eventType) {
            $isAllDay = (bool) $this->getMetadata()->get(['entityDefs', $eventType, 'fields', 'isAllDay']);

            if (in_array($eventType, $this->coreEventTypes)) {
                $foreignKey = $this->usersJoinForeignKeys2[$eventType];
                $middleEntityType = $this->usersMiddles[$eventType];

                $select = SelectBuilder::create()
                    ->from($eventType)
                    ->select([
                        ["'{$eventType}'", 'scope'],
                        'id',
                        'name',
                        'dateStart',
                        'dateEnd',
                        [$isAllDay ? 'dateStartDate' : 'null', 'dateStartDate'],
                        [$isAllDay ? 'dateEndDate' : 'null', 'dateEndDate'],
                        'googleCalendarEventId',
                        'modifiedAt',
                        'description',
                        'deleted',
                        'status',
                    ])
                    ->distinct()
                    ->leftJoin($middleEntityType, 'middle', [
                        "middle.{$foreignKey}:" => 'id',
                        'middle.deleted' => false,
                    ])
                    ->where([
                        'middle.userId' => $userId,
                        ['googleCalendarEventId!=' => ''],
                        ['googleCalendarEventId!=' => 'FAIL'],
                        ['googleCalendarEventId!=' => null],
                        'googleCalendarId' => $googleCalendar->get('id'),
                        'modifiedAt<' => $to,
                        [
                            'OR' => [
                                'modifiedAt!=:' => 'createdAt',
                                'deleted' => true,
                            ],
                        ],
                    ])
                    ->where($lowerLimitWhere)
                    ->withDeleted()
                    ->build();

                $queryList[] = $select;

                continue;

                /*$sql .= "
                SELECT DISTINCT
                    '{$eventType}' as scope,
                    event_table.id AS id,
                    event_table.name AS name,
                    event_table.date_start AS dateStart,
                    event_table.date_end AS dateEnd,
                    {$datePart}
                    event_table.google_calendar_event_id AS googleCalendarEventId,
                    event_table.modified_at AS modifiedAt,
                    event_table.description AS description,
                    event_table.deleted AS deleted,
                    event_table.status AS status

                FROM `{$table}` AS event_table

                LEFT JOIN `{$joinTable}` ON {$joinTable}.{$foreignKey} = event_table.id AND {$joinTable}.deleted = 0

                WHERE
                    {$joinTable}.user_id = " . $pdo->quote($userId) . " AND
                    {$lowerLimitDateQuery} AND
                    google_calendar_event_id <> '' AND
                    google_calendar_event_id <> 'FAIL' AND
                    google_calendar_event_id IS NOT NULL AND
                    event_table.modified_at < " . $pdo->quote($to) . " AND
                    google_calendar_id =" . $pdo->quote($googleCalendar->get('id')) ." AND
                    (modified_at <> created_at OR event_table.deleted=1)
                ";*/
            }

            $select = SelectBuilder::create()
                ->from($eventType)
                ->select([
                    ["'{$eventType}'", 'scope'],
                    'id',
                    'name',
                    'dateStart',
                    'dateEnd',
                    [$isAllDay ? 'dateStartDate' : 'null', 'dateStartDate'],
                    [$isAllDay ? 'dateEndDate' : 'null', 'dateEndDate'],
                    ['gce.googleCalendarEventId', 'googleCalendarEventId'],
                    'modifiedAt',
                    'description',
                    'deleted',
                    'status',
                ])
                ->distinct()
                ->leftJoin('GoogleCalendarEvent', 'gce', [
                    'gce.entityId:' => 'id',
                    'gce.entityType' => $eventType,
                ])
                ->where([
                    'assignedUserId' => $userId,
                    ['gce.googleCalendarEventId!=' => ''],
                    ['gce.googleCalendarEventId!=' => 'FAIL'],
                    ['gce.googleCalendarEventId!=' => null],
                    'gce.googleCalendarId' => $googleCalendar->get('id'),
                    'modifiedAt<' => $to,
                    [
                        'OR' => [
                            'modifiedAt!=:' => 'createdAt',
                            'deleted' => true,
                        ],
                    ],
                ])
                ->where($lowerLimitWhere)
                ->withDeleted()
                ->build();

            $queryList[] = $select;

            /*$sql .= "
                SELECT
                    '{$eventType}' as scope,
                    event_table.id AS id,
                    event_table.name AS name,
                    event_table.date_start AS dateStart,
                    event_table.date_end AS dateEnd,
                    {$datePart}
                    google_calendar_event.google_calendar_event_id AS googleCalendarEventId,
                    event_table.modified_at AS modifiedAt,
                    event_table.description AS description,
                    event_table.deleted AS deleted,
                    event_table.status AS status

                FROM `{$table}` AS event_table

                LEFT JOIN google_calendar_event ON
                    event_table.id=google_calendar_event.entity_id AND
                    google_calendar_event.entity_type = " . $pdo->quote($eventType) . "

                WHERE
                    {$lowerLimitDateQuery} AND
                    event_table.assigned_user_id =".$pdo->quote($userId) . " AND
                    google_calendar_event.google_calendar_event_id <> '' AND
                    google_calendar_event.google_calendar_event_id <> 'FAIL' AND
                    google_calendar_event.google_calendar_event_id IS NOT NULL AND
                    event_table.modified_at < " . $pdo->quote($to) . " AND
                    google_calendar_event.google_calendar_id =" . $pdo->quote($googleCalendar->get('id')) ." AND
                    (event_table.modified_at <> event_table.created_at OR event_table.deleted=1)
            ";*/
        }

        if ($queryList === []) {
            return [];
        }

        $result = [];

        $builder = UnionBuilder::create();

        foreach ($queryList as $select) {
            $builder->query($select);
        }

        $union = $builder
            ->order('modifiedAt', 'ASC')
            ->order('id', 'ASC')
            ->limit(0, $limit)
            ->build();

        //$sql .= " ORDER BY modifiedAt ASC, id ASC LIMIT " . (int) $limit;

        try {
            $sth = $this->entityManager->getQueryExecutor()->execute($union);

            $rows = $sth->fetchAll(\PDO::FETCH_ASSOC);

            foreach ($rows as $row) {
                $attendees = (!$row['deleted']) ?
                    $this->getEventAttendees($row['scope'], $row['id']) : [];

                $result[] = array_merge($row, ['attendees' => $attendees]);
            }
        } catch (\Exception $e) {
            $GLOBALS['log']->error("GoogleCalendarERROR: Failed query: " . $e->getMessage());
        }

        return $result;
    }

    protected function getUserWithPushIntegrationIdList()
    {
        if (isset($this->userWithIntegrationIdList)) {
            return $this->userWithIntegrationIdList;
        }

        $userList = $this->entityManager
            ->getRDBRepository('User')
            ->select(['id'])
            ->where([
                'type' => ['admin', 'regular'],
                'isActive' => true,
            ])
            ->find();

        $userWithIntegrationIdList = [];

        foreach ($userList as $user) {
            $ea = $this->entityManager->getRepository('ExternalAccount')
                ->get('Google__' . $user->get('id'));

            if ($ea->get('googleCalendarEnabled') && $ea->get('calendarDirection') !== 'GCToEspo') {
                $userWithIntegrationIdList[] = $user->get('id');
            }
        }

        $this->userWithIntegrationIdList = $userWithIntegrationIdList;

        return $userWithIntegrationIdList;
    }

    public function getNewEvents($userId, $eventTypes, $since, $limit = 20)
    {
        $eventTypes = $this->validateEventTypes($eventTypes);
        $userWithIntegrationIdList = $this->getUserWithPushIntegrationIdList();

        $queryList = [];

        foreach ($eventTypes as $eventType) {
            $isAllDay = (bool) $this->getMetadata()->get(['entityDefs', $eventType, 'fields', 'isAllDay']);

            if (in_array($eventType, $this->coreEventTypes)) {
                $foreignKey = $this->usersJoinForeignKeys2[$eventType];
                $middleEntityType = $this->usersMiddles[$eventType];

                $select = SelectBuilder::create()
                    ->from($eventType)
                    ->select([
                        ["'{$eventType}'", 'scope'],
                        'id',
                        'name',
                        'dateStart',
                        'dateEnd',
                        [$isAllDay ? 'dateStartDate' : 'null', 'dateStartDate'],
                        [$isAllDay ? 'dateEndDate' : 'null', 'dateEndDate'],
                        'modifiedAt',
                        'description',
                        'status',
                    ])
                    ->distinct()
                    ->leftJoin($middleEntityType, 'middle', [
                        "middle.{$foreignKey}:" => 'id',
                        'middle.deleted' => false,
                    ])
                    ->where([
                        'dateStart>=' => $since,
                        'middle.userId' => $userId,
                        [
                            'OR' => [
                                ['assignedUserId' => $userId],
                                ['assignedUserId' => null],
                                ['assignedUserId!=' => $userWithIntegrationIdList],
                            ]
                        ],
                        [
                            'OR' => [
                                ['googleCalendarEventId' => ''],
                                ['googleCalendarEventId' => null]
                            ]
                        ],
                        'status!=' => 'Not Held',
                    ])
                    ->build();

                $queryList[] = $select;

                /*$sql .= "
                    SELECT DISTINCT
                        '{$eventType}' as scope,
                        {$table}.id AS id,
                        {$table}.name AS name,
                        {$table}.date_start AS dateStart,
                        {$table}.date_end AS dateEnd,
                        {$datePart}
                        {$table}.modified_at AS modifiedAt,
                        {$table}.description AS description,
                        {$table}.status AS status
                    FROM `{$table}`
                    LEFT JOIN `{$joinTable}` ON {$joinTable}.{$foreignKey} = {$table}.id AND {$joinTable}.deleted = 0
                    WHERE
                        date_start >= " . $pdo->quote($since) . " AND
                        {$joinTable}.user_id = " . $pdo->quote($userId) . " AND
                        (
                            assigned_user_id = " . $pdo->quote($userId) . "
                            OR
                            assigned_user_id = NULL
                            OR
                            assigned_user_id NOT IN (" . implode(', ', $userWithIntegrationIdQuotedList) . ")
                        ) AND
                        (google_calendar_event_id = '' OR google_calendar_event_id IS NULL) AND
                        {$table}.status != 'Not Held' AND
                        {$table}.deleted = 0
                ";*/

                continue;
            }

            /*$sql .= "
                SELECT
                    '{$eventType}' as scope,
                    `{$table}`.id AS id,
                    `{$table}`.name AS name,
                    `{$table}`.date_start AS dateStart,
                    `{$table}`.date_end AS dateEnd,
                    {$datePart}
                    `{$table}`.modified_at AS modifiedAt,
                    `{$table}`.description AS description,
                    `{$table}`.status AS status

                FROM `{$table}`
                LEFT JOIN google_calendar_event gcevent ON
                    `{$table}`.id=gcevent.entity_id AND
                    gcevent.entity_type=".$pdo->quote($eventType) . "

                WHERE
                    `{$table}`.date_start >= ".$pdo->quote($since) . " AND
                    `{$table}`.assigned_user_id =".$pdo->quote($userId) . " AND
                    (gcevent.google_calendar_event_id ='' OR gcevent.google_calendar_event_id IS NULL) AND
                    `{$table}`.status != 'Not Held' AND
                    `{$table}`.deleted=0
            ";*/

            $select = SelectBuilder::create()
                ->from($eventType)
                ->select([
                    ["'{$eventType}'", 'scope'],
                    'id',
                    'name',
                    'dateStart',
                    'dateEnd',
                    [$isAllDay ? 'dateStartDate' : 'null', 'dateStartDate'],
                    [$isAllDay ? 'dateEndDate' : 'null', 'dateEndDate'],
                    'modifiedAt',
                    'description',
                    'status',
                ])
                ->leftJoin('GoogleCalendarEvent', 'gce', [
                    'gce.entityId:' => 'id',
                    'gce.entityType' => $eventType,
                ])
                ->where([
                    'dateStart>=' => $since,
                    'assignedUserId' => $userId,
                    [
                        'OR' => [
                            ['gce.googleCalendarEventId' => ''],
                            ['gce.googleCalendarEventId' => null]
                        ]
                    ],
                    'status!=' => 'Not Held',
                ])
                ->build();

            $queryList[] = $select;
        }

        if ($queryList === []) {
            return [];
        }

        $result = [];

        $builder = UnionBuilder::create();

        foreach ($queryList as $select) {
            $builder->query($select);
        }

        $union = $builder
            ->order('dateStart', 'DESC')
            ->limit(0, $limit)
            ->build();

        //$sql .= " ORDER BY dateStart DESC LIMIT " . (int) $limit;

        try {
            $sth = $this->entityManager->getQueryExecutor()->execute($union);

            $rows = $sth->fetchAll(\PDO::FETCH_ASSOC);

            foreach ($rows as $row) {
                $attendees = $this->getEventAttendees($row['scope'], $row['id']);

                $result[] = array_merge($row, ['attendees' => $attendees]);
            }
        } catch (\Exception $e) {
            $GLOBALS['log']->error("GoogleCalendarERROR: Failed query: " . $e->getMessage());
        }

        return $result;
    }

    public function deleteRecurrentInstancesFromEspo($calendarId, $googleCalendarEventId, $eventTypes)
    {
        $eventTypes = $this->validateEventTypes($eventTypes);

        foreach ($eventTypes as $eventType) {
            if (in_array($eventType, $this->coreEventTypes)) {
                /*$query = "
                    UPDATE `{$table}`
                    SET
                        deleted=1, google_calendar_id=NULL, google_calendar_event_id=NULL
                    WHERE google_calendar_id=" . $pdo->quote($calendarId) ." AND
                        google_calendar_event_id LIKE ". $pdo->quote($googleCalendarEventId . '_%');*/

                $update = UpdateBuilder::create()
                    ->in($eventType)
                    ->set([
                        'deleted' => true,
                        'googleCalendarId' => null,
                        'googleCalendarEventId' => null,
                    ])
                    ->where([
                        'googleCalendarId' => $calendarId,
                        'googleCalendarEventId*' => $googleCalendarEventId . '_%',
                    ])
                    ->build();

                try {
                    $this->entityManager->getQueryExecutor()->execute($update);
                } catch (\Exception $e) {
                    $GLOBALS['log']->error("GoogleCalendarERROR: Failed query: " . $e->getMessage());
                }

                continue;
            }

            $select = SelectBuilder::create()
                ->select('id')
                ->from('GoogleCalendarEvent')
                ->where([
                    'entityType' => $eventType,
                    'googleCalendarId' => $calendarId,
                    'googleCalendarEventId*' => $googleCalendarEventId . '_%',
                ])
                ->withDeleted()
                ->build();

            $sthSelect = $this->entityManager->getQueryExecutor()->execute($select);

            /*$selectQuery = "
                SELECT id
                FROM google_calendar_event
                WHERE
                    entity_type=" . $pdo->quote($eventType) ." AND
                    google_calendar_id=" . $pdo->quote($calendarId) . " AND
                    google_calendar_event_id LIKE ". $pdo->quote($googleCalendarEventId . '_%');

            $sthSelect = $pdo->prepare($selectQuery);
            $sthSelect->execute();*/

            $ids = $sthSelect->fetchAll(\PDO::FETCH_COLUMN, 0);

            if (!$ids) {
                continue;
            }

            $select = SelectBuilder::create()
                ->select('entityId')
                ->from('GoogleCalendarEvent')
                ->where([
                    'entityType' => $eventType,
                    'googleCalendarId' => $calendarId,
                    'googleCalendarEventId*' => $googleCalendarEventId . '_%',
                ])
                ->withDeleted()
                ->build();

            $sthSelect = $this->entityManager->getQueryExecutor()->execute($select);

            /*$selectQuery = "
                SELECT entity_id
                FROM google_calendar_event
                WHERE
                    entity_type=" . $pdo->quote($eventType) ." AND
                    google_calendar_id=" . $pdo->quote($calendarId) . " AND
                    google_calendar_event_id LIKE " . $pdo->quote($googleCalendarEventId . '_%');

            $sthSelect = $pdo->prepare($selectQuery);
            $sthSelect->execute();*/

            $entityIds = $sthSelect->fetchAll(\PDO::FETCH_COLUMN, 0);

            /*$entityIdsSafe = [];
            foreach ($entityIds as $id) {
                $entityIdsSafe[] = $pdo->quote($id);
            }*/

            $update = UpdateBuilder::create()
                ->in($eventType)
                ->set(['deleted' => true])
                ->where(['id' => $entityIds])
                ->build();

            $this->entityManager->getQueryExecutor()->execute($update);

            /*$updateQuery = "UPDATE `{$table}` SET deleted=1 WHERE id IN (" . implode(", ", $entityIdsSafe) . ")";

            $sthUpdate = $pdo->prepare($updateQuery);
            $sthUpdate->execute();*/

            $delete = DeleteBuilder::create()
                ->from('GoogleCalendarEvent')
                ->where(['id' => $ids])
                ->build();

            $this->entityManager->getQueryExecutor()->execute($delete);

            /*$idsSafe = [];
            foreach ($ids as $id) {
                $idsSafe[] = $pdo->quote($id);
            }*/

            /*$deleteQuery = "DELETE FROM `google_calendar_event` WHERE id IN (" . implode(", ", $idsSafe) . ")";
            $sthDelete = $pdo->prepare($deleteQuery);
            $sthDelete->execute();*/
        }

        $this->removeRecurrentEventFromQueueByEventId($googleCalendarEventId);
    }

    public function storeEventRelation($entityType, $entityId, $googleCalendarId, $googleCalendarEventId = null)
    {
        //$pdo = $this->getEntityManager()->getPDO();
        //$entityType = $this->getEntityManager()->getQuery()->sanitize($entityType);

        if (in_array($entityType, $this->coreEventTypes)) {
            $set = ['googleCalendarId' => $googleCalendarId];

            if ($googleCalendarEventId) {
                $set['googleCalendarEventId'] = $googleCalendarEventId;
            }

            $query = UpdateBuilder::create()
                ->in($entityType)
                ->set($set)
                ->where(['id' => $entityId])
                ->build();

            //$table = strtolower(Util::camelCaseToUnderscore($entityType));

            /*$query = "UPDATE `{$table}` SET google_calendar_id=" . $pdo->quote($googleCalendarId);

            if ($googleCalendarEventId !== null) {
                $query .= ", google_calendar_event_id=" . $pdo->quote($googleCalendarEventId);
            }

            $query .= "WHERE id=" . $pdo->quote($entityId);*/
        } else {
            $data = $this->getEventEntityGoogleData($entityType, $entityId);

            if ($data && isset($data['id'])) {
                $set = ['googleCalendarId' => $googleCalendarId];

                if ($googleCalendarEventId) {
                    $set['googleCalendarEventId'] = $googleCalendarEventId;
                }

                $query = UpdateBuilder::create()
                    ->in('GoogleCalendarEvent')
                    ->set($set)
                    ->where(['id' => $data['id']])
                    ->build();

                /*$query = "UPDATE google_calendar_event SET google_calendar_id=" . $pdo->quote($googleCalendarId);

                if ($googleCalendarEventId !== null) {
                    $query .= ", google_calendar_event_id=" . $pdo->quote($googleCalendarEventId);
                }

                $query .= "WHERE id=" . $pdo->quote($data['id']);*/
            } else {
                /*$query = InsertBuilder::create()
                    ->into('GoogleCalendarEvent')
                    ->columns([
                        'entityType',
                        'entityId',
                        'googleCalendarId',
                        'googleCalendarEventId',
                    ])
                    ->values([
                        'entityType' => $entityType,
                        'entityId' => $entityId,
                        'googleCalendarId' => $googleCalendarId,
                        'googleCalendarEventId' => $googleCalendarEventId,
                    ])
                    ->build();*/

                $this->entityManager->createEntity('GoogleCalendarEvent', [
                    'entityType' => $entityType,
                    'entityId' => $entityId,
                    'googleCalendarId' => $googleCalendarId,
                    'googleCalendarEventId' => $googleCalendarEventId,
                ]);

                return true;

                /*$query = "
                    INSERT INTO google_calendar_event
                    (`entity_type`,`entity_id`,`google_calendar_id`,`google_calendar_event_id`)
                    VALUES (" .
                        $pdo->quote($entityType) . ", " .
                        $pdo->quote($entityId) . ", " .
                        $pdo->quote($googleCalendarId) . ", " .
                        $pdo->quote($googleCalendarEventId) . ")";*/
            }
        }

        try {
            $this->entityManager->getQueryExecutor()->execute($query);

            return true;
        } catch (\Exception $e) {
            $GLOBALS['log']->error("GoogleCalendarERROR: Failed query: " . $e->getMessage());
        }

        return false;
    }

    public function resetEventRelation($entityType, $entityId)
    {
        if (in_array($entityType, $this->coreEventTypes)) {
            $query = UpdateBuilder::create()
                ->in($entityType)
                ->set([
                    'googleCalendarId' => null,
                    'googleCalendarEventId' => null,
                ])
                ->where(['id' => $entityId])
                ->build();

            /*
            $query = "UPDATE `{$table}`
                SET google_calendar_id=NULL, google_calendar_event_id=NULL
                WHERE id=" . $pdo->quote($entityId);*/
        } else {
            $query = DeleteBuilder::create()
                ->from('GoogleCalendarEvent')
                ->where([
                    'entityId' => $entityId,
                    'entityType' => $entityType,
                ])
                ->build();

            /*$query = "DELETE FROM google_calendar_event
                WHERE entity_id=" . $pdo->quote($entityId) . " AND entity_type=" . $pdo->quote($entityType);*/
        }

        try {
            //$sth = $pdo->prepare($query);
            //$sth->execute();

            $this->entityManager->getQueryExecutor()->execute($query);

            return true;
        } catch (\Exception $e) {
            $GLOBALS['log']->error("GoogleCalendarERROR: Failed query :" . $e->getMessage());
        }

        return false;
    }

    public function getEventEntityGoogleData($entityType, $entityId)
    {
        /*$pdo = $this->getEntityManager()->getPDO();
        $query = "
            SELECT
                id AS id,
                google_calendar_id as googleCalendarId,
                google_calendar_event_id as googleCalendarEventId
            FROM google_calendar_event
            WHERE entity_id=" . $pdo->quote($entityId) . " AND
                entity_type=" . $pdo->quote($entityType);

        $sth = $pdo->prepare($query);
        $sth->execute();*/

        $query = SelectBuilder::create()
            ->from('GoogleCalendarEvent')
            ->select([
                'id',
                'googleCalendarId',
                'googleCalendarEventId',
            ])
            ->where([
                'entityId' => $entityId,
                'entityType' => $entityType,
            ])
            ->build();

        $sth = $this->entityManager->getQueryExecutor()->execute($query);

        return $sth->fetch(\PDO::FETCH_ASSOC);
    }
}
