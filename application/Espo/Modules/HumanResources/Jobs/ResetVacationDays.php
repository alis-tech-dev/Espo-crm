<?php

namespace Espo\Modules\HumanResources\Jobs;

use Espo\Core\Utils\Log;
use Espo\Core\Job\JobDataLess;
use Espo\Core\ORM\EntityManager;
use Espo\Modules\HumanResources\Entities\HumanResource;

class ResetVacationDays implements JobDataLess
{

    public function __construct(
        private readonly EntityManager $entityManager,
        private readonly Log $log
    ) 
    {}

    public function run(): void
    {
        $humanresources = $this->entityManager
            ->getRDBRepositoryByClass(HumanResource::class)
            ->find();

        foreach ($humanresources as $hr) {
            $vacationDays = $hr->get('vacationDays');

            $hr->set('vacationDaysLeft', $vacationDays);

            $this->entityManager->saveEntity($hr);
        }
    }
}

