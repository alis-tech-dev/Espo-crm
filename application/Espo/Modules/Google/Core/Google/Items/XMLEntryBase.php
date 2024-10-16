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

class XMLEntryBase
{

    protected $item;

    public function __construct($xml = '')
    {
        if (empty($xml)) {
            $xml = $this->createNewEntry();
        }
        $this->init($xml);
    }

    public function init($xml)
    {
        if ($xml instanceof \DOMDocument || $xml instanceof \DOMElement) {
            $this->item = $xml;
        } else if ($xml instanceof \SimpleXMLElement) {
            $this->item = dom_import_simplexml($xml);
        } else {
            $this->item = \DOMDocument::loadXML($xml);
            if (empty($this->item)){
                throw new Error("Xml parse error");
            }
        }
    }

    public function createNewEntry()
    {
        $newsXML = new \DOMDocument('1.0', 'utf-8');
        return $newsXML;
    }

    public function getShortId()
    {
        $id = $this->getId();
        return substr($id, strrpos($id,'/') + 1);
    }

    public function getId()
    {
        return $this->getChildNodeValue('id');
    }

    protected function getChildNodeValue($nodeName)
    {
        $child = $this->getChildNode($nodeName);
        return ($child) ? $child->nodeValue : '';
    }

    protected function getChildNode($nodeName)
    {
        $children = $this->item->getElementsByTagName($nodeName);
        return ($children->length > 0) ? $children->item(0) : false;
    }

    protected function getLinkHref($rel)
    {
        $links = $this->item->getElementsByTagName('link');
        foreach ($links as $link) {
            if ($rel == $link->getAttribute('rel')) {
                return $link->getAttribute('href');
            }
        }
        return false;
    }

    public function asXML()
    {
        if ($this->item instanceof \DOMElement) {
            $xml = $this->item->ownerDocument->saveXML($this->item);
        } else {
            $xml = $this->item->saveXML();
        }
        return $xml;
    }
}
