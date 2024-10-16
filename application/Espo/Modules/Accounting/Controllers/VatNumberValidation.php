<?php

namespace Espo\Modules\Accounting\Controllers;

use Espo\Core\Api\Request;
use Espo\Modules\Accounting\Tools\VIESValidator;
use Espo\Core\Di;

class VatNumberValidation extends \Espo\Core\Templates\Controllers\Base implements Di\InjectableFactoryAware
{
    use Di\InjectableFactorySetter;

    private ?VIESValidator $viesValidator = null;

    public function getActionCheckVatId(Request $request) : bool {
        $vatId = $request->getRouteParam('vatId');
        return $this->getViesValidator()->validate($vatId);
    }

    protected function getViesValidator(): VIESValidator
	{
		return $this->viesValidator ??= $this->injectableFactory->create(VIESValidator::class);
	}


}