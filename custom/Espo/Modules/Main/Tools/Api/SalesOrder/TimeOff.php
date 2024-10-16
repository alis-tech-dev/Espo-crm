<?php

namespace Espo\Modules\Main\Tools\Api\SalesOrder;

use Espo\Core\Api\Action;
use Espo\Core\Api\Request;
use Espo\Core\Api\Response;
use Espo\Core\Api\ResponseComposer;
use Espo\Core\ORM\EntityManager;
use Espo\Core\Exceptions\BadRequest;
use Espo\Core\Exceptions\Error;
use Espo\Core\Field\DateTime;
use Espo\Entities\User;

class TimeOff implements Action
{
    public function __construct(
        private readonly EntityManager $entityManager,
        private readonly User $user
    ) {
    }

    public function process(Request $request): Response
    {
        $id = $request->getRouteParam('id') ?? throw new BadRequest();

        $salesOrder = $this
            ->entityManager
            ->getEntityById('SalesOrder', $id) ?? throw new BadRequest();

        $workPerformed = $this->entityManager
            ->getRDBRepository('WorkPerformed')
            ->where([
                'parentId' => $salesOrder->getId(),
                'parentType' => 'SalesOrder',
                'assignedUserId' => $this->user->getId(),
                'dateEnd' => null
            ])
            ->findOne();

        if (!$workPerformed) {
            throw new Error('No ongoing work performed found for this sales order and user.');
        }

        $workPerformed->set('dateEnd', DateTime::createNow()->toString());
        $this->entityManager->saveEntity($workPerformed, ['skipHooks' => true]);

        return ResponseComposer::json(['status' => 'Work performed']);
    }
}
