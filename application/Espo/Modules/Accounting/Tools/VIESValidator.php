<?php

namespace Espo\Modules\Accounting\Tools;

use Espo\Core\ORM\EntityManager;
use Espo\Modules\Accounting\Entities\VatNumberValidation;
use Ibericode\Vat\Validator as VatValidator;
use Espo\Core\Utils\{
    DateTime,
    Log
};
use Ibericode\Vat\Vies\ViesException;

/**
 * VIES Validator
 * @package Espo\Modules\Accounting\Tools
 */
class VIESValidator
{
    const VALID_SECONDS = 7200; // 2 hours

    public function __construct(
        private readonly EntityManager $entityManager,
        private readonly VatValidator $vatValidator,
        private readonly Log $log
    ) {
    }

    /**
     * Creates an entity record for caching
     * @param string $vatId
     * @param bool $isValid
     * @return void
     */
    protected function createRecord($vatId, $isValid): void
    {
        $entity = $this->entityManager->getNewEntity(VatNumberValidation::ENTITY_TYPE);
        $entity->set([
            'vatId' => $vatId,
            'isValid' => $isValid,
            'dateRequested' => DateTime::getSystemNowString()
        ]);
        $this->entityManager->saveEntity($entity);
    }

    /**
     * Get cached response
     * @param string $vatId
     * @return VatNumberValidation|null
     */
    protected function getCached($vatId): mixed
    {

        $cached = $this->entityManager
            ->getRDBRepository(VatNumberValidation::ENTITY_TYPE)
            ->where('vatId', $vatId)
            ->findOne();

        if ($cached === null) {
            return null;
        }

        $dateRequested = $cached->get('dateRequested');
        $dateRequested = \DateTime::createFromFormat(DateTime::SYSTEM_DATE_TIME_FORMAT, $dateRequested);

        if ($dateRequested->getTimestamp() + self::VALID_SECONDS < time()) {
            $this->entityManager->removeEntity($cached);
            return null;
        }

        return $cached;
    }

    /**
     * Validates a VAT ID (uses cache)
     * @param string $vatId
     * @return bool
     */
    public function validate($vatId, bool $validateExistence = false): bool
    {
        if ($cached = $this->getCached($vatId)) {
            $isValid = $cached->get('isValid');
        } else {
            try {
                if ($validateExistence) {
                    $isValid = $this->vatValidator->validateVatNumber($vatId);
                } else {
                    $isValid = $this->vatValidator->validateVatNumberFormat($vatId);
                }
            } catch (ViesException $e) {
                return false;
            }

            $this->createRecord($vatId, $isValid);
        }

        return $isValid;
    }
}
