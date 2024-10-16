<?php

namespace Espo\Modules\Accounting\Classes\Abstract\Repositories;

use Espo\Core\Di;
use Espo\Modules\Accounting\Classes\Abstract\Services\InvoiceLike as InvoiceLikeService;
use Espo\ORM\Entity;
use Espo\Core\Utils\{
    DateTime
};

class InvoiceLike extends \Espo\Core\Templates\Repositories\Base implements Di\RecordServiceContainerAware
{
    use Di\RecordServiceContainerSetter;

    private ?InvoiceLikeService $service = null;

    public function beforeSave(Entity $entity, array $options = []): void
    {
        if (empty($options['skipRecalculation'])) {
            $this->recalculateInvoiceLikeRecord($entity);
        }

        parent::beforeSave($entity, $options);

        if ($entity->isNew() && !$entity->get('number')) {
            $entity->set('number', $entity->get('numberA'));
        }

        if ($entity->isAttributeChanged('status') && $entity->get('status') === 'Paid') {
            
            if($entity->has('datePaid') && !$entity->get('datePaid')) {
                $entity->set('datePaid', DateTime::getSystemTodayString());
            }
            
        }
    }

    protected function afterRemove(Entity $entity, array $options = []): void
    {
        parent::afterRemove($entity, $options);

        $items = $this->getRelation($entity, $this->getService()::ITEM_LINK_NAME)
            ->find();

        foreach ($items as $item) {
            $this->entityManager->removeEntity($item);
        }
    }

    protected function recalculateInvoiceLikeRecord(Entity $entity): void
    {
        if (!$entity->isAttributeChanged('itemsRecordList')) {
            return;
        }

        $this->getService()->recalculateRecordList($entity);

        $this->getService()->recalculateTotals($entity);
    }

    private function getService(): InvoiceLikeService
    {
        /** @var InvoiceLikeService */
        return $this->service ??= $this->recordServiceContainer->get($this->getEntityType());
    }
}
