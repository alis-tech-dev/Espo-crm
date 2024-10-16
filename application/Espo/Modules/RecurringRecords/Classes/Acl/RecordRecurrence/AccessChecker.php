<?php

namespace Espo\Modules\RecurringRecords\Classes\Acl\RecordRecurrence;

use Espo\Core\{
    AclManager,};
use Espo\Core\Acl\{
    AccessEntityCREDSChecker,
    DefaultAccessChecker,
    ScopeData,
    Table,
    Traits\DefaultAccessCheckerDependency};
use Espo\Entities\User;
use Espo\Modules\RecurringRecords\Entities\RecordRecurrence;
use Espo\ORM\{
    Entity,
    EntityManager,};

class AccessChecker implements AccessEntityCREDSChecker
{
    use DefaultAccessCheckerDependency;

    public function __construct(
        DefaultAccessChecker $defaultAccessChecker,
        private readonly AclManager $aclManager,
        private readonly EntityManager $entityManager,
    ) {
        $this->defaultAccessChecker = $defaultAccessChecker;
    }

    public function checkEntityCreate(User $user, Entity $entity, ScopeData $data): bool
    {
        assert($entity instanceof RecordRecurrence);

        if (!$this->defaultAccessChecker->checkEntityCreate($user, $entity, $data)) {
            return false;
        }

        $data = $entity->get('data');
        $entityType = $entity->get('entityType');

        if (!$this->aclManager->checkScope($user, $entityType, Table::ACTION_CREATE)) {
            return false;
        }

        if (isset($data->id)) {
            $target = $this->entityManager->getEntity($entityType, $data->id);
            if (!$this->aclManager->checkEntity($user, $target)) {
                return false;
            }
        }

        return true;
    }
}
