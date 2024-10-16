<?php

namespace Espo\Modules\CustomProduction\Tools\CustomKanban;

use Espo\Core\Acl\Table;
use Espo\Core\AclManager;
use Espo\Core\Exceptions\{
	Error,
	ForbiddenSilent};
use Espo\Core\InjectableFactory;
use Espo\Core\Select\SearchParams;
use Espo\Core\Utils\{
	Config,
	Metadata};
use Espo\Entities\User;
use Espo\Tools\Kanban\Result;

class KanbanService
{
	public function __construct(
		private readonly User $user,
		private readonly AclManager $aclManager,
		private readonly InjectableFactory $injectableFactory,
		private readonly Config $config,
		private readonly Metadata $metadata,
		private readonly Orderer $orderer,
	) {
	}

	/**
	 * @throws Error
	 * @throws ForbiddenSilent
	 */
	public function getData(string $entityType, string $statusField, SearchParams $searchParams): Result
	{
		$this->processAccessCheck($entityType);

		$disableCount = $this->metadata
			->get(['entityDefs', $entityType, 'collection', 'countDisabled']) ?? false;

		$orderDisabled = $this->metadata
			->get(['scopes', $entityType, 'kanbanOrderDisabled']) ?? false;

		$maxOrderNumber = $this->config->get('kanbanMaxOrderNumber');

		return $this->createKanban()
			->setEntityType($entityType)
			->setStatusField($statusField)
			->setSearchParams($searchParams)
			->setCountDisabled($disableCount)
			->setOrderDisabled($orderDisabled)
			->setUserId($this->user->getId())
			->setMaxOrderNumber($maxOrderNumber)
			->getResult();
	}

	/**
	 * @param string[] $ids
	 *
	 * @throws ForbiddenSilent
	 */
	public function order(string $entityType, string $group, array $ids): void
	{
		$this->processAccessCheck($entityType);

		if ($this->user->isPortal()) {
			throw new ForbiddenSilent("Kanban order is not allowed for portal users.");
		}

		$maxOrderNumber = $this->config->get('kanbanMaxOrderNumber');

		$this->orderer
			->setEntityType($entityType)
			->setGroup($group)
			->setUserId($this->user->getId())
			->setMaxNumber($maxOrderNumber)
			->order($ids);
	}

	private function createKanban(): Kanban
	{
		return $this->injectableFactory->create(Kanban::class);
	}

	/**
	 * @throws ForbiddenSilent
	 */
	private function processAccessCheck(string $entityType): void
	{
		if (!$this->metadata->get(['scopes', $entityType, 'object'])) {
			throw new ForbiddenSilent("Non-object entities are not supported.");
		}

		if ($this->metadata->get(['recordDefs', $entityType, 'kanbanDisabled'])) {
			throw new ForbiddenSilent("Kanban is disabled for '{$entityType}'.");
		}

		if (!$this->aclManager->check($this->user, $entityType, Table::ACTION_READ)) {
			throw new ForbiddenSilent();
		}
	}
}
