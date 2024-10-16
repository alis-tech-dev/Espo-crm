<?php

namespace Espo\Modules\OnlyOffice\Hooks\Integration;

use Espo\Core\ORM\Entity;
use Espo\Core\Utils\Config;
use Espo\Core\Utils\Config\ConfigWriter;

class OnlyOffice
{
    public function __construct(
        private readonly Config       $config,
        private readonly ConfigWriter $configWriter,
    ) {}

    public function afterSave(Entity $entity, array $options = []): void
    {
        $scriptSrc = $entity->get('scriptSrc');

        if ($scriptSrc) {
            $list = $this->config->get('clientCspScriptSourceList');

            $urlParts = parse_url($scriptSrc);

            $url = "{$urlParts['scheme']}://{$urlParts['host']}";

            if (isset($urlParts['scheme'], $urlParts['host']) && !in_array($url, $list, true)) {
                $list[] = $url;

                $this->configWriter->set('clientCspScriptSourceList', $list);
                $this->configWriter->save();
            }
        }
    }
}
