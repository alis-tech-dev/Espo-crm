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

use Espo\Core\Exceptions\Error;
use Espo\Entities\ExternalAccount;
use Espo\Modules\Google\Core\Google\Clients\Calendar as CalendarClient;
use Espo\ORM\Entity;

class Calendar extends Base
{
    const MAX_EVENT_COUNT = 20;
    const MAX_ESPO_EVENT_INSERT_COUNT = 20;
    const MAX_ESPO_EVENT_UPDATE_COUNT = 20;
    const MAX_RECURRENT_EVENT_COUNT = 20;

    const SUCCESS_INCREMENT = 1;
    const FAIL_INCREMENT = 0.5;

    private $syncParams = [];
    private $eventManager;

    private $eventCounter = 0;
    private $recurrentEventCounter = 0;
    private $espoEventInsertCounter = 0;
    private $espoEventUpdateCounter = 0;

    /**
     * @return CalendarClient
     */
    protected function getClient()
    {
        return parent::getClient()->getCalendarClient();
    }

    /**
     * @return Event
     */
    protected function getEventManager()
    {
        return $this->eventManager;
    }

    /**
     * @return array
     */
    public function getCalendarList($params = [])
    {
        static $lists = [];

        $client = $this->getClient();
        $response = $client->getCalendarList($params);

        if (is_array($response) && isset($response['items'])) {
            foreach ($response['items'] as $item) {
                $lists[$item['id']] = $item['summary'];
            }

            if (isset($response['nextPageToken'])) {
                $params['pageToken'] = $response['nextPageToken'];
                $this->getCalendarList($params);
            }
         }

         return $lists;
    }

    private function resetCounters()
    {
        $this->eventCounter = 0;
        $this->recurrentEventCounter = 0;
        $this->espoEventInsertCounter = 0;
        $this->espoEventUpdateCounter = 0;
    }

    /**
     * @param Entity $calendar
     * @param ExternalAccount $externalAccount
     * @return void
     */
    private function prepareData($calendar, $externalAccount)
    {
        $this->resetCounters();

        $integrationStartDate = $externalAccount->get('calendarStartDate');
        $lastSync = $calendar->get('lastSync');
        $lastSyncArr = explode('_',  $lastSync);
        $lastSyncTime = (isset($lastSyncArr[0])) ? $lastSyncArr[0] : '';
        $lastSyncId = (isset($lastSyncArr[1])) ? $lastSyncArr[1] : '';
        $startDate = (!empty($lastSyncTime) && $lastSyncTime > $integrationStartDate) ?
            $lastSyncTime :
            $integrationStartDate;

        $tz = new \DateTimeZone('UTC');
        $startSyncTime = new \DateTime('now', $tz);

        $entityLabels = [];
        $syncEntities = [];
        $syncEntitiesTMP = $externalAccount->get('calendarEntityTypes');

        if (is_array($syncEntitiesTMP)) {
            foreach ($syncEntitiesTMP as $syncEntity) {
                if ($this->getAcl()->check($syncEntity, 'read')) {
                    $syncEntities[] = $syncEntity;
                }
            }
        }

        if (empty($syncEntities)) {
            throw new Error("No Allowed Entity Chosen");
        }

        foreach ($syncEntities as $entity) {

            $label = $externalAccount->get($entity . "IdentificationLabel");

            if (empty($label)) {
                $entityLabels[$entity] = $label;
            } else {
                $entityLabels = [$entity => $label] + $entityLabels;
            }
        }

        $googleCalendar = $this->getEntityManager()
            ->getRDBRepository($calendar->getEntityType())
            ->getRelation($calendar, 'googleCalendar')
            ->findOne();

        //$googleCalendar = $calendar->get('googleCalendar');

        if (!$googleCalendar) {
            throw new Error("Cannot load calendar for user {$calendar->get('userId')}.");
        }

        $googleCalendarId = $googleCalendar->get('calendarId');
        $isMain = ($calendar->get('type') == 'main');

        $calendarInfo = $this->getClient()->getCalendarInfo($googleCalendarId);

        $googleTimeZone = (!empty($calendarInfo) && isset($calendarInfo['timeZone'])) ? $calendarInfo['timeZone'] : 'UTC';

        $userPreference = $this->getEntityManager()->getEntity('Preferences', $calendar->get('userId'));

        $userTimeZone = $userPreference->get('timeZone');

        $defaultEntity = (
            in_array(
                $externalAccount->get('calendarDefaultEntity'), $syncEntities)
            ) ?
            $externalAccount->get('calendarDefaultEntity') :
            '';

        $this->syncParams = [
            'fetchSince' => $integrationStartDate,
            'startDate' => $startDate,
            'lastUpdatedId' => $lastSyncId,
            'syncEntities' => $syncEntities,
            'entityLabels' => $entityLabels,
            'userId' => $calendar->get('userId'),
            'googleCalendarId' => $googleCalendarId,
            'direction' => $externalAccount->get('calendarDirection'),
            'defaultEntity' => $defaultEntity,
            'isMain' => $isMain,
            'isInMain' => (!$isMain && $externalAccount->get('calendarMainCalendarId') == $googleCalendarId),
            'calendar' => $calendar,
            'startSyncTime' => $startSyncTime->format('Y-m-d H:i:s'),
            'googleTimeZone' => (!empty($googleTimeZone)) ? $googleTimeZone : 'UTC',
            'userTimeZone' => (!empty($userTimeZone)) ? $userTimeZone : 'UTC',
            'removeGCEventIfRemovedInEspo' => $externalAccount->get('removeGoogleCalendarEventIfRemovedInEspo'),
            'dontSyncEventAttendees' => $externalAccount->get('dontSyncEventAttendees'),
            'assignDefaultTeam' => $externalAccount->get('calendarAssignDefaultTeam'),
        ];

        $this->eventManager = new Event(
            $this->getContainer(),
            $this->getEntityManager(),
            $this->getMetadata(),
            $this->getConfig()
        );

        $this->eventManager->setUserId($this->getUserId());
        $this->eventManager->setCalendarId($googleCalendarId);

        $this->eventManager->syncParams = $this->syncParams;
    }

