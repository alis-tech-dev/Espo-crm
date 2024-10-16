<?php

namespace Espo\Modules\HumanResources\Hooks\HumanResource;

use Espo\ORM\Entity;
use Espo\Core\ORM\EntityManager;
use Espo\Core\Utils\Config;
use Espo\Core\Utils\Language;
use Espo\Core\Hook\Hook\BeforeSave;
use Espo\ORM\Repository\Option\SaveOptions;

class VacationDaysLeftUpdate implements BeforeSave
{

    public function __construct(
        private readonly EntityManager $entityManager,
        private readonly Config $config,
        private readonly Language $language
    ) {}

    public function beforeSave(Entity $entity, SaveOptions $options): void 
    {
        if ($entity->isNew()) {
            $entity->set('vacationDaysLeft', $entity->get('vacationDays'));
        }
    }
}