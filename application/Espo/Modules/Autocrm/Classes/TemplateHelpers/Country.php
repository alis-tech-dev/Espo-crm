<?php

namespace Espo\Modules\Autocrm\Classes\TemplateHelpers;

use Espo\Core\Htmlizer\{Helper, Helper\Data, Helper\Result};
use Espo\Core\Utils\Language;
use Espo\Entities\Settings;

class Country implements Helper {
    public function __construct(
        private readonly Language $language
    ){}

	public function render(Data $data): Result
	{
        $country = $data->getArgumentList()[0];

        $translated = $this->language->translateOption($country, 'addressCountryList', Settings::ENTITY_TYPE);

        return Result::createSafeString($translated);
    }
}