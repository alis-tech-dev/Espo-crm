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

namespace Espo\Modules\Google\Hooks\ExternalAccount;

use Espo\ORM\Entity;

class Google extends \Espo\Core\Hooks\Base
{

    public static $order = 9;

    protected function init()
    {
        parent::init();
        $this->addDependency('serviceFactory');
    }

    protected function getServiceFactory()
    {
        return $this->injections['serviceFactory'];
    }

    public function afterSave(Entity $entity, $options)
    {
        list($integration, $userId) = explode('__', $entity->get('id'));

        if (!empty($options['isTokenRenewal'])) {
            return;
        }

        if ($integration == 'Google') {
            $user = $this->getEntityManager()->getEntity('User', $userId);

            if (!$user) {
                return;
            }

            $userData = null;
            if ($this->getEntityManager()->hasRepository('UserData')) {
                $userData = $this->getEntityManager()->getRepository('UserData')->getByUserId($userId);
            }

            if ($userData) {
                $imapHandlerClassName = '\\Espo\\Modules\\Google\\Core\\Google\\ImapHandler';
                $smtpHandlerClassName = '\\Espo\\Modules\\Google\\Core\\Google\\SmtpHandler';

                $imapHandlers = $userData->get('imapHandlers') ?? (object) [];
                $smtpHandlers = $userData->get('smtpHandlers') ?? (object) [];

                foreach (get_object_vars($imapHandlers) as $emailAddress => $className) {
                    if ($className === $imapHandlerClassName) {
                        unset($imapHandlers->$emailAddress);
                    }
                }
                foreach (get_object_vars($smtpHandlers) as $emailAddress => $className) {
                    if ($className === $smtpHandlerClassName) {
                        unset($smtpHandlers->$emailAddress);
                    }
                }

                if ($entity->get('gmailEnabled')) {
                    if ($entity->get('gmailEmailAddress')) {
                        $emailAddress = strtolower($entity->get('gmailEmailAddress'));
                        $imapHandlers->$emailAddress = '\\Espo\\Modules\\Google\\Core\\Google\\ImapHandler';
                        $smtpHandlers->$emailAddress = '\\Espo\\Modules\\Google\\Core\\Google\\SmtpHandler';
                    }
                }

                $userData->set([
                    'imapHandlers' => $imapHandlers,
                    'smtpHandlers' => $smtpHandlers,
                ]);

                $this->getEntityManager()->saveEntity($userData, ['silent' => true]);
            }

            $storedUsersCalendars = $this->getEntityManager()
                ->getRepository('GoogleCalendar')
                ->storedUsersCalendars($userId);

            $direction = $entity->get('calendarDirection');
            $monitoredCalendarIds = $entity->get('calendarMonitoredCalendarsIds');
            $monitoredCalendars = $entity->get('calendarMonitoredCalendarsNames');

            if (!is_object($monitoredCalendars)) {
                $monitoredCalendars = (object) [];
            }

            if (empty($monitoredCalendarIds)) {
                $monitoredCalendarIds = [];
            }

            $mainCalendarId = $entity->get('calendarMainCalendarId');
            $mainCalendarName = $entity->get('calendarMainCalendarName');

            if ($direction == "GCToEspo" && !in_array($mainCalendarId, $monitoredCalendarIds)) {
                $monitoredCalendarIds[] = $mainCalendarId;
                $monitoredCalendars->$mainCalendarId = $mainCalendarName;
            }

            foreach ($monitoredCalendarIds as $calendarId) {
                $googleCalendar = $this->getEntityManager()
                    ->getRepository('GoogleCalendar')
                    ->getCalendarByGCId($calendarId, $userId);

                if (empty($googleCalendar)) {
                    $googleCalendar = $this->getEntityManager()->getEntity('GoogleCalendar');
                    $googleCalendar->set('name', $monitoredCalendars->$calendarId);
                    $googleCalendar->set('calendarId', $calendarId);

                    $this->getEntityManager()->saveEntity($googleCalendar);
                }

                $id = $googleCalendar->get('id');

                if (isset($storedUsersCalendars['monitored'][$id])) {
                    if (!$storedUsersCalendars['monitored'][$id]['active']) {
                        $calendarEntity = $this->getEntityManager()
                            ->getEntity('GoogleCalendarUser', $storedUsersCalendars['monitored'][$id]['id']);
                        $calendarEntity->set('active', true);

                        $this->getEntityManager()->saveEntity($calendarEntity);

                    }
                } else {
                    $calendarEntity = $this->getEntityManager()->getEntity('GoogleCalendarUser');

                    $calendarEntity->set('userId', $userId);
                    $calendarEntity->set('type', 'monitored');
                    $calendarEntity->set('role', 'owner');
                    $calendarEntity->set('googleCalendarId', $id);

                    $this->getEntityManager()->saveEntity($calendarEntity);
                }
            }

            foreach ($storedUsersCalendars['monitored'] as $calendar) {
                if (
                    $calendar['active'] &&
                    (!is_array($monitoredCalendarIds) || !in_array($calendar['calendarId'], $monitoredCalendarIds))
                ) {
                    $calendarEntity = $this->getEntityManager()->getEntity('GoogleCalendarUser', $calendar['id']);
                    $calendarEntity->set('active', false);

                    $this->getEntityManager()->saveEntity($calendarEntity);
                }
            }

            if ($direction == "GCToEspo") {
                $mainCalendarId = '';
                $mainCalendarName = [];
            }

            if (empty($mainCalendarId)) {
                foreach($storedUsersCalendars['main'] as $calendar) {
                    if ($calendar['active']) {
                        $calendarEntity = $this->getEntityManager()
                            ->getEntity('GoogleCalendarUser', $calendar['id']);

                        $calendarEntity->set('active', false);
                        $this->getEntityManager()->saveEntity($calendarEntity);
                    }
                }
            } else {
                $googleCalendar = $this->getEntityManager()
                    ->getRepository('GoogleCalendar')
                    ->getCalendarByGCId($mainCalendarId, $userId);

                if (empty($googleCalendar)) {
                    $googleCalendar = $this->getEntityManager()->getEntity('GoogleCalendar');

                    $googleCalendar->set('name', $mainCalendarName);
                    $googleCalendar->set('calendarId', $mainCalendarId);

                    $this->getEntityManager()->saveEntity($googleCalendar);
                }

                $id = $googleCalendar->get('id');

                foreach ($storedUsersCalendars['main'] as $calendarId => $calendar) {
                    if ($calendar['active'] && $id != $calendarId) {
                        $calendarEntity = $this->getEntityManager()->getEntity('GoogleCalendarUser', $calendar['id']);
                        $calendarEntity->set('active', false);

                        $this->getEntityManager()->saveEntity($calendarEntity);
                    }
                    else if (!$calendar['active'] && $id == $calendarId) {
                        $calendarEntity = $this->getEntityManager()->getEntity('GoogleCalendarUser', $calendar['id']);
                        $calendarEntity->set('active', true);

                        $this->getEntityManager()->saveEntity($calendarEntity);
                    }
                }

                if (!isset($storedUsersCalendars['main'][$id])) {
                    $calendarEntity = $this->getEntityManager()->getEntity('GoogleCalendarUser');

                    $calendarEntity->set('userId', $userId);
                    $calendarEntity->set('type', 'main');
                    $calendarEntity->set('role', 'owner');
                    $calendarEntity->set('googleCalendarId', $id);

                    $this->getEntityManager()->saveEntity($calendarEntity);
                }
            }
        }
    }

    public function beforeSave(Entity $entity)
    {
        [$integration, $userId] = explode('__', $entity->get('id'));

        if ($integration == 'Google') {
            $user = $this->getEntityManager()->getEntity('User', $userId);
            if (!$user) {
                return;
            }

            $prevEntity = $this->getEntityManager()->getEntity('ExternalAccount', $entity->get('id'));

            if ($prevEntity && $prevEntity->get('calendarStartDate') > $entity->get('calendarStartDate')) {
                $googleCalendarUsers = $this->getEntityManager()
                    ->getRepository('GoogleCalendarUser')
                    ->where([
                        'active' => true,
                        'userId' => $userId
                    ])
                    ->find();

                foreach ($googleCalendarUsers as $googleCalendarUser) {
                    $googleCalendarUser->set('pageToken', '');
                    $googleCalendarUser->set('syncToken', '');
                    $googleCalendarUser->set('lastSync', null);

                    $this->getEntityManager()->saveEntity($googleCalendarUser);
                }
            }
        }
    }
}
