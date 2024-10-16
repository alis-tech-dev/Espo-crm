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

use Espo\Modules\Google\Core\Google\Clients\Calendar as CalendarClient;
use Espo\Modules\Google\Repositories\GoogleCalendar;
use Espo\ORM\Entity;

class Event extends Base
{
    public $calendarId;

    public $syncParams = [];

    private $googleEspoPairs = [
        'summary' => 'name',
        'start' => 'dateStart',
        'end' => 'dateEnd',
        'description' => 'description',
        'startDate' => 'dateStartDate',
        'endDate' => 'dateEndDate',
    ];

    private $statusPairs = [
        "needsAction" => "None",
        "accepted" => "Accepted",
        "tentative" => "Tentative",
        "declined" => "Declined",
    ];

    /**
     * @return string
     */
    public function getCalendarId()
    {
        return $this->calendarId;
    }

    /**
     * @param string $calendarId
     */
    public function setCalendarId($calendarId)
    {
        $this->calendarId = $calendarId;
    }


    /**
     * @return CalendarClient
     */
    protected function getClient()
    {
        return parent::getClient()->getCalendarClient();
    }

    /**
     * @return GoogleCalendar
     */
    protected function getGoogleCalendarRepository()
    {
        /** @var GoogleCalendar */
        return $this->getEntityManager()
            ->getRepository('GoogleCalendar');
    }

    /**
     * @param $params
     * @return array<string, mixed>
     */
    public function getEventList($params = [])
    {
        return $this->getClient()
            ->getEventList($this->getCalendarId(), $params);
    }

    public function getEventInstances($eventId, $params = [])
    {
        return $this->getClient()
            ->getEventInstances($this->getCalendarId(), $eventId, $params);
    }

    public function insertIntoGoogle($espoEvent)
    {
        $googleEvent = $this->convertEventToGoogle($espoEvent);

        if (!empty($googleEvent)) {
            $response = $this->getClient()->insertEvent($this->getCalendarId(), $googleEvent);

            if (is_array($response) && !empty($response['id'])) {
                return $this->getGoogleCalendarRepository()->storeEventRelation(
                    $espoEvent['scope'],
                    $espoEvent['id'],
                    $this->syncParams['calendar']->get('googleCalendarId'),
                    $response['id']
                );
            }
        }

        $this->getGoogleCalendarRepository()->resetEventRelation($espoEvent['scope'], $espoEvent['id']);

        return false;
    }

    public function updateGoogleEvent($event, $withCompare)
    {
       $googleEvent = $this->retrieveGoogleEvent($event['googleCalendarEventId']);

        if (!is_object($googleEvent) || $googleEvent->getId() == '') {
            return false;
        }

        if ($withCompare && $event['modifiedAt'] < $googleEvent->updated() || $googleEvent->isPrivate()) {
            return false;
        }

        $changedFields = [];

        if ($googleEvent->isDeleted() != $event['deleted']) {

            if ($event['deleted']) {
                //$this->getGoogleCalendarRepository()->resetEventRelation($event['scope'], $event['id']);
                if ($this->syncParams['removeGCEventIfRemovedInEspo'] ||
                    $googleEvent->getSource() == "EspoCRM") {
                    $deleteResult = $this->getClient()->deleteEvent($this->getCalendarId(), $googleEvent->getId());

                    return $deleteResult;
                }
            }
            else {
                $googleEvent->restore();
                $changedFields[] = 'status';
            }
        }

        $name = $googleEvent->getSummary();

        $parsedName = $this->parseGoogleEventName($name);

        if ($parsedName['name'] != $event['name'] || $parsedName['scope'] != $event['scope']) {
            $changedFields[] = 'name';
            $googleEvent->setSummary($this->convertToGoogleEventName($event['scope'], $event['name']));
        }

        foreach ($this->googleEspoPairs as $googleField => $espoField) {
            $googleFieldUCF = ucfirst($googleField);

            if (!array_key_exists($espoField, $event)) {
                continue;
            }

            if (
                $espoField != 'name' &&
                method_exists($googleEvent, 'get' . $googleFieldUCF) &&
                method_exists($googleEvent, 'set' . $googleFieldUCF) &&
                $googleEvent->{'get' . $googleFieldUCF}() != $event[$espoField]
            ) {

                $changedFields[] = $googleField;
                $googleEvent->{'set' . $googleFieldUCF}($event[$espoField]);
            }
        }

        if (!$this->syncParams['dontSyncEventAttendees'] && $event['attendees'] !== null) {
            $modifiedAtt = false;

            $googleAttendees = $googleEvent->getAttendees();
            $googleAttendeesEmails = [];

            foreach ($googleAttendees as $gcAttendee) {
                $googleAttendeesEmails[] = $gcAttendee['email'];
            }

            foreach ($event['attendees'] as $espoAttendee) {
                $emailAddress = '';

                foreach ($espoAttendee['emailData'] as $email) {
                    if (!is_object($email)) {
                        continue;
                    }

                    if (in_array($email->emailAddress, $googleAttendeesEmails)) {
                        $emailAddress = $email->emailAddress;

                        break;
                    }
                }

                if (
                    empty($emailAddress) &&
                    isset($espoAttendee['emailData']) &&
                    isset($espoAttendee['emailData'][0]) && is_object($espoAttendee['emailData'][0])
                ) {
                    $emailAddress = $espoAttendee['emailData'][0]->emailAddress;
                }

                if (!empty($emailAddress)) {
                    $gAttendeeStatus = array_search($espoAttendee['status'], $this->statusPairs);

                    if ($espoAttendee['id'] == $this->syncParams['userId']) {
                        if (in_array($emailAddress, $googleAttendeesEmails) || count($event['attendees']) > 1) {
                            $modifiedAtt |= $googleEvent->addAttendee($emailAddress, $gAttendeeStatus);
                        }
                    } else {
                        $modifiedAtt |= $googleEvent->addAttendee($emailAddress, $gAttendeeStatus);
                    }
                }
            }

            if ($modifiedAtt) {
                $changedFields[] = 'attendees';
            }
        }

        if (!empty($changedFields)) {
            $res = $this->getClient()
                ->updateEvent($this->getCalendarId(), $googleEvent->getId(), $googleEvent->build());

            if (!$res) {
                $this->getGoogleCalendarRepository()
                    ->storeEventRelation($event['scope'], $event['id'], '', 'FAIL');
            }
            else {
                return true;
            }
        }

        return false;
    }

