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

namespace Espo\Modules\Google\People;

use RuntimeException;

class CreateContactBatchRequest implements Request
{
    private $contactList;

    /**
     * @param Contact[] $contactList
     */
    public function __construct(array $contactList)
    {
        foreach ($contactList as $contact) {
            if ($contact->getResourceName() !== null) {
                throw new RuntimeException("Can't create contact with resource name.");
            }
        }

        $this->contactList = $contactList;
    }

    /**
     * @param Contact[] $contactList
     */
    public static function create(array $contactList): self
    {
        return new self($contactList);
    }

    public function getMethod(): string
    {
        return 'POST';
    }

    public function getUrl(): string
    {
        return 'https://people.googleapis.com/v1/people:batchCreateContacts';
    }

    public function getHeaders(): string
    {
        return '';
    }

    public function getBody(): string
    {
        $list = [];

        foreach ($this->contactList as $contact) {
            $list[] = (object) [
                'contactPerson' => $contact->getPayloadData()
            ];
        }

        $data = (object) [
            'contacts' => $list,
            'readMask' => 'names',
        ];

        return json_encode($data);
    }
}
