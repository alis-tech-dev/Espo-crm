<?php

namespace Espo\Modules\Accounting\Repositories;

use Espo\Modules\Accounting\Entities\VatIdValidation as VatIdValidationEntity;
use Espo\ORM\Entity;
use Espo\ORM\Query\Part\Condition as Cond;
use Espo\ORM\Query\Part\Expression as Expr;

class VatIdValidation extends \Espo\Core\Templates\Repositories\Base
{
    public function getByVatId(string $vatId): ?VatIdValidationEntity
    {
        $selectQuery = $this->entityManager
            ->getQueryBuilder()
            ->select()
            ->from($this->entityType)
            ->where(
                Cond::equal(
                    Expr::upperCase(Expr::column(VatIdValidationEntity::VAT_ID_FIELD)),
                    Expr::upperCase(Expr::value($vatId))
                )
            )
            ->build();

        return $this->getMapper()->selectOne($selectQuery);
    }

    protected function beforeSave(Entity $entity, array $options = [])
    {
        /** @var VatIdValidationEntity $entity */
        
        $vatId = $entity->getVatId();

        if($vatId) {
            $entity->setVatId(strtoupper($vatId));
        }

        parent::beforeSave($entity, $options);
    }
}