    public function updateEspoEvent($event, $withCompare = true)
    {
        $googleEvent = $this->asGoogleEvent($event);
        $parsedName = $this->parseGoogleEventName($googleEvent->getSummary());
        $scope = $parsedName['scope'];
        $name = $parsedName['name'];

        if (!$this->getAcl()->check($scope, 'edit')) {
            return false;
        }

        if ($googleEvent->isDeleted()) {
            $this->deleteRecurrentInstancesFromEspo($googleEvent->getId());
        }

        if ($googleEvent->getRecurrence() != '' && $googleEvent->getRecurringEventId() == '' ) {
            $this->deleteRecurrentInstancesFromEspo($googleEvent->getId());

            if (!$googleEvent->isPrivate() && $googleEvent->hasEnd()) {
                $this->addRecurrentEventToQueue($googleEvent->getId());

                $espoEvents = $this->getGoogleCalendarRepository()->getEntitiesByGCId(
                    $this->syncParams['userId'],
                    $googleEvent->getId(),
                    $this->syncParams['syncEntities']
                );

                foreach ($espoEvents as $espoEvent) {
                    $this->getGoogleCalendarRepository()->resetEventRelation(
                        $espoEvent->getEntityType(),
                        $espoEvent->get('id')
                    );

                    $this->getEntityManager()->removeEntity($espoEvent, ['silent' => true]);
                }
            }

            return false;
        }

        if (!$googleEvent->isDeleted() && $googleEvent->getStart() < $this->syncParams['fetchSince']) {
            return false;
        }

        $espoEvents = $this->getGoogleCalendarRepository()->getEntitiesByGCId(
            $this->syncParams['userId'],
            $googleEvent->getId(),
            $this->syncParams['syncEntities']
        );

        if (empty($espoEvents)) {
            if (in_array($scope, $this->syncParams['syncEntities'])) {
                $espoEvents = [$this->getEntityManager()->getEntity($scope)];
            }
            else {
                return false;
            }
        }

        foreach ($espoEvents as $espoEvent) {
            if ($espoEvent->get('deleted')) {
                continue;
            }

            if (!is_object($espoEvent) || !in_array($espoEvent->getEntityType(), $this->syncParams['syncEntities'])) {
                continue;
            }

            $eventIsNew = $espoEvent->isNew();

            if ($googleEvent->isDeleted() || $googleEvent->isPrivate() || !$googleEvent->hasEnd()) {
                if ($espoEvent) {
                    if (!$eventIsNew && $this->getAcl()->check($espoEvent->getEntityType(), 'delete')) {
                        $this->getGoogleCalendarRepository()->resetEventRelation(
                            $espoEvent->getEntityType(),
                            $espoEvent->get('id')
                        );
                        $this->getEntityManager()->removeEntity($espoEvent, ['silent' => true]);
                    }
                }

                continue;
            }
            if ($scope != $espoEvent->getEntityType() && in_array($scope, $this->syncParams['syncEntities'])) {
                if ($googleEvent->getSource() != "EspoCRM") {

                    $espoEvent->loadLinkMultipleField('users', array('status' => "acceptanceStatus"));
                    $espoEvent->loadLinkMultipleField('contacts', array('status' => "acceptanceStatus"));
                    $espoEvent->loadLinkMultipleField('leads', array('status' => "acceptanceStatus"));

                    $oldValues = [];

                    foreach ($espoEvent->fields as $field => $fieldParams) {
                        if ($field == 'id') {
                            continue;
                        }

                        $oldValues[$field] = $espoEvent->get($field);
                    }

                    if ($espoEvent) {
                        $this->getGoogleCalendarRepository()->resetEventRelation(
                            $espoEvent->getEntityType(),
                            $espoEvent->get('id')
                        );

                        $this->getEntityManager()->removeEntity($espoEvent, array('silent' => true));
                    }

                    $espoEvent = $this->getEntityManager()->getEntity($scope);

                    $eventIsNew = true;

                    $espoEvent->set($oldValues);
                }
            }

            if (!in_array($espoEvent->getEntityType(), $this->syncParams['syncEntities'])) {
                continue;
            }

            if (!$eventIsNew && $withCompare && $espoEvent->get('modifiedAt') > $googleEvent->updated()) {
                continue;
            }

            $isModified = false;

            if (
                !$eventIsNew &&
                $espoEvent->get('googleCalendarId') != $this->syncParams['calendar']->get('googleCalendarId')
            ) {
                $this->getGoogleCalendarRepository()->storeEventRelation(
                        $espoEvent->getEntityType(),
                        $espoEvent->get('id'),
                        $this->syncParams['calendar']->get('googleCalendarId')
                    );
            }

            $entityDefs = method_exists($this->getEntityManager(), 'getDefs') ?
                $this->getEntityManager()
                    ->getDefs()
                    ->getEntity($espoEvent->getEntityType()) :
                null;

            foreach ($this->googleEspoPairs as $googleField => $espoField) {
                if (!$espoEvent->hasAttribute($espoField)) {
                    continue;
                }

                if ($espoField == 'name') {
                    $googleValue = $name;
                }
                else {
                    if (!method_exists($googleEvent, 'get' . ucfirst($googleField))) {
                        continue;
                    }

                    $googleValue = $googleEvent->{'get' . ucfirst($googleField)}();
                }

                if (
                    $espoEvent->getAttributeType($espoField) === Entity::VARCHAR &&
                    $entityDefs
                ) {
                    $maxLength = $entityDefs->getAttribute($espoField)->getLength() ?? 255;

                    $googleValue = substr($googleValue, 0, $maxLength);
                }

                if ($eventIsNew) {
                    $espoEvent->set($espoField, $googleValue);
                }
                else {
                    if ($espoEvent->get($espoField) != $googleValue) {
                        $espoEvent->set($espoField, $googleValue);
                        $isModified = true;
                    }
                }
            }

            $attendeeFields = [
                'usersIds',
                'contactsIds',
                'leadsIds',
                'usersColumns',
                'contactsColumns',
                'leadsColumns',
            ];

            if ($eventIsNew) {
                $userId = $this->syncParams['userId'];
                $espoEvent->set('assignedUserId', $userId);

                if ($this->syncParams['assignDefaultTeam']) {
                    $user = $this->getEntityManager()->getEntity('User', $userId);

                    if ($user && $user->get('defaultTeamId')) {
                        $teamsIds = $espoEvent->get('teamsIds') ?? [];
                        $teamsIds[] = $user->get('defaultTeamId');

                        $espoEvent->set('teamsIds', $teamsIds);
                    }
                }

                $dateEspo = new \DateTime($espoEvent->get('dateEnd'));
                $dateNow = new \DateTime();

                if ($dateEspo < $dateNow) {
                    $espoEvent->set('status', 'Held');
                }

                if ($espoEvent->hasRelation('users') &&
                    $espoEvent->hasRelation('contacts') &&
                    $espoEvent->hasRelation('leads')
                ) {

                    foreach ($googleEvent->getAttendees() as $gAttendee) {
                        if (!empty($gAttendee['email'])) {
                            $entity = $this->getEntityManager()
                                ->getRepository('EmailAddress')
                                ->getEntityByAddress($gAttendee['email']);


                            if (!empty($entity)) {
                                $id = $entity->get('id');
                                $entityName = strtolower($entity->getEntityType());

                                ${$entityName ."sIds"}[] = $id;

                                if (!isset(${$entityName . "sColumns"})) {
                                    ${$entityName . "sColumns"} = new \stdClass();
                                }

                                $columnData = new \stdClass();
                                $columnData->status = $this->statusPairs[$gAttendee['responseStatus']];
                                ${$entityName . "sColumns"}->$id = $columnData;
                            }
                        }
                    }

                    if (empty($usersIds) || !in_array($userId, $usersIds)) {
                        $usersIds[] = $userId;

                        if (!isset($usersColumns)) {
                            $usersColumns = new \stdClass();
                        }

                        $columnData = new \stdClass();
                        $columnData->status = 'None';
                        $usersColumns->$userId = $columnData;
                    }

                    foreach ($attendeeFields as $attendeeField) {
                        if ($espoEvent->hasField($attendeeField) && !empty($$attendeeField)) {
                            $espoEvent->set($attendeeField, $$attendeeField);
                        }
                    }
                }
            }
            else {
                $espoAttendees = $this->getGoogleCalendarRepository()
                    ->getEventAttendees($espoEvent->getEntityType(), $espoEvent->get('id'));

                if ($espoAttendees !== null) {
                    $espoEvent->loadLinkMultipleField('users', ['status' => "acceptanceStatus"]);
                    $espoEvent->loadLinkMultipleField('contacts', ['status' => "acceptanceStatus"]);
                    $espoEvent->loadLinkMultipleField('leads', ['status' => "acceptanceStatus"]);

                    foreach ($googleEvent->getAttendees() as $gAttendee) {
                        if (!empty($gAttendee['email'])) {
                            $emailOwner = '';

                            foreach ($espoAttendees as $eAttendee) {
                                if (!empty($eAttendee['emailData']) && is_array($eAttendee['emailData'])) {
                                    foreach ($eAttendee['emailData'] as $email) {
                                        if (
                                            is_object($email) &&
                                            strtolower($email->emailAddress) == strtolower($gAttendee['email'])
                                        ) {
                                            $emailOwner = $eAttendee;

                                            break 2;
                                        }
                                    }
                                }
                            }

                            if (empty($emailOwner)) {
                                $entity = $this->getEntityManager()
                                    ->getRepository('EmailAddress')
                                    ->getEntityByAddress($gAttendee['email']);

                                $entityName = (!empty($entity)) ? strtolower($entity->getEntityType()) : '';

                                if (in_array($entityName ."sIds", $attendeeFields)) {
                                    $id = $entity->get('id');

                                    ${$entityName ."sIds"} = $espoEvent->get($entityName ."sIds");
                                    ${$entityName ."sIds"}[] = $entity->get('id');

                                    ${$entityName . "sColumns"}  = $espoEvent->get($entityName . "sColumns");

                                    if (!isset(${$entityName . "sColumns"})) {
                                        ${$entityName . "sColumns"} = new \stdClass();
                                    }

                                    $columnData = new \stdClass();
                                    $columnData->status = $this->statusPairs[$gAttendee['responseStatus']];
                                    ${$entityName . "sColumns"}->$id = $columnData;

                                    $espoEvent->set($entityName . "sIds", ${$entityName ."sIds"});
                                    $espoEvent->set($entityName . "sColumns", ${$entityName . "sColumns"});

                                    $isModified = true;
                                }
                            }
                            else {
                                if (
                                    $eAttendee['status'] != $this->statusPairs[$gAttendee['responseStatus']] &&
                                    $this->statusPairs[$gAttendee['responseStatus']] != "None"
                                ) {
                                    $entityName = strtolower($eAttendee['scope']);
                                    $entityId = $eAttendee['id'];

                                    ${$entityName . "sColumns"} = $espoEvent->get($entityName . "sColumns");

                                    ${$entityName . "sColumns"}->$entityId->status =
                                        $this->statusPairs[$gAttendee['responseStatus']];

                                    $espoEvent->set($entityName . "sColumns", ${$entityName . "sColumns"});

                                    $isModified = true;
                                }
                            }
                        }
                    }
                }
            }
            if ($eventIsNew || $isModified) {
                $this->getEntityManager()->saveEntity($espoEvent, array('silent' => true));

                if ($eventIsNew) {
                    $this->getGoogleCalendarRepository()->storeEventRelation(
                        $espoEvent->getEntityType(),
                        $espoEvent->get('id'),
                        $this->syncParams['calendar']->get('googleCalendarId'),
                        $googleEvent->getId()
                    );
                }
            }
        }

        return true;
    }

