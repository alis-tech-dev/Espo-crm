<?php

namespace Espo\Modules\HumanResources\Api\VacationRequestApproval;

use Espo\Core\Api\Action;
use Espo\Core\Api\Request;
use Espo\Core\Api\Response;
use Espo\ORM\EntityManager;
use Espo\Core\Exceptions\NotFound;
use Espo\Core\Api\ResponseComposer;
use Espo\Core\Exceptions\BadRequest;
use Espo\Modules\HumanResources\Entities\HumanResource;
use Espo\Modules\HumanResources\Entities\Vacation;
use Espo\Modules\HumanResources\Entities\VacationRequestApprovalItem as ApprovalItem;
use Espo\Entities\User;
use Espo\Core\ORM\Repository\Option\SaveOption;
use Espo\Core\Utils\Config;
use Espo\Entities\Team;
use Espo\Core\Exceptions\Error\Body as ErrorBody;
use Espo\Core\Exceptions\ErrorSilent;


class Handle implements Action
{
    public function __construct(
        private readonly Config $config,
        private readonly EntityManager $entityManager,
        private readonly User $user
    ) {
    }

    private const POSSIBLE_STATUSES = ['Approved', 'Rejected', 'Returned'];

    public function process(Request $request): Response
    {
        $id = $request->getRouteParam('id');
        $entityType = $request->getRouteParam('entityType');

        $body = $request->getParsedBody();

        $note = $body->note ?? '';
        $status = $body->status ?? '';

        if (!is_string($note)) {
            throw new BadRequest();
        }

        if (!in_array($status, self::POSSIBLE_STATUSES, true)) {
            throw new BadRequest();
        }

        if (!$id) {
            throw new BadRequest();
        }

        $entity = $this->entityManager->getEntityById($entityType, $id);

        if (!$entity) {
            throw new NotFound();
        }

        $hr = $this->entityManager->getEntityById(HumanResource::ENTITY_TYPE, $entity->get('humanResourceId'));

        if (!$hr) {
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

        if ($entity->get('statusOfApproval') === 'Approved' || $entity->get('statusOfApproval') === 'Rejected') {
            throw ErrorSilent::createWithBody(
				'Entity is already approved or rejected.',
				ErrorBody::create()
					->withMessageTranslation(
						'entityAlreadyApproved',
						'VacationApproval'
					)
					->encode()
			);

        }

        $numberOfDaysLeft = $entity->get('numberOfDaysLeft');
        
        $hr->set('vacationDaysLeft', $numberOfDaysLeft);
        $this->entityManager->saveEntity($hr);


        $approvalItem = $this->entityManager->getNewEntity('VacationRequestApprovalItem');
        $approvalItem->set('status', $status);
        $approvalItem->set('description', $note);
        $this->entityManager->saveEntity($approvalItem);
        $approvalRDB = $this->entityManager->getRDBRepositoryByClass(ApprovalItem::class);
        $approvalRDB->getRelation($approvalItem, 'assignedUser')->relate($this->user);
        $approvalRDB->getRelation($approvalItem, lcfirst($entityType))->relate($entity);


        $entity->set('statusOfApproval', $status);

        $this->entityManager->saveEntity($entity, [SaveOption::SKIP_HOOKS => true]);

        $vacation = $this->entityManager->getNewEntity('Vacation');
        $vacation->set('name', "Dovolená " . $entity->get('humanResourceName'));
        $vacation->setValueObject('dateStartDate', $entity->getValueObject('from'));
        $vacation->setValueObject('dateEndDate', $entity->getValueObject('to'));
        $vacation->set('humanResourceId', $entity->get('humanResourceId'));
        $vacation->set('assignedUserId', $entity->get('assignedUserId'));
        $vacation->set('description', $entity->get('description'));

        $this->entityManager->saveEntity($vacation);

        $vacationRDB = $this->entityManager->getRDBRepositoryByClass(Vacation::class);
        $vacationRDB->getRelation($vacation, 'vacationRequests')->relate($entity);

        if ($this->config->get('humanResourceApprovalTeamId')){
            $team = $this->entityManager->getEntityById(Team::ENTITY_TYPE, $this->config->get('humanResourceApprovalTeamId'));
            $vacationRDB->getRelation($vacation, 'teams')->relate($team);
        }

        return ResponseComposer::json(true);
    }
}
