<?php

namespace Espo\Modules\Autocrm\Classes\Utils;

use Espo\Core\{Di, Utils\ClientManager as OriginalClientManager, Utils\Json, Utils\Language as LanguageUtil,};

class ClientManager extends OriginalClientManager implements Di\MetadataAware, Di\ConfigAware, Di\PreferencesAware
{
    use Di\MetadataSetter;
    use Di\ConfigSetter;
    use Di\PreferencesSetter;

    public function render(?string $runScript = null, ?string $htmlFilePath = null, array $vars = []): string
    {
        $version = $this->config->get('version');

        $htmlFilePath ??= 'application/Espo/Modules/Autocrm/Resources/html/';
        $htmlFilePath .= version_compare($version, '8.0.0', '<') ? 'main.old.tpl' : 'main.tpl';

        $extensionMap = $this->metadata->get(['app', 'client', 'viewExtensions'], []);
        $lang = LanguageUtil::detectLanguage($this->config, $this->preferences);

        $vars = array_merge($vars, [
            'extensionViews' => Json::encode($extensionMap),
            'lang' => strtok($lang, '_'),
        ]);

        return parent::render($runScript, $htmlFilePath, $vars);
    }
}
