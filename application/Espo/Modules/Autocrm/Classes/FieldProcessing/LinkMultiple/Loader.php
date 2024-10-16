<?php

namespace Espo\Modules\Autocrm\Classes\FieldProcessing\LinkMultiple;

use Espo\Core\{
    Exceptions\Forbidden,
    Exceptions\NotFound,
    FieldProcessing\Loader as LoaderInterface};
use Espo\Core\FieldProcessing\Loader\Params;
use Espo\Modules\Autocrm\Tools\RecordList\Loader as RecordListLoader;
use Espo\ORM\Defs as OrmDefs;
use Espo\ORM\Entity;

class Loader implements LoaderInterface
{
    /**
     * @var array<string,string[]>
     */
    private array $fieldListCacheMap = [];

    public function __construct(
        private readonly OrmDefs $ormDefs,
        private readonly RecordListLoader $recordListLoader,
    ) {
    }

    /**
     * @throws Forbidden
     * @throws NotFound
     */
    public function process(Entity $entity, Params $params): void
    {
        $entityType = $entity->getEntityType();

        foreach ($this->getFieldList($entityType) as $field) {
            $this->recordListLoader->load($entity, $field);
        }
    }

    /**
     * @return string[]
     */
    private function getFieldList(string $entityType): array
    {
        if (array_key_exists($entityType, $this->fieldListCacheMap)) {
            return $this->fieldListCacheMap[$entityType];
        }

        $list = [];
        $entityDefs = $this->ormDefs->getEntity($entityType);

        foreach ($entityDefs->getFieldList() as $fieldDefs) {
            if ($fieldDefs->getType() !== 'linkMultiple') {
                continue;
            }

            if ($fieldDefs->getParam('noLoad')) {
                continue;
            }

            if (!$fieldDefs->getParam('recordListEnabled')) {
                continue;
            }

            if ($fieldDefs->isNotStorable()) {
                continue;
            }

            $name = $fieldDefs->getName();

            if (!$entityDefs->hasRelation($name)) {
                continue;
            }

            $list[] = $name;
        }

        $this->fieldListCacheMap[$entityType] = $list;

        return $list;
    }
}
