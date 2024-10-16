<?php

namespace Espo\Modules\Autocrm\Tools\RecordList;

use Espo\Core\Exceptions\{
    BadRequest,
    Error,
    Forbidden,
    NotFound
};
use Espo\Core\Record\{
    Collection as RecordCollection,
    ServiceContainer as RecordServiceContainer
};
use Espo\Core\Select\SearchParams;

class Service
{

    public function __construct(
        private readonly RecordServiceContainer $recordServiceContainer
    ) {
    }

    /**
     * @throws Forbidden
     * @throws NotFound
     * @throws BadRequest
     * @throws Error
     */
    public function obtain(string $scope, string $id, string $link, SearchParams $searchParams): RecordCollection
    {
        $service = $this->recordServiceContainer->get($scope);
        $searchParams = $searchParams->withMaxSize(null);

        return $service->findLinked($id, $link, $searchParams);
    }
}
