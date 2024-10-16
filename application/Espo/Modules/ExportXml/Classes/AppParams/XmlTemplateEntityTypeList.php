<?php

namespace Espo\Modules\ExportXml\Classes\AppParams;

use Espo\Core\Acl;
use Espo\Core\Exceptions\BadRequest;
use Espo\Core\Exceptions\Error;
use Espo\Core\Exceptions\Forbidden;
use Espo\Core\ORM\EntityManager;
use Espo\Core\Select\SelectBuilderFactory;
use Espo\Entities\Template;
use Espo\Modules\ExportXml\Entities\XmlTemplate;
use Espo\Tools\App\AppParam;

class XmlTemplateEntityTypeList implements AppParam
{
    public function __construct(
        private readonly Acl $acl,
        private readonly SelectBuilderFactory $selectBuilderFactory,
        private readonly EntityManager $entityManager
    ) {
    }

    /**
     * @return string[]
     * @throws BadRequest
     * @throws Error
     * @throws Forbidden
     */
    public function get(): array
    {
        if (!$this->acl->checkScope(Template::ENTITY_TYPE)) {
            return [];
        }

        $list = [];

        $query = $this->selectBuilderFactory
            ->create()
            ->from(XmlTemplate::ENTITY_TYPE)
            ->withAccessControlFilter()
            ->buildQueryBuilder()
            ->select(['entityType'])
            ->group(['entityType'])
            ->build();

        $templateCollection = $this->entityManager
            ->getRDBRepository(XmlTemplate::ENTITY_TYPE)
            ->clone($query)
            ->find();

        foreach ($templateCollection as $template) {
            $list[] = $template->getTargetEntityType();
        }

        return $list;
    }
}
