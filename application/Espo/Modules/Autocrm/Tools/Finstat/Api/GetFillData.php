<?php

namespace Espo\Modules\Autocrm\Tools\Finstat\Api;

use Espo\Core\Api\{Action, Request, Response, ResponseComposer};
use Espo\Core\Exceptions\BadRequest;
use Espo\Core\Exceptions\Error;
use Espo\Modules\Autocrm\Tools\Finstat\Service as FinstatService;

readonly class GetFillData implements Action
{
	public function __construct(
		private FinstatService $finstatService,
	)
	{
	}

	/**
	 * @throws BadRequest
	 * @throws \JsonException
	 * @throws Error
	 */
	public function process(Request $request): Response
	{
		$sicCode = $request->getRouteParam('sicCode');

		if (empty($sicCode)) {
			throw new BadRequest('Missing SIC code');
		}

		$data = $this->finstatService->getDataBySicCode($sicCode);

		return ResponseComposer::json([
			'attributes' => $data,
		]);
	}
}
