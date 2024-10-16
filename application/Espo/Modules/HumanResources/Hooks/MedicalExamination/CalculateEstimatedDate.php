<?php

namespace Espo\Modules\HumanResources\Hooks\MedicalExamination;

use Espo\Core\Field\Date;
use Espo\ORM\Entity;
use Espo\ORM\Repository\Option\SaveOptions;

class CalculateEstimatedDate implements \Espo\Core\Hook\Hook\BeforeSave
{    
    public function beforeSave(Entity $entity, SaveOptions $options): void
    {
        if ($entity->isNew()) { 
            /** @var Date $date */
            $date = $entity->getValueObject('dateOfLastInspection');

            $years = $entity->get('numberOfYearsForRepetition');
    
            $entity->setValueObject('dateOfTheNextInspection', $date->addYears($years));
        }
    }
}
