<?php

namespace Espo\Modules\Autocrm\Classes\FieldProcessing\Relation;

use Espo\Core\FieldProcessing\{Saver as SaverInterface, Saver\Params,};
use Espo\Core\ORM\EntityManager;
use Espo\ORM\Entity;
use Espo\ORM\Query\Part\Expression as Expr;

class LinkMultipleSaver implements SaverInterface
{
	private array $fieldListMapCache = [];

	public function __construct(
		private readonly EntityManager $entityManager,
	) {
	}

	public function process(Entity $entity, Params $params): void
	{
		$recordListOptions = $params->getOption('recordListOptions') ?? [];

		foreach ($this->getFieldList($entity->getEntityType()) as $name) {
			$this->entityManager->getTransactionManager()->run(fn () => $this->processItem($entity, $name, $recordListOptions));
		}
	}

	private function getFieldList(string $entityType): array
	{
		if (array_key_exists($entityType, $this->fieldListMapCache)) {
			return $this->fieldListMapCache[$entityType];
		}

		$entityDefs = $this->entityManager
			->getDefs()
			->getEntity($entityType);

		$list = [];

		foreach ($entityDefs->getFieldNameList() as $name) {
			$defs = $entityDefs->getField($name);

			if ($defs->getType() !== 'linkMultiple') {
				continue;
			}

			if (!$defs->getParam('recordListEnabled')) {
				continue;
			}

			if (!$entityDefs->hasRelation($name)) {
				continue;
			}

			$list[] = $name;
		}

		$this->fieldListMapCache[$entityType] = $list;

		return $list;
	}

	private function processItem(Entity $entity, string $name, array $options = []): void
	{
		$fieldName = $name . 'RecordList';

		if (!$entity->has($fieldName)) {
			return;
		}

		/** @var object[] $recordList */
		$recordList = $entity->get($fieldName);

		if (!is_array($recordList)) {
			return;
		}

		// Lock row
		$this->entityManager
			->getRDBRepository($entity->getEntityType())
			->select(['id'])
			->forUpdate()
			->where(Expr::equal(Expr::column('id'), $entity->getId()))
			->findOne();

		$entityDefs = $this->entityManager
			->getDefs()
			->getEntity($entity->getEntityType());

		$fieldDefs = $entityDefs->getField($name);
		$relationDefs = $entityDefs->getRelation($name);
		$recordType = $relationDefs->getForeignEntityType();

		$rdbRelation = $this->entityManager
			->getRDBRepository($entity->getEntityType())
			->getRelation($entity, $name);

		$columns = array_flip($fieldDefs->getParam('columns') ?: []);

		foreach ($recordList as &$recordData) {
			$recordId = $recordData->id ?? null;

			if ($recordId) {
				$recordEntity = $this->entityManager->getEntity($recordType, $recordId);
			} else {
				$recordEntity = $this->entityManager->getNewEntity($recordType);
			}

			if (!$recordEntity) {
				continue;
			}

			$data = [];
			$columnsData = [];

			foreach ($recordData as $attribute => $value) {
				$column = $columns[$attribute] ?? null;

				if ($column) {
					$columnsData[$column] = $value;
				} else {
					$data[$attribute] = $value;
				}
			}

			$recordEntity->set($data);

			$this->entityManager->saveEntity($recordEntity, [
				'triggeredByRecordList' => true,
				...$options,
			]);

			if (!$recordId) {
				$recordData->id = $recordEntity->getId();
			}

			if ($rdbRelation->isRelated($recordEntity)) {
				if ($columnsData) {
					$rdbRelation->updateColumns($recordEntity, $columnsData);
				}
			} else {
				$rdbRelation->relate($recordEntity, $columnsData);
			}
		}

		$entity->set($fieldName, $recordList);

		$shouldUnrelate = $relationDefs->isManyToMany() || $fieldDefs->getParam('recordListKeepRemoved');

		$toRemove = $rdbRelation;

		if (!empty($recordList)) {
			$toRemove = $toRemove->where(Expr::notIn(Expr::column('id'), array_column($recordList, 'id')));
		}

		$toRemove = $toRemove->find();

		foreach ($toRemove as $toRemoveEntity) {
			if ($shouldUnrelate) {
				$rdbRelation->unrelate($toRemoveEntity);
			} else {
				$this->entityManager->removeEntity($toRemoveEntity);
			}
		}
	}
}
