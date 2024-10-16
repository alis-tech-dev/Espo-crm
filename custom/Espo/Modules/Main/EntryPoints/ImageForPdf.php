<?php

namespace Espo\Modules\Main\EntryPoints;

use Espo\Core\Api\Request;
use Espo\Core\Api\Response;
use Espo\Core\EntryPoint\Traits\NoAuth;
use Espo\Core\Exceptions\BadRequest;
use Espo\Core\Exceptions\Forbidden;
use Espo\EntryPoints\Image;

class ImageForPdf extends Image
{
	use NoAuth;

	public function run(Request $request, Response $response): void
	{
		$id = $request->getQueryParam('id');
		$size = $request->getQueryParam('size') ?? null;
		$secret = $request->getQueryParam('secret');

		if (!$id) {
			throw new BadRequest();
		}

		if ($secret !== "2b7ca41be3af7d5d3b22bc1e397eb0d4") {
			throw new Forbidden();
		}

		$this->show($response, $id, $size, true);
	}
}
