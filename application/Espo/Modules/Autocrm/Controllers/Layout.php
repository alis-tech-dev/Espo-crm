<?php

namespace Espo\Modules\Autocrm\Controllers;


use Espo\Core\Api\Request;
use Espo\Core\Di;
use Espo\Core\Exceptions\{BadRequest, Error, Forbidden};
use Espo\Modules\Autocrm\Tools\Layout\Service;

class Layout extends \Espo\Controllers\Layout implements Di\UserAware, Di\InjectableFactoryAware
{
	use Di\UserSetter;
	use Di\InjectableFactorySetter;

	private ?Service $service = null;

	/**
	 * @throws BadRequest
	 * @throws Forbidden
	 * @throws Error
	 * @throws \JsonException
	 */
	public function postActionAdd(Request $request): string
	{
		if (!$this->user->isAdmin()) {
			throw new Forbidden();
		}

		$data = $request->getParsedBody();

		$scope = $data->scope ?? null;
		$name = $data->name ?? null;
		$type = $data->type;
		$label = $data->label;

		if (!$scope || !$name) {
			throw new BadRequest();
		}

		return $this->getService()->add($type, $this->sanitizeInput($scope), $this->sanitizeInput($name), $label);
	}

	protected function sanitizeInput(string $name): string
	{
		return preg_replace("([\.]{2,})", '', $name);
	}

	private function getService(): Service
	{
		return $this->service ??= $this->injectableFactory->create(Service::class);
	}
}
