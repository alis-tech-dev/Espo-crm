<?php

namespace Espo\Modules\Autocrm\Tools\Layout\ContainerServices;

use Espo\Core\Di;
use Espo\Modules\Autocrm\Tools\Layout\UnifiedLayoutProvider;

class LayoutUtil extends \Espo\Core\Utils\Layout implements Di\InjectableFactoryAware
{
    use Di\InjectableFactorySetter;

    /**
     * @throws \JsonException
     */
    public function get(string $scope, string $name): ?string
    {
        $layout = $this->injectableFactory
            ->create(UnifiedLayoutProvider::class)
            ->get($scope, $name);

        if ($layout !== null) {
            return $layout;
        }

        return parent::get($scope, $name);
    }
}