    private function insertNewEspoEventsIntoGoogle()
    {
        $collection = $this->getEntityManager()->getRepository('GoogleCalendar')->getNewEvents(
            $this->syncParams['userId'],
            $this->syncParams['syncEntities'],
            $this->syncParams['fetchSince'],
            self::MAX_ESPO_EVENT_INSERT_COUNT
        );

        foreach ($collection as $espoEvent) {
            try {
                $insertResult = $this->getEventManager()->insertIntoGoogle($espoEvent);
            } catch (\Exception $e) {
                $GLOBALS['log']->error("Google Calendar Sync error: " . $e->getMessage());
                continue;
            }

            $this->espoEventInsertCounter += (($insertResult) ? self::SUCCESS_INCREMENT : self::FAIL_INCREMENT);
        }

        if (count($collection) > 0 && $this->espoEventInsertCounter < self::MAX_ESPO_EVENT_INSERT_COUNT) {
            $this->insertNewEspoEventsIntoGoogle();
        }

        return true;
    }

    private function updateEspoEventsInGoogle($withCompare = false)
    {
        $collection = $this->getEntityManager()->getRepository('GoogleCalendar')->getEvents(
            $this->syncParams['userId'],
            $this->syncParams['syncEntities'],
            $this->syncParams['startDate'],
            $this->syncParams['startSyncTime'],
            $this->syncParams['lastUpdatedId'],
            $this->syncParams['googleCalendarId'],
            self::MAX_ESPO_EVENT_UPDATE_COUNT
        );

        $lastDate = '';

        foreach ($collection as $espoEvent) {
            $updateResult = $this->getEventManager()->updateGoogleEvent($espoEvent, $withCompare);
            $this->espoEventUpdateCounter += (($updateResult) ? self::SUCCESS_INCREMENT : self::FAIL_INCREMENT);
            $lastDate = (!empty($espoEvent['modifiedAt'])) ? $espoEvent['modifiedAt'] : $espoEvent['createdAt'];
            $id = $espoEvent['id'];
        }

        if (!empty($lastDate)) {
            $this->syncParams['calendar']->set('lastSync', $lastDate . '_' . $id);

            try {
                $this->getEntityManager()->saveEntity($this->syncParams['calendar']);
            }
            catch (\Exception $e) {
                $GLOBALS['log']->info("Google Calendar Synchronization: Updating lastSync is failed. ({$lastDate})");
            }
        }

        if (
            count($collection) == self::MAX_ESPO_EVENT_UPDATE_COUNT &&
            $this->espoEventUpdateCounter < self::MAX_ESPO_EVENT_UPDATE_COUNT
        ) {
            $this->updateEspoEventsInGoogle($withCompare);
        }

        return true;
    }

