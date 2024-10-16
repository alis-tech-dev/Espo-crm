<?php

namespace Espo\Modules\Autocrm\Tools\FieldManager\Hooks;

use Espo\Core\Di;

class AddressType implements Di\MetadataAware
{
    use Di\MetadataSetter;

    public function afterSave(string $scope, string $name, $defs, $options): void
    {
        if ($defs['saveCoordinates']) {
            $this->metadata->set(
                'entityDefs',
                $scope,
                [
                    'fields' => [
                        $name . 'Lat' => [
                            'type' => 'float',
                        ],
                        $name . 'Lng' => [
                            'type' => 'float',
                        ],
                    ],
                ]
            );
            $this->metadata->save();
        }
    }
}
