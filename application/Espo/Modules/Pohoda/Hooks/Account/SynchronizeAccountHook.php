<?php

namespace Espo\Modules\Pohoda\Hooks\Account;

use Espo\Core\Utils\Log;
use Espo\ORM\EntityManager;
use Espo\Core\Hook\Hook\AfterSave;
use Espo\Modules\Crm\Entities\Account;
use Espo\ORM\Repository\Option\SaveOptions;
use Espo\ORM\Entity;

class SynchronizeAccountHook
{
    public function __construct(
        private readonly Log           $log,
        private readonly EntityManager $entityManager
    ){}

    public function afterSave(Entity $entity): void
    {
        $this->log->debug("ddddd", []);
        $this->log->debug($entity->get('name'), []);
    }
}
