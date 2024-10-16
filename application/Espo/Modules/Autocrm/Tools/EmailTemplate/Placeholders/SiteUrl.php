<?php

namespace Espo\Modules\Autocrm\Tools\EmailTemplate\Placeholders;

use Espo\Core\Utils\Config;
use Espo\Tools\EmailTemplate\Data;
use Espo\Tools\EmailTemplate\Placeholder;

class SiteUrl implements Placeholder
{
    public function __construct(
        private readonly Config $config
    ) {
    }

    public function get(Data $data): string { 
        $siteUrl = $this->config->get("siteUrl");

        if(empty($siteUrl)) {
            return "";
        }

        $siteUrl = rtrim($siteUrl, "/");

        return $siteUrl;
    }
}