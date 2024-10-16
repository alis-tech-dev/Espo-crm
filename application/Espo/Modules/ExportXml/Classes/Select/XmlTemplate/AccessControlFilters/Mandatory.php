<?php

namespace Espo\Modules\ExportXml\Classes\Select\XmlTemplate\AccessControlFilters;

use Espo\ORM\{
    Query\SelectBuilder,
    Defs,
};

use Espo\Core\{
    Select\AccessControl\Filter,
    AclManager,
    Acl\Exceptions\NotImplemented,
};

use Espo\Entities\User;

class Mandatory implements Filter
{

    public function __construct(
        private readonly User $user,
        private readonly Defs $defs,
        private readonly AclManager $aclManager
    ) {
    }

    public function apply(SelectBuilder $queryBuilder): void
    {
        if ($this->user->isAdmin()) {
            return;
        }

        $forbiddenEntityTypeList = [];

        foreach ($this->defs->getEntityTypeList() as $entityType) {
            try {
                if (!$this->aclManager->checkScope($this->user, $entityType)) {
                    $forbiddenEntityTypeList[] = $entityType;
                }
            } catch (NotImplemented) {
            }
        }

        if (empty($forbiddenEntityTypeList)) {
            return;
        }

        $queryBuilder->where([
            'entityType!=' => $forbiddenEntityTypeList,
        ]);
    }
}
