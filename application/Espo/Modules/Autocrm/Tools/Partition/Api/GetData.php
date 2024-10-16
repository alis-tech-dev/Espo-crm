<?php

namespace Espo\Modules\Autocrm\Tools\Partition\Api;

use Espo\Core\Api\{Action, Request, Response, ResponseComposer};
use Espo\Core\Exceptions\{BadRequest, Error, Forbidden};
use Espo\Core\Record\SearchParamsFetcher;
use Espo\Modules\Autocrm\Tools\Partition\PartitionService;

class GetData implements Action
{
	public function __construct(
		private readonly PartitionService    $partitionService,
		private readonly SearchParamsFetcher $searchParamsFetcher
	)
	{
	}

	/**
	 * @throws BadRequest
	 * @throws Forbidden|Error
	 */
	public function process(Request $request): Response
	{
		$entityType = $request->getRouteParam('entityType');
		$by = $request->getRouteParam('by');

		if (!$entityType || !$by) {
			throw new BadRequest();
		}

		$searchParams = $this->searchParamsFetcher->fetch($request);
		$result = $this->partitionService->getData($entityType, $searchParams, $by);

		return ResponseComposer::json([
			'total' => $result->getTotal(),
			'list' => $result->getCollection()->getValueMapList(),
			'additionalData' => $result->getData(),
		]);
	}
}