    public function convertEventToGoogle($espoEvent)
    {
        $googleEvent = $this->asGoogleEvent();
        $espoEvent['name'] = $this->convertToGoogleEventName($espoEvent['scope'], $espoEvent['name']);

        if (empty($espoEvent['dateEnd'])) {
            $espoEvent['dateEnd'] = $espoEvent['dateStart'];
        }

        foreach ($this->googleEspoPairs as $googleField => $espoField) {
            if (method_exists($googleEvent, 'set' . ucfirst($googleField)) && isset($espoEvent[$espoField])) {
                $googleEvent->{'set' . ucfirst($googleField)}($espoEvent[$espoField]);
            }
        }

        if (!empty($espoEvent['attendees'])) {
            foreach($espoEvent['attendees'] as $attendee) {
                if (
                    $this->syncParams['dontSyncEventAttendees'] &&
                    in_array($attendee['entityType'], ['Contact', 'Lead'])
                ) {
                    continue;
                }

                if (!empty($attendee['emailData'])) {
                    if ($attendee['id'] != $this->syncParams['userId'] || count($espoEvent['attendees']) > 1) {
                        $googleEvent->addAttendee(
                            $attendee['emailData'][0]->emailAddress,
                            array_search($attendee['status'], $this->statusPairs)
                        );
                    }
                }
            }
        }

        $siteUrl = rtrim($this->config->get('siteUrl'), '/');
        $url = $siteUrl . '/#' . $espoEvent['scope'] . '/view/' . $espoEvent['id'];

        $googleEvent->setSource('EspoCRM', $url);

        return $googleEvent->build();
    }

