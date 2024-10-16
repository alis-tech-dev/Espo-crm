<?php

namespace Espo\Modules\Main\Hooks\VacationRequest;

use Espo\Core\Exceptions\BadRequest;
use Espo\Core\Exceptions\Error\Body as ErrorBody;
use Espo\Core\Exceptions\ErrorSilent;
use Espo\Core\Field\DateTime;
use Espo\Core\ORM\EntityManager;
use Espo\Modules\HumanResources\Hooks\VacationRequest\CalculateRemainingDays;
use Espo\ORM\Entity;
use Espo\ORM\Repository\Option\SaveOptions;

class CustomCalculateRemainingDays extends CalculateRemainingDays
{
    public function __construct(
        private readonly EntityManager $entityManager
    ) {
    }

    public function beforeSave(Entity $entity, SaveOptions $options): void
    {
        $userId = $entity->get('assignedUserId');

        $hr = $this->entityManager->getRDBRepository('HumanResource')
            ->where('assignedUserId', $userId)
            ->findOne();

        if (!$hr) {
            throw ErrorSilent::createWithBody(
                'HR not found.',
                ErrorBody::create()
                    ->withMessageTranslation(
                        "HR Not Found, please, provide 'assigned user' in 'HR employers' for this user.",
                        'VacationApproval'
                    )
                    ->encode()
            );
        }

        $hrId = $hr->getId();
        $hoursLeftBefore = $hr->get('vacationDaysLeft');
        $status = $entity->get('statusOfApproval');
        $type = $entity->get('type');

        $dateStart = $entity->getValueObject('dateStart');
        $dateEnd = $entity->getValueObject('dateEnd');

        $diffInSeconds = $dateEnd->getTimestamp() - $dateStart->getTimestamp();

        if ($diffInSeconds < 0) {
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

        $numberOfHours = floor($diffInSeconds / 3600);

//        if ($numberOfHours < 4 && $type == 'Paid') {
//            throw new BadRequest("time of Dovolena can not be less then 4 hours. Your request: {$numberOfHours} hours.");
//        }

        if ($numberOfHours > $hoursLeftBefore) {
            throw new BadRequest("You don't have available vacation time! Available time: {$hoursLeftBefore} hours, requested time: {$numberOfHours} hours.");
        } else {
            $hoursLeftAfter = $hoursLeftBefore - $numberOfHours;

            $vacationDays = round($numberOfHours / 8, 1);

            $entity->set('numberOfDaysLeftBefore', $hoursLeftBefore);
            $entity->set('numberOfDaysLeft', $hoursLeftAfter);
            $entity->set('numberOfDays', $numberOfHours);
            $entity->set('vacationDays', $vacationDays);
            $entity->set('humanResourceId', $hrId);



            if ($status == 'Approved') {
                $hr->set('vacationDaysLeft', $hoursLeftAfter);
                $this->entityManager->saveEntity($hr);
            }
        }
    }
}
