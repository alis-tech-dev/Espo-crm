<?php

namespace Espo\Modules\OnlyOffice\EntryPoints;

use Espo\Core\Exceptions\BadRequest;

use Espo\Core\{
    Api\Request,
    Api\Response,
    EntryPoint\Traits\NoAuth,
    EntryPoint\EntryPoint,
    Exceptions\Forbidden,
    Exceptions\NotFoundSilent
};
use JsonException;
use Espo\Modules\OnlyOffice\Tools\OnlyOffice\Service;


class GetFileOnlyOffice implements EntryPoint
{
    use NoAuth;

    public function __construct(
        protected readonly Service $service
    ) {}

    /**
     * @throws BadRequest
     * @throws Forbidden
     * @throws NotFoundSilent
     * @throws JsonException
     */
    public function run(Request $request, Response $response): void
    {
        $data = $request->getQueryParam('data');

        if (empty($data)) {
            throw new BadRequest('No data provided.');
        }

        $result = $this->service->processGetFile($data);

        $filename = $result->getFilename();
        $mimeType = $result->getMimeType();

        if ($mimeType) {
            $response->setHeader('Content-Type', $mimeType);
        }

        $response
            ->setHeader('Content-Description', 'File Transfer')
            ->setHeader('Content-Disposition', "inline;filename=\"$filename\"")
            ->setHeader('Expires', '0')
            ->setHeader('Cache-Control', 'must-revalidate')
            ->setHeader('Pragma', 'public')
            ->setHeader('Content-Length', (string)$result->getSize())
            ->setBody($result->getStream());
    }
}