    public function parseGoogleEventName($value)
    {
        $scope = $this->syncParams['defaultEntity'];
        $name = $value;

        foreach ($this->syncParams['entityLabels'] as $entityType => $label) {
            if (!empty($label)) {
                $pattern = "/^{$label}[':',' ','-']+/i";

                $matchRes = preg_match_all($pattern, $value, $matches);
                if ($matchRes > 0) {
                    $scope = $entityType;
                    $name = preg_replace($pattern, '', $value, 1);

                    if (empty($name)) {
                        $name = $value;
                    }

                    break;
                }
            } else {
                $scope = $entityType;

                break;
            }
        }

        return ['scope' => $scope, 'name' => $name];
    }

    public function convertToGoogleEventName($scope, $name)
    {
        $label = $this->syncParams['entityLabels'][$scope];

        if (!empty($label)) {
            $label .= ": ";
        }

        return $label . $name;
    }

    public function retrieveGoogleEvent($id)
    {
        $event = $this->getClient()->retrieveEvent($this->getCalendarId(), $id);

        if (!empty($event)) {
            return $this->asGoogleEvent($event);
        }

        return false;
    }

    private function asGoogleEvent(array $event = [])
    {
        $googleEvent = new \Espo\Modules\Google\Core\Google\Items\Event($event);

        $googleEvent->setDefaults([
            'timeZone' => $this->syncParams['googleTimeZone'],
            'userTimeZone' => $this->syncParams['userTimeZone']
        ]);

        return $googleEvent;
    }

    private function addRecurrentEventToQueue($eventId)
    {
       //old
        $this->getGoogleCalendarRepository()->addRecurrentEventToQueue(
            $this->syncParams['calendar']->get('id'),
            $eventId
        );
    }

    public function getRecurrentEventFromQueue()
    {
        return $this->getGoogleCalendarRepository()->getRecurrentEventFromQueue(
            $this->syncParams['calendar']->get('id')
        );
    }

    public function updateRecurrentEvent($id, $pageToken = '', $lastEventTime = null)
    {
        $this->getGoogleCalendarRepository()->updateRecurrentEvent($id, $pageToken, $lastEventTime);
    }

    public function removeRecurrentEventFromQueue($id)
    {
        $this->getGoogleCalendarRepository()->removeRecurrentEventFromQueue($id);
    }

    public function deleteRecurrentInstancesFromEspo($id)
    {
        $this->getGoogleCalendarRepository()->deleteRecurrentInstancesFromEspo(
            $this->syncParams['calendar']->get('googleCalendarId'),
            $id,
            $this->syncParams['syncEntities']
        );
    }
}
