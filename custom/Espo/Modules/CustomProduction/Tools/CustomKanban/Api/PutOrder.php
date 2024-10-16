<?php

namespace Espo\Modules\CustomProduction\Tools\CustomKanban\Api;

use Espo\Core\Api\{
	Action,
	Request,
	Response,
	ResponseComposer};
use Espo\Core\Exceptions\BadRequest;
use Espo\Modules\CustomProduction\Tools\CustomKanban\KanbanService;

class PutOrder implements Action
{
	public function __construct(private readonly KanbanService $service)
	{
	}

	public function process(Request $request): Response
	{
		$data = $request->getParsedBody();

		$entityType = $data->entityType ?? null;
		$group = $data->group ?? null;
		$ids = $data->ids ?? null;

		if (empty($entityType) || !is_string($entityType)) {
			throw new BadRequest();
		}

		if (empty($group) || !is_string($group)) {
			throw new BadRequest();
		}

		if (!is_array($ids)) {
			throw new BadRequest();
		}

		$this->service->order($entityType, $group, $ids);

		return ResponseComposer::json(true);
	}
}
