<?php

namespace Espo\Modules\Autocrm\Classes\Utils\Database\Orm\FieldConverters;

use Espo\Core\Utils\Database\Orm\Defs\AttributeDefs;
use Espo\Core\Utils\Database\Orm\Defs\EntityDefs;
use Espo\ORM\Defs\FieldDefs;
use Espo\ORM\Type\AttributeType;

class LinkMultiple extends \Espo\Core\Utils\Database\Orm\FieldConverters\LinkMultiple
{
    public function convert(FieldDefs $fieldDefs, string $entityType): EntityDefs
    {
        $entityDefs = parent::convert($fieldDefs, $entityType);

        $recordListName = $fieldDefs->getName() . 'RecordList';
        $recordList = $fieldDefs->getParam('recordListEnabled');

        if ($recordList) {
            $entityDefs = $entityDefs->withAttribute(
                AttributeDefs::create($recordListName)
                    ->withType(AttributeType::JSON_ARRAY)
                    ->withNotStorable()
                    ->withParamsMerged([
                        'attributeRole' => 'recordList',
                    ])
            );
        }

        return $entityDefs;
    }
}
