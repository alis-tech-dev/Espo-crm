<?php

namespace Espo\Modules\WarehouseManagement\Services;

use Espo\Core\Acl\Table as AclTable;
use Espo\Core\Exceptions\{
    BadRequest,
    Error,
    Forbidden,
    ForbiddenSilent,
    NotFound};
use Espo\Core\Record\Collection as RecordCollection;
use Espo\Core\Select\SearchParams;
use Espo\Core\Select\Where\{
    Item,
    ItemBuilder};
use Espo\Modules\WarehouseManagement\Entities\{
    Warehouse,
    WarehouseItem};

class WarehousePosition extends \Espo\Core\Templates\Services\Base
{
    /**
     * @throws BadRequest
     * @throws Forbidden
     * @throws Error
     * @throws NotFound
     */
    public function findLinkedItems(string $id, SearchParams $searchParams): RecordCollection
    {
        if (!$this->acl->check($this->entityType, AclTable::ACTION_READ)) {
            throw new ForbiddenSilent("No access.");
        }

        $entity = $this->getRepository()->getById($id);

        if (!$entity) {
            throw new NotFound();
        }

        if (!$this->acl->check($entity, AclTable::ACTION_READ)) {
            throw new ForbiddenSilent();
        }

        $preparedSearchParams = $this->prepareSearchParams($searchParams);

        $query = $this->selectBuilderFactory->create()
            ->from(WarehouseItem::ENTITY_TYPE)
            ->withSearchParams($preparedSearchParams)
            ->withStrictAccessControl()
            ->withWhere(
                ItemBuilder::create()
                    ->setAttribute('parentType')
                    ->setType(Item\Type::EQUALS)
                    ->setValue(Warehouse::ENTITY_TYPE)
                    ->build()
            )
            ->build();

        $collection = $this->entityManager
            ->getRDBRepositoryByClass(WarehouseItem::class)
            ->getRelation($entity, 'items')
            ->clone($query)
            ->find();

        $recordService = $this->recordServiceContainer->get(WarehouseItem::ENTITY_TYPE);

        foreach ($collection as $itemEntity) {
            $this->loadListAdditionalFields($itemEntity, $preparedSearchParams);

            $recordService->prepareEntityForOutput($itemEntity);
        }

        $total = $this->entityManager
            ->getRDBRepository($this->entityType)
            ->getRelation($entity, 'items')
            ->clone($query)
            ->count();

        return RecordCollection::create($collection, $total);
    }
}
