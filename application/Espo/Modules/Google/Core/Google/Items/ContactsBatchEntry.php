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

namespace Espo\Modules\Google\Core\Google\Items;

use \Espo\Core\Exceptions\Error;
use \Espo\Core\Exceptions\Forbidden;
use \Espo\Core\Exceptions\NotFound;

class ContactsBatchEntry extends ContactsEntry
{
    const NAMESPACE_GD = 'http://schemas.google.com/g/2005';
    const NAMESPACE_G_CONTACT = 'http://schemas.google.com/contact/2008';
    const NAMESPACE_BATCH = 'http://schemas.google.com/gdata/batch';

    public function getBatchId()
    {
        return $this->getChildNodeValue('id', self::NAMESPACE_BATCH);
    }

    protected function getStatusNode()
    {
        return $this->getChildNode('status');
    }

    public function getStatusCode()
    {
        $status = $this->getStatusNode();
        return ($status) ? $status->getAttribute('code') : false;
    }

    public function getStatusMessage()
    {
        $status = $this->getStatusNode();
        return ($status) ? $status->getAttribute('reason') : '';
    }

    public function getOperationType()
    {
        $node = $this->getChildNode('operation');
        return ($node) ? $node->getAttribute('type') : false;
    }

    public function getId()
    {
        return $this->getChildNodeValue('id', 'http://www.w3.org/2005/Atom');
    }

    protected function getChildNodeValue($nodeName, $namespace = '*')
    {
        $children = $this->item->getElementsByTagNameNS($namespace, $nodeName);
        if ($children) {
            return $children->item(0)->nodeValue;
        }
        return '';
    }
}
