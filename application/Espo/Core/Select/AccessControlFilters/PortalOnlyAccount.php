<?php
/************************************************************************
 * This file is part of EspoCRM.
 *
 * EspoCRM - Open Source CRM application.
 * Copyright (C) 2014-2021 Yurii Kuznietsov, Taras Machyshyn, Oleksii Avramenko
 * Website: https://www.espocrm.com
 *
 * EspoCRM is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * EspoCRM is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with EspoCRM. If not, see http://www.gnu.org/licenses/.
 *
 * The interactive user interfaces in modified source and object code versions
 * of this program must display Appropriate Legal Notices, as required under
 * Section 5 of the GNU General Public License version 3.
 *
 * In accordance with Section 7(b) of the GNU General Public License version 3,
 * these Appropriate Legal Notices must retain the display of the "EspoCRM" word.
 ************************************************************************/

namespace Espo\Core\Select\AccessControlFilters;

use Espo\{
    ORM\QueryParams\SelectBuilder as QueryBuilder,
    Core\Select\Filters\AccessControlFilter,
    Core\Select\Helpers\FieldHelper,
    Entities\User,
};

class PortalOnlyAccount implements AccessControlFilter
{
    protected $entityType;
    protected $user;
    protected $fieldHelper;

    public function __construct(string $entityType, User $user, FieldHelper $fieldHelper)
    {
        $this->entityType = $entityType;
        $this->user = $user;
        $this->fieldHelper = $fieldHelper;
    }

    public function apply(QueryBuilder $queryBuilder) : void
    {
        $orGroup = [];

        $accountIdList = $this->user->getLinkMultipleIdList('accounts');
        $contactId = $this->user->get('contactId');

        if (count($accountIdList)) {
            if ($this->fieldHelper->hasAccountField()) {
                $orGroup['accountId'] = $accountIdList;
            }

            if ($this->fieldHelper->hasAccountsRelation()) {
                $queryBuilder
                    ->leftJoin('accounts', 'accountsAccess')
                    ->distinct();

                $orGroup['accountsAccess.id'] = $accountIdList;
            }

            if ($this->fieldHelper->hasParentField()) {
                $orGroup[] = [
                    'parentType' => 'Account',
                    'parentId' => $accountIdList,
                ];

                if ($contactId) {
                    $orGroup[] = [
                        'parentType' => 'Contact',
                        'parentId' => $contactId,
                    ];
                }
            }
        }

        if ($contactId) {
            if ($this->fieldHelper->hasContactField()) {
                $orGroup['contactId'] = $contactId;
            }

            if ($this->fieldHelper->hasContactsRelation()) {
                $queryBuilder
                    ->leftJoin('contacts', 'contactsAccess')
                    ->distinct();

                $orGroup['contactsAccess.id'] = $contactId;
            }
        }

        if ($this->fieldHelper->hasCreatedByField()) {
            $orGroup['createdById'] = $this->user->id;
        }

        if (empty($orGroup)) {
            $queryBuilder->where([
                'id' => null,
            ]);

            return;
        }

        $queryBuilder->where([
            'OR' => $orGroup,
        ]);
    }
}
