<?php

namespace Espo\Modules\ExportXml\Entities;

class XmlTemplate extends \Espo\Core\Templates\Entities\Base
{
    public const ENTITY_TYPE = 'XmlTemplate';

    protected $entityType = 'XmlTemplate';

    public function getTargetEntityType(): ?string
    {
        return $this->get('entityType');
    }

    public function getBody(): ?string
    {
        return $this->get('body');
    }

}