    private function loadGoogleEvents($withCompare = false)
    {

        $syncToken = $this->syncParams['calendar']->get('syncToken');
        $pageToken = $this->syncParams['calendar']->get('pageToken');
        $fetchSince = $this->syncParams['fetchSince'];
        $params = [];

        if (empty($syncToken) && empty($pageToken) && !empty($fetchSince)) {
            $timeMin = new \DateTime($fetchSince . " 00:00:00", new \DateTimeZone($this->syncParams['userTimeZone']));
            $params['timeMin'] = $timeMin->format("Y-m-d\TH:i:s\Z");
        }

        if (!empty($syncToken)) {
            $params['syncToken'] = $syncToken;
        }

        if (!empty($pageToken)) {
            $params['pageToken'] = $pageToken;
        }

        $result = $this->getEventManager()->getEventList($params);
        if (empty($result) || !is_array($result)) {
            return false;
        }

        if (isset($result['success']) && $result['success'] === false) {
            if (isset($result['action']) && $result['action'] == 'resetToken') {
                $toSave = false;

                if (!empty($pageToken)) {
                    $this->syncParams['calendar']->set('pageToken', '');
                    $toSave = true;
                }

                if (empty($pageToken) && !empty($syncToken)) {
                    $this->syncParams['calendar']->set('syncToken', '');
                    $toSave = true;
                }
                if ($toSave) {
                    $this->getEntityManager()->saveEntity($this->syncParams['calendar']);
                }
            }

            return false;
        }

        foreach ($result['items'] as $item) {
            try {
                $updateResult = $this->getEventManager()->updateEspoEvent($item, $withCompare);
            }
            catch (\Exception $e) {
                $GLOBALS['log']->error("Google Calendar Sync error: " . $e->getMessage());

                continue;
            }

            $this->eventCounter += ($updateResult) ? self::SUCCESS_INCREMENT : self::FAIL_INCREMENT;
        }

        if (isset($result['nextPageToken'])) {
            $this->syncParams['calendar']->set('pageToken', $result['nextPageToken']);
            $this->getEntityManager()->saveEntity($this->syncParams['calendar']);

            if ($this->eventCounter < self::MAX_EVENT_COUNT) {
                $this->loadGoogleEvents($withCompare);
            }
        }
        else if (isset($result['nextSyncToken'])) {
            $this->syncParams['calendar']->set('pageToken', '');
            $this->syncParams['calendar']->set('syncToken', $result['nextSyncToken']);
            $this->getEntityManager()->saveEntity($this->syncParams['calendar']);
        }

        return true;
    }

