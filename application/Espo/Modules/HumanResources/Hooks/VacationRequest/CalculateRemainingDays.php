<?php

namespace Espo\Modules\HumanResources\Hooks\VacationRequest;

use Espo\ORM\Entity;
use Espo\Core\ORM\EntityManager;
use Espo\Modules\HumanResources\Entities\HumanResource;
use Espo\ORM\Repository\Option\SaveOptions;
use Espo\Core\Exceptions\BadRequest;
use Espo\Core\Exceptions\Error\Body as ErrorBody;
use Espo\Core\Exceptions\ErrorSilent;
use Espo\Core\Field\Date;
use Espo\Modules\HumanResources\Entities\VacationRequest;

class CalculateRemainingDays implements \Espo\Core\Hook\Hook\BeforeSave
{    
    public function __construct(
        private readonly EntityManager $entityManager
    ) {
    }

    public function beforeSave(Entity $entity, SaveOptions $options): void
    {
        /** @var VacationRequest $entity */ 
        $hr = $this->entityManager->getEntityById(HumanResource::ENTITY_TYPE, $entity->get('humanResourceId'));

        if(!$hr) {
            throw ErrorSilent::createWithBody(
				'HR not found.',
				ErrorBody::create()
					->withMessageTranslation(
						'hrNotFound',
						'VacationApproval'
					)
					->encode()
			);
        }

        $daysLeftBefore = $hr->get('vacationDaysLeft');
        /** @var Date $date1 */
        $date1 = $entity->getValueObject('dateStart');
        /** @var Date $date2 */
        $date2 = $entity->getValueObject('dateEnd');

        $diff = $date2->getTimestamp() - $date1->getTimestamp();

        if ($diff < 0) {
            throw ErrorSilent::createWithBody(
				'FROM date must be before TO date.',
				ErrorBody::create()
					->withMessageTranslation(
						'fromDateBeforeToDate',
						'VacationApproval'
					)
					->encode()
			);
        }

        $numberOfDays = floor($diff / (60 * 60 * 24)) + 1;

        if($numberOfDays > $daysLeftBefore) {
            throw ErrorSilent::createWithBody(
				'Not enough vacation days left.',
				ErrorBody::create()
					->withMessageTranslation(
						'notEnoughVacationDaysLeft',
						'VacationApproval'
					)
					->encode()
			);
        }

        $daysLeftAfter = $daysLeftBefore - $numberOfDays;

        $entity->set('numberOfDaysLeftBefore', $daysLeftBefore);
        $entity->set('numberOfDaysLeft', $daysLeftAfter);
        $entity->set('numberOfDays', $numberOfDays);
    }
}
