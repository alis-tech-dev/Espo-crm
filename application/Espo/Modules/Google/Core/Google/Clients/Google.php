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

namespace Espo\Modules\Google\Core\Google\Clients;

use Espo\Core\ExternalAccount\Clients\OAuth2Abstract;
use Espo\Modules\Google\Core\Google\Exceptions\RequestError;
use Espo\Core\ExternalAccount\OAuth2\Client;

use Exception;

class Google extends OAuth2Abstract
{
    protected $baseUrl;
    protected $calendar;
    protected $people;
    protected $contacts;
    private $gmailClient;

    protected $original = null;

    const ACCESS_TOKEN_EXPIRATION_MARGIN = '20 seconds';

    protected function buildUrl($url)
    {
        return $this->baseUrl . trim($url, '\/');
    }

    protected function getPingUrl()
    {
        return 'https://www.googleapis.com/auth/userinfo.profile';
    }

    public function setOriginal($original)
    {
        $this->original = $original;
    }

    public function request(
        $url,
        $params = null,
        $httpMethod = Client::HTTP_METHOD_GET,
        $contentType = null,
        $allowRenew = true
    ) {

        if ($this->original) {
            return $this->original->request($url, $params, $httpMethod, $contentType, $allowRenew);
        }

        if (method_exists($this, 'handleAccessTokenActuality')) {
            $this->handleAccessTokenActuality();
        }

        $httpHeaders = [];
        if (!empty($contentType)) {
            $httpHeaders['Content-Type'] = $contentType;

            switch ($contentType) {
                case Client::CONTENT_TYPE_MULTIPART_FORM_DATA:
                    $httpHeaders['Content-Length'] = strlen($params);

                    break;

                case Client::CONTENT_TYPE_APPLICATION_JSON:
                    $httpHeaders['Content-Length'] = strlen($params);

                    break;
            }
        }

        $r = $this->client->request($url, $params, $httpMethod, $httpHeaders);

        $code = null;

        if (!empty($r['code'])) {
            $code = $r['code'];
        }

        if ($code >= 200 && $code < 300) {
            return $r['result'];
        }

        $handledData = $this->handleErrorResponse($r);

        if ($allowRenew && is_array($handledData)) {
            if ($handledData['action'] == 'refreshToken') {
                $GLOBALS['log']->debug(
                    "Google: Refresh token action required for client {$this->clientId}; Response: " .
                        json_encode($r)
                );

                if ($this->refreshToken()) {
                    return $this->request($url, $params, $httpMethod, $contentType, false);
                }
            } else if ($handledData['action'] == 'renew') {
                $GLOBALS['log']->debug(
                    "Google: Renew action required for client {$this->clientId}; Response: " . json_encode($r)
                );

                return $this->request($url, $params, $httpMethod, $contentType, false);
            }
        }


        $reason = '';

        if (is_string($r['result'])) {
            $resultXml = @simplexml_load_string($r['result']);

            if ($resultXml) {
                $reason = ' Reason: ' . $resultXml->error->internalReason;
            }
        } else {
            if (isset($r['result']['error']['message'])) {
                $reason = ' Reason: ' . $r['result']['error']['message'];
            }
        }

        // Fuck off - tompro
        ///$GLOBALS['log']->debug("Google error response: " . json_encode($r));

        $errorData = (object) [];

        if (isset($r['result']) && isset($r['result']['error'])) {
            $errorData = json_decode(json_encode($r['result']['error']));
        }

        throw RequestError::createWithErrorData(
            "Error after requesting {$httpMethod} {$url}." . $reason,
            $code,
            $errorData
        );
    }

    /**
     * @return array<string, mixed>
     */
    private function getParams()
    {
        $params = [];

        foreach ($this->paramList as $name) {
            $params[$name] = $this->$name;
        }

        return $params;
    }

    /**
     * @return Gmail
     */
    public function getGmailClient()
    {
        if (empty($this->gmailClient)) {
            $this->gmailClient = new Gmail($this->client, $this->getParams(), $this->manager);

            $this->gmailClient->setOriginal($this);
        }

        return $this->gmailClient;
    }

    /**
     * @return Calendar
     */
    public function getCalendarClient()
    {
        if (empty($this->calendar)) {
            $this->calendar = new Calendar($this->client, $this->getParams(), $this->manager);

            $this->calendar->setOriginal($this);
        }

        return $this->calendar;
    }

    public function getPeopleClient(): People
    {
        if (empty($this->people)) {
            $this->people = new People($this->client, $this->getParams(), $this->manager);

            $this->people->setOriginal($this);
        }

        return $this->people;
    }

    /**
     * @return Contacts
     */
    public function getContactsClient()
    {
        if (empty($this->contacts)) {
            $this->contacts = new Contacts($this->client, $this->getParams(), $this->manager);

            $this->contacts->setOriginal($this);
        }

        return $this->contacts;
    }

    /**
     * @return bool
     */
    public function ping()
    {
        if (empty($this->accessToken) || empty($this->clientId) || empty($this->clientSecret)) {
            return false;
        }

        $peoplePingResult = $this->getPeopleClient()->productPing();

        if ($peoplePingResult) {
            return true;
        }

        $calendarPingResult = $this->productPing($this->getCalendarClient()->getPingUrl());

        if ($calendarPingResult) {
            return true;
        }

        $gmailPingResult = $this->getGmailClient()->productPing();

        if ($gmailPingResult) {
            return true;
        }

        return false;
    }

    public function productPing($url = null)
    {
        if (!$url) {
            $url = $this->getPingUrl();
        }

        try {
            $this->request($url);

            return true;
        } catch (Exception $e) {
            $GLOBALS['log']->debug("Google: Ping fail: " . $e->getMessage());

            return false;
        }
    }

    protected function handleErrorResponse($r)
    {
        if ($r['code'] == 401 && !empty($r['result'])) {
            $result = $r['result'];

            if (
                strpos($r['header'], 'Invalid token') !== false ||
                strpos($r['header'], 'error=invalid_token') !== false ||
                strpos($r['header'], 'invalid_token') !== false
            ) {
                return [
                    'action' => 'refreshToken'
                ];
            } else {
                return [
                    'action' => 'renew'
                ];
            }
        } else if ($r['code'] == 400 && !empty($r['result'])) {
            if ($r['result']['error'] == 'Invalid token' || $r['result']['error'] == 'invalid_token') {
                return [
                    'action' => 'refreshToken'
                ];
            }
        }

        return null;
    }
}
