<?php

namespace Espo\Modules\Production\Hooks\ProductionModelOperation;

use Espo\Core\Hook\Hook\BeforeSave;
use Espo\ORM\Entity;
use Espo\ORM\Repository\Option\SaveOptions;

class SetName implements BeforeSave {

    public function beforeSave(Entity $entity, SaveOptions $options): void
    {
        $name = 'Operace ' . $entity->get('order');
        $entity->set('name', $name);
    }

}