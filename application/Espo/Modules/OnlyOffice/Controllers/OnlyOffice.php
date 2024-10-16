<?php

namespace Espo\Modules\OnlyOffice\Controllers;

use Espo\Core\Exceptions\Forbidden;
use Espo\Core\Exceptions\BadRequest;

use Espo\Core\{
    Api\Request,
    Api\Response,
    Exceptions\Error
};

use Espo\Core\Exceptions\NotFoundSilent;
use Espo\Entities\User;
use JsonException;
use Espo\Modules\OnlyOffice\Tools\OnlyOffice\Service;
use stdClass;

class OnlyOffice
{

    public function __construct(
        protected readonly User    $user,
        protected readonly Service $service
    ) {}

    /**
     * @throws BadRequest
     * @throws NotFoundSilent
     * @throws Forbidden
     * @throws JsonException
     */
    public function postActionCallback(Request $request, Response $response): stdClass
    {
        $key = $request->getRouteParam('key');

        if (empty($key)) {
            throw new BadRequest('No key provided.');
        }

        return $this->service->handleCallback($key, $request->getParsedBody());
    }

    /**
     * @throws BadRequest
     * @throws Forbidden
     * @throws NotFoundSilent
     * @throws JsonException
     * @throws Error
     */
    public function getActionOpenDocument(Request $request, Response $response): stdClass
    {
        $documentId = $request->getQueryParam('id');

        if (!$documentId) {
            throw new BadRequest();
        }

        return $this->service->handleOpenDocument($documentId, $this->user);
    }
}
