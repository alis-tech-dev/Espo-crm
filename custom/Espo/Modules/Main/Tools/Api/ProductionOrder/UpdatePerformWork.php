<?php

namespace Espo\Modules\Main\Tools\Api\ProductionOrder;

use Espo\Core\Api\Action;
use Espo\Core\Api\Request;
use Espo\Core\Api\Response;
use Espo\Core\Api\ResponseComposer;
use Espo\Core\Exceptions\BadRequest;
use Espo\Core\ORM\EntityManager;

class UpdatePerformWork implements Action
{
    public function __construct(
        private EntityManager $entityManager
    )
    {
    }

    public function process(Request $request): Response
    {
        try {
            $this->entityManager->getTransactionManager()->start();

            $id = $request->getRouteParam('id') ?? throw new BadRequest('ID not found');

            $productionOrder = $this->entityManager->getRDBRepository('ProductionOrder')
                ->where('id', $id)
                ->findOne();

            $worksPerformed = $this->entityManager->getRDBRepository('WorkPerformed')
                ->where('parentId', $id)
                ->find();

            $totalDays = 0;
            $totalHours = 0;
            $totalMinutes = 0;

            foreach ($worksPerformed as $work) {
                $dateStart = new \DateTime($work->get('dateStart'));
                $dateEndString = $work->get('dateEnd');

                if (!$dateEndString) {
                    $dateEnd = new \DateTime();
                    $work->set('dateEnd', $dateEnd->format('Y-m-d H:i:s'));
                    $this->entityManager->saveEntity($work);
                } else {
                    $dateEnd = new \DateTime($dateEndString);
                }

                $interval = $dateStart->diff($dateEnd);

                $totalDays += $interval->y * 365;
                $totalDays += $interval->m * 30;
                $totalDays += $interval->d;
                $totalHours += $interval->h;
                $totalMinutes += $interval->i;
            }

            $totalHours += intdiv($totalMinutes, 60);
            $totalMinutes = $totalMinutes % 60;
            $totalDays += intdiv($totalHours, 24);
            $totalHours = $totalHours % 24;

            $totalTimeFormatted = sprintf('%dd : %dh : %dm', $totalDays, $totalHours, $totalMinutes);
            $productionOrder->set('performWorkTime', $totalTimeFormatted);

            $this->entityManager->saveEntity($productionOrder);
            $this->entityManager->getTransactionManager()->commit();

            return ResponseComposer::json(['status' => 'Success']);
        } catch (\Exception $e) {
            $this->entityManager->getTransactionManager()->rollback();
            throw new BadRequest('Error processing request: ' . $e->getMessage());
        }
    }
}
