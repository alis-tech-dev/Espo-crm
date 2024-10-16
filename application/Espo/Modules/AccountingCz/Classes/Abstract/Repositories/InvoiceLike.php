<?php

namespace Espo\Modules\AccountingCz\Classes\Abstract\Repositories;

use Espo\Modules\AccountingCz\Classes\Abstract\Services\InvoiceLike as InvoiceLikeService;
use Espo\ORM\Entity;
use Espo\Core\Di;

class InvoiceLike extends \Espo\Modules\Accounting\Classes\Abstract\Repositories\InvoiceLike implements Di\ConfigAware
{
    use Di\ConfigSetter;

    public function beforeSave(Entity $entity, array $options = []): void
    {
        parent::beforeSave($entity, $options);

        if(!$this->config->get('customInvoiceNames')) {
            $entity->set('name', $entity->get('number'));
        }

        $this->recalculateSummaryVatRates($entity);
    }

    protected function recalculateSummaryVatRates(Entity $entity): void
    {
        if (!$entity->isAttributeChanged('itemsRecordList')) {
            return;
        }

        $this->getService()->recalculateSummaryVatRates($entity);
    }

    private function getService(): InvoiceLikeService
    {
        /** @var InvoiceLikeService */
        return $this->service ??= $this->recordServiceContainer->get($this->getEntityType());
    }
}