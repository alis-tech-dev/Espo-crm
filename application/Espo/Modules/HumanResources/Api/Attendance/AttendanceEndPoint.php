<?php

namespace Espo\Modules\HumanResources\Api\Attendance;

use Espo\Core\Api\Action;
use Espo\Core\Api\Request;
use Espo\Core\Api\Response;
use Espo\Core\Field\DateTime;
use Espo\Core\Exceptions\Forbidden;
use Espo\Core\Exceptions\BadRequest;
use Espo\Core\Api\ResponseComposer;
use Espo\ORM\EntityManager;
use Espo\Entities\User;
use Espo\ORM\Query\Part\Condition as Cond;

class AttendanceEndPoint implements Action
{
    public function __construct(
        private readonly EntityManager $entityManager,
        private readonly User $user,
    ) {
    }

    public function process(Request $request): Response
    {
        $data = $request->getParsedBody();

        $status = $data->status ?? null;
        $userId = $data->userId ?? $this->user->getId();

        if (!$this->user->isAdmin() && $userId !== $this->user->getId()) {
            throw new Forbidden("You do not have permission to manage attendance for other users.");
        }

        $existingAttendance = $this->findExistingAttendance($userId);

        if ($status === null) {
            // If no status is provided, return the current status
            if ($existingAttendance) {
                return ResponseComposer::json([
                    'success' => true,
                    'status' => 'in',
                    'type' => $existingAttendance->get('status')
                ]);
            } else {
                return ResponseComposer::json([
                    'success' => true,
                    'status' => 'out',
                    'type' => 'none'
                ]);
            }
        } else {
            // If a status is provided, create or update the attendance record
            if ($existingAttendance) {
                $existingAttendance->set('dateEnd', date('Y-m-d H:i:s'));
                $this->entityManager->saveEntity($existingAttendance);
                return ResponseComposer::json([
                    'success' => true,
                    'attendanceId' => $existingAttendance->getId(),
                    'status' => 'out'
                ]);
            } else {
                $newAttendance = $this->entityManager->getNewEntity('Attendance');
                $newDate = new DateTime(date('Y-m-d H:i:s'));
                $newAttendance->set([
                    'name' => 'Attendance report',
                    'status' => $status,
                    'assignedUserId' => $userId,
                    'dateStart' => date('Y-m-d H:i:s'),
                    'dateEnd' => $newDate->getDateTime()
                ]);
                $this->entityManager->saveEntity($newAttendance);
                return ResponseComposer::json([
                    'success' => true,
                    'attendanceId' => $newAttendance->getId(),
                    'status' => 'in'
                ]);
            }
        }
    }

    private function findExistingAttendance(string $userId): ?object
    {
        return $this->entityManager
            ->getRDBRepository('Attendance')
            ->where(
                Cond::And(
                    Cond::equal(Cond::column('assignedUserId'), $userId),
                    Cond::lessOrEqual(Cond::column('dateStart'), date('Y-m-d H:i:s')),
                    Cond::greater(Cond::column('dateEnd'), date('Y-m-d H:i:s'))
                ))
            ->findOne();
    }
}