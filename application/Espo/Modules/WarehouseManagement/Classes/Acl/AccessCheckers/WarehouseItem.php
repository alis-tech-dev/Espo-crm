<?php

namespace Espo\Modules\WarehouseManagement\Classes\Acl\AccessCheckers;

use Espo\Core\Acl\{
    AccessEntityCREDSChecker,
    DefaultAccessChecker,
    ScopeData,
    Traits\DefaultAccessCheckerDependency,
};

use Espo\Core\AclManager;

use Espo\Entities\User;
use Espo\Modules\WarehouseManagement\Entities\WarehouseItem as WarehouseItemEntity;
use Espo\ORM\{
    Entity,
    EntityManager
};

class WarehouseItem implements AccessEntityCREDSChecker
{
    use DefaultAccessCheckerDependency;

    public function __construct(
        DefaultAccessChecker $defaultAccessChecker,
        private readonly EntityManager $entityManager,
        private readonly AclManager $aclManager,
    ) {
        $this->defaultAccessChecker = $defaultAccessChecker;
    }

    private function getForeignEntity(Entity $entity): ?Entity
    {
        if ($entity->isNew()) {
            /** @var ?string $id */
            $id = $entity->get('parentId');
            $parentType = $entity->get('parentType');

            if (!$id) {
                return null;
            }

            return $this->entityManager->getEntityById($parentType, $id);
        }

        return $this->entityManager
            ->getRDBRepository(WarehouseItemEntity::ENTITY_TYPE)
            ->getRelation($entity, 'parent')
            ->findOne();
    }

    public function checkEntityCreate(User $user, Entity $entity, ScopeData $data): bool
    {
        $foreign = $this->getForeignEntity($entity);

        if (!$foreign) {
            return false;
        }

        return $this->defaultAccessChecker->checkEntityCreate($user,$entity,$data) && $this->aclManager->checkEntityCreate($user, $foreign);
    }

    public function checkEntityRead(User $user, Entity $entity, ScopeData $data): bool
    {
        $foreign = $this->getForeignEntity($entity);

        if (!$foreign) {
            return false;
        }

        return $this->defaultAccessChecker->checkEntityRead($user, $entity, $data);
    }

    public function checkEntityEdit(User $user, Entity $entity, ScopeData $data): bool
    {
        $foreign = $this->getForeignEntity($entity);

        if (!$foreign) {
            return false;
        }

        return $this->defaultAccessChecker->checkEntityEdit($user, $entity, $data);
    }

    public function checkEntityDelete(User $user, Entity $entity, ScopeData $data): bool
    {
        $foreign = $this->getForeignEntity($entity);

        if (!$foreign) {
            return false;
        }

        return $this->defaultAccessChecker->checkEntityDelete($user, $entity, $data);
    }

    public function checkEntityStream(User $user, Entity $entity, ScopeData $data): bool
    {
        $foreign = $this->getForeignEntity($entity);

        if (!$foreign) {
            return false;
        }

        return $this->defaultAccessChecker->checkEntityStream($user, $entity, $data);
    }
}
