<?php

namespace Espo\Modules\Autocrm\Tools\FieldManager;

use Espo\Tools\FieldManager\FieldManager as FieldManagerTool;

class FieldManager extends FieldManagerTool
{
    protected function prepareFieldDefs(string $scope, string $name, $fieldDefs): array
    {
        $filteredDefs = parent::prepareFieldDefs($scope, $name, $fieldDefs);

        if (isset($fieldDefs['notStorable']) && $fieldDefs['notStorable']) {
            $filteredDefs['notStorable'] = true;
        }

        return $filteredDefs;
    }
}
