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

namespace Espo\Modules\Sales\Entities;

class UseCaseItem extends \Espo\Core\ORM\Entity
{
    public function loadAllLinkMultipleFields()
    {
        foreach ($this->getAttributeList() as $a) {
            if ($this->getAttributeParam($a, 'isLinkMultipleIdList')) {
                $field = $this->getAttributeParam($a, 'relation');
                $this->loadLinkMultipleField($field);
            }
        }
    }

    public function toArray()
    {
        $arr = [
            'id' => $this->id
        ];

        foreach ($this->fields as $field => $defs) {
            if ($field == 'id')
                continue;

            if ($this->has($field)) {
                $arr[$field] = $this->get($field);

                if ($field === "productId")
                    $arr['product'] = $this->getEntityManager()->getEntity('Product', $arr[$field])->toArray();
            }
        }

        return $arr;
    }
}
