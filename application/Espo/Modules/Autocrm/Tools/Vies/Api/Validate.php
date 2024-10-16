<?php

namespace Espo\Modules\Autocrm\Tools\Vies\Api;

use Espo\Core\Api\{Action, Request, Response, ResponseComposer};
use Espo\Core\Exceptions\{BadRequest, Forbidden};
use Espo\Core\Utils\Config;
use Espo\Modules\Autocrm\Tools\Vies\Service as ViesService;

class Validate implements Action
{
	public function __construct(
		private readonly ViesService $viesService,
		private readonly Config      $config,
	)
	{
	}

	/**
	 * @throws BadRequest
	 * @throws Forbidden
	 * @throws \JsonException
	 */
	public function process(Request $request): Response
	{
		if (empty($this->config->get('viesEnabled'))) {
			throw new Forbidden('VIES is not enabled');
		}

		$countryCode = $request->getRouteParam('countryCode');
		$vatNumber = $request->getRouteParam('vatNumber');

		if (empty($countryCode) || empty($vatNumber)) {
			throw new BadRequest('Country code and VAT number are required');
		}

		if (!preg_match('/^[a-zA-Z]{2}$/', $countryCode)) {
			throw new BadRequest('Country code must be 2 letters');
		}

		$valid = $this->viesService->verifyVatNumber($countryCode, $vatNumber);

		return ResponseComposer::json([
			'valid' => $valid,
		]);
	}
}
