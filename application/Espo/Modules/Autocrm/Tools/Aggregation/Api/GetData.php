<?php

namespace Espo\Modules\Autocrm\Tools\Aggregation\Api;

use Espo\Core\Api\{Action, Request, Response, ResponseComposer};
use Espo\Core\Exceptions\{BadRequest, NotFound};
use Espo\Modules\Autocrm\Tools\Aggregation\{Params, Service};

class GetData implements Action
{
	public function __construct(
		private readonly Service $aggregationService,
	)
	{
	}

	/**
	 * @throws BadRequest
	 * @throws NotFound
	 */
	public function process(Request $request): Response
	{
		$scope = $request->getRouteParam('scope');
		$rawParams = $this->prepareParams($request->getQueryParams());

		$params = Params::fromRaw($rawParams, $scope);

		return ResponseComposer::json($this->aggregationService->aggregate($params));
	}

	/**
	 * @throws BadRequest
	 */
	private function prepareParams(array $requestParams): array
	{
		$select = explode(',', $requestParams['select'] ?? '');

		if (!count($select)) {
			throw new BadRequest('No select.');
		}

		$params = [
			'entries' => [],
		];

		foreach ($select as $item) {
			$parts = explode('_', $item);
			$function = array_pop($parts);
			$field = implode('_', $parts);

			if (!$field || !$function) {
				throw new BadRequest('Bad select.');
			}

			$params['entries'][] = [
				'function' => $function,
				'field' => $field,
				'name' => $item,
			];
		}

		if (isset($requestParams['where'])) {
			$params['where'] = $requestParams['where'];
		}

		return $params;
	}
}
