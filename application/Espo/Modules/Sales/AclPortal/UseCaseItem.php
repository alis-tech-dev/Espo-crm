<?php
/*********************************************************************************
 * The contents of this file are subject to the EspoCRM Sales Pack
 * Agreement ("License") which can be viewed at
 * https://www.espocrm.com/sales-pack-agreement.
 * By installing or using this file, You have unconditionally agreed to the
 * terms and conditions of the License, and You may not use this file except in
 * compliance with the License.  Under the terms of the license, You shall not,
 * sublicense, resell, rent, lease, distribute, or otherwise  transfer rights
 * or usage to the software.
 * 
 * Copyright (C) 2015-2020 Letrium Ltd.
 * 
 * License ID: ab90ca3eab7c48e8ae6409bc1af8bf16
 ***********************************************************************************/

namespace Espo\Modules\Sales\AclPortal;

use \Espo\Entities\User;
use \Espo\ORM\Entity;

class UseCaseItem extends \Espo\Core\AclPortal\Base
{
    public function checkInAccount(User $user, Entity $entity)
    {
        if ($entity->has('useCaseId')) {
            $useCaseId = $entity->get('useCaseId');
            if (!$useCaseId) return false;

            $quote = $this->getEntityManager()->getEntity('UseCase', $useCaseId);
            if ($quote && $this->getAclManager()->getImplementation('UseCase')->checkInAccount($user, $quote)) {
                return true;
            }
        } else {
            return parent::checkInAccount($user, $entity);
        }
    }

    public function checkIsOwnContact(User $user, Entity $entity)
    {
        if ($entity->has('useCaseId')) {
            $useCaseId = $entity->get('useCaseId');
            if (!$useCaseId) return false;

            $quote = $this->getEntityManager()->getEntity('UseCase', $useCaseId);
            if ($quote && $this->getAclManager()->getImplementation('UseCase')->checkIsOwnContact($user, $quote)) {
                return true;
            }
        } else {
            return parent::checkIsOwnContact($user, $entity);
        }

        return false;
    }
}
