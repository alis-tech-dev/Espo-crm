<?php

namespace Espo\Modules\OnlyOffice\Classes\AppParams;

use Espo\ORM\EntityManager;

class OnlyOfficeScriptSrc implements \Espo\Tools\App\AppParam
{

    public function __construct(
        private readonly EntityManager $entityManager
    ) {}

    public function get(): ?string
    {
        return $this
            ->entityManager
            ->getEntity('Integration', 'OnlyOffice')
            ?->get('scriptSrc');
    }
}
