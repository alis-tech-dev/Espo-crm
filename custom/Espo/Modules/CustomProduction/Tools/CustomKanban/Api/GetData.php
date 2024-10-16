<?php

namespace Espo\Modules\CustomProduction\Tools\CustomKanban\Api;

use Espo\Core\Api\{
	Action,
	Request,
	Response,
	ResponseComposer};
use Espo\Core\Exceptions\BadRequest;
use Espo\Core\Record\SearchParamsFetcher;
use Espo\Modules\CustomProduction\Tools\CustomKanban\KanbanService;

class GetData implements Action
{
	public function __construct(
		private readonly KanbanService $service,
		private readonly SearchParamsFetcher $searchParamsFetcher
	) {
	}

	public function process(Request $request): Response
	{
		$entityType = $request->getRouteParam('entityType');
		$statusField = $request->getRouteParam('statusField');

		if (!$entityType || !$statusField) {
			throw new BadRequest();
		}

		$searchParams = $this->searchParamsFetcher->fetch($request);

		$result = $this->service->getData($entityType, $statusField, $searchParams);

		return ResponseComposer::json([
			'total' => $result->getTotal(),
			'list' => $result->getCollection()->getValueMapList(),
			'additionalData' => $result->getData(),
		]);
	}
}
