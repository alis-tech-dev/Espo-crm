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

namespace Espo\Modules\Google\Core\Google\Smtp\Auth;

class Xoauth extends \Laminas\Mail\Protocol\Smtp
{
    protected $authString;

    public function __construct($config = null)
    {
        $this->authString = $config['authString'];

        parent::__construct($config['host'], $config['port'], $config);
    }

    public function auth()
    {
        parent::auth();

        $this->_send('AUTH XOAUTH2 ' . $this->authString);
        $this->_expect(235);
        $this->_auth = true;
    }
}
