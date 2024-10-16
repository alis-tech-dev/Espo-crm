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

use Espo\ORM\Entity;

use Espo\Modules\Google\Core\Google\Actions\Calendar;

class GoogleCalendar extends \Espo\Core\Services\Base
{
    private $googleCalendarManager;

    protected $forceSelectAllAttributes = true;

    protected function init()
    {
        parent::init();
        $this->addDependency('entityManager');
        $this->addDependency('container');
        $this->addDependency('metadata');
        $this->addDependency('aclManager');
    }

    protected function getEntityManager()
    {
        return $this->getInjection('entityManager');
    }

    protected function getContainer()
    {
        return $this->getInjection('container');
    }

    protected function getMetadata()
    {
        return $this->getInjection('metadata');
    }

    protected function getGoogleCalendarManager()
    {
        if (!$this->googleCalendarManager) {
            $this->googleCalendarManager = new Calendar(
                $this->getContainer(),
                $this->getEntityManager(),
                $this->getMetadata(),
                $this->getConfig()
            );
        }

        return $this->googleCalendarManager;
    }

    /**
     * @return array
     */
    public function usersCalendars(array $params = null)
    {
        $calendarManager = $this->getGoogleCalendarManager();
        $calendarManager->setUserId($this->getUser()->get('id'));

        return $calendarManager->getCalendarList();
    }

    public function syncCalendar(Entity $calendar)
    {
        $user = $this->getEntityManager()->getEntity('User', $calendar->get('userId'));

        if (!$user || !$user->get('isActive')) {
            return false;
        }

        if (!$this->getInjection('aclManager')->check($user, 'GoogleCalendar')) {
            return false;
        }

        $externalAccount = $this->getEntityManager()
            ->getEntity('ExternalAccount', 'Google__' . $calendar->get('userId'));

        $enabled = $externalAccount->get('enabled') &&
            ($externalAccount->get('calendarEnabled') || $externalAccount->get('googleCalendarEnabled'));

        if ($enabled && $calendar->get('userId')) {
            $isConnected = $this->getServiceFactory()
                ->create('ExternalAccount')->ping('Google', $calendar->get('userId'));

            if (!$isConnected) {
                $GLOBALS['log']
                    ->error('Google Calendar Synchronization: \'' . $calendar->get('userName') .
                        '\' user could not connect to Google Server when synchronizing the calendar "' .
                        $calendar->get('googleCalendarName') . '"'
                    );

                return false;
            }

            $calendarManager = $this->getGoogleCalendarManager();
            $calendarManager->setUserId($calendar->get('userId'));

            $syncResult = $calendarManager->run($calendar, $externalAccount);

            return $syncResult;
        }

        return false;
    }
}