    private function loadRecurrentGoogleEvents($withCompare = false)
    {
        $recurrentEvent = $this->getEventManager()->getRecurrentEventFromQueue();

        if (!empty($recurrentEvent)) {
            $pageToken = $recurrentEvent['pageToken'];
            $params = [];

            if (!empty($pageToken)) {
                $params['pageToken'] = $pageToken;
            }

            try {
                $result = $this->getEventManager()->getEventInstances($recurrentEvent['eventId'], $params);

                if (isset($result['success']) && $result['success'] === false) {
                    if (isset($result['action'])) {
                        if ($result['action'] == 'resetToken') {
                            if (!empty($pageToken)) {
                                $this->getEventManager()->updateRecurrentEvent($recurrentEvent['id']);
                            } else {
                                $this->getEventManager()->removeRecurrentEventFromQueue($recurrentEvent['id']);
                            }

                            throw new \Error("Reset pageToken for recurrent event {$recurrentEvent['id']}");
                        }
                        else if ($result['action'] == 'deleteEvent') {
                            $this->getEventManager()->removeRecurrentEventFromQueue($recurrentEvent['id']);

                            throw new \Error("Delete recurrent event {$recurrentEvent['id']} from queue");
                        }
                    }
                    else {
                        throw new \Error("Sync for Recurrent event {$recurrentEvent['id']} is failed");
                    }
                }

                $lastId = '';

                if (!isset($result['items']) || !is_array($result['items'])) {
                    throw new \Error("Recurrent event {$recurrentEvent['id']} instances are not loaded");
                }

                foreach ($result['items'] as $item) {
                    $updateResult = $this->getEventManager()->updateEspoEvent($item, $withCompare);

                    $this->recurrentEventCounter += ($updateResult) ? self::SUCCESS_INCREMENT : self::FAIL_INCREMENT;

                    $lastId = $item['id'];
                }

                if (isset($result['nextPageToken'])) {
                    $lastIdArr = explode('_', $lastId);
                    $lastDateStr = $recurrentEvent['lastEventTime'];

                    if (is_array($lastIdArr) && !empty($lastIdArr[count($lastIdArr) - 1])) {
                        try {
                            $lastDate = new \DateTime($lastIdArr[count($lastIdArr) - 1]);
                            $lastDateStr = $lastDate->format('Y-m-d H:i:s');
                        }
                        catch (\Exception $e) {
                            $GLOBALS['log']
                                ->error(
                                    'Google Calendar Synchronization: Last recurrent id is ' . $lastId . ". " .
                                    $e->getMessage()
                                );
                        }
                    }

                    $this->getEventManager()
                        ->updateRecurrentEvent($recurrentEvent['id'], $result['nextPageToken'], $lastDateStr);
                }
                else if (isset($result['nextSyncToken'])) {
                    $this->getEventManager()->removeRecurrentEventFromQueue($recurrentEvent['id']);
                }
            }
            catch (\Exception $e) {
                $GLOBALS['log']->error('Google Calendar Synchronization: ' . $e->getMessage());
            }

            if ($this->recurrentEventCounter < self::MAX_RECURRENT_EVENT_COUNT) {
                $this->loadRecurrentGoogleEvents($withCompare);
            }
        }

        return true;
    }

    private function twoWaySync()
    {
        $this->loadGoogleEvents(true);
        $this->loadRecurrentGoogleEvents(true);
        $this->updateEspoEventsInGoogle(true);

        return true;
    }

    private function syncEspoToGC()
    {
        $this->updateEspoEventsInGoogle();
        $this->insertNewEspoEventsIntoGoogle();
    }

    private function syncGCToEspo()
    {
        $this->loadGoogleEvents();
        $this->loadRecurrentGoogleEvents();
    }

    private function syncBoth()
    {
        if ($this->syncParams['isMain'] || !$this->syncParams['isInMain']) {
            $this->twoWaySync();
        }
        else if (!$this->syncParams['isMain'] && $this->syncParams['isInMain']) {
            $mainCalendar = $this->getEntityManager()
                ->getRepository('GoogleCalendar')->getUsersMainCalendar($this->syncParams['userId']);

            if (!empty($mainCalendar)) {
                $this->syncParams['calendar']->set('syncToken', $mainCalendar->get('syncToken'));
                $this->syncParams['calendar']->set('pageToken', $mainCalendar->get('pageToken'));

                $this->getEntityManager()->saveEntity($this->syncParams['calendar']);
            }
        }

        if ($this->syncParams['isMain']) {
            $this->insertNewEspoEventsIntoGoogle();
        }

        return true;
    }

    public function run($calendar, $externalAccount)
    {
        if (!$this->getAcl()->checkScope('GoogleCalendar')) {
            $GLOBALS['log']
                ->info("Google Calendar Synchronization: Access Forbidden for user {$calendar->get('userId')}");

            return false;
        }

        try {
            $this->prepareData($calendar, $externalAccount);
            $method = 'sync' . $this->syncParams['direction'];

            if (method_exists($this, $method)) {
                $this->syncParams['calendar']->set('lastLooked', $this->syncParams['startSyncTime']);
                $this->getEntityManager()->saveEntity($this->syncParams['calendar']);
                $this->$method();

                return true;
            }
        }
        catch (\Exception $e) {
            $GLOBALS['log']
                ->error(
                    "Google Calendar Synchronization: Error when calendar synchronization is running. ".
                    "GoogleCalendarUser Id {$calendar->get('id')}. Message: {$e->getMessage()}"
                );
        }

        return false;
    }
}
