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

namespace Espo\Modules\Sales\Repositories;

use Espo\ORM\Entity;

class UseCase extends Quote
{

    protected $itemEntityType = 'UseCaseItem';

    protected $itemParentIdAttribute = 'useCaseId';

    protected function afterSave(Entity $entity, array $options = [])
    {
        parent::afterSave($entity, $options);

        $this->recalculateQuote($entity);
    }

    protected function afterRemove(Entity $entity, array $options = [])
    {
        parent::afterRemove($entity, $options);

        $this->recalculateQuote($entity);
    }

    private function recalculateQuote(Entity $entity)
    {
        $quoteId = false;

        if ($entity->has('quoteId'))
            $quoteId = $entity->get('quoteId');


        if (!$quoteId && $entity->has('transportOfId'))
            $quoteId = $entity->get('transportOfId');

        if (!$quoteId) return;

        $quote = $this->getEntityManager()->getEntity('Quote', $quoteId);

        if (method_exists($quote, "calculateTotalAmount"))
            $quote->calculateTotalAmount();
    }
}
