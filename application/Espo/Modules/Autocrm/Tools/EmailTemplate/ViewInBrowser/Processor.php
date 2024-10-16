<?php

namespace Espo\Modules\Autocrm\Tools\EmailTemplate\ViewInBrowser;

use Espo\Core\Utils\{
    Config,
    Crypt,
    Json,
    Language,
};

class Processor
{
    public function __construct(
        private readonly Config $config,
        private readonly Crypt $crypt,
        private readonly Language $language,
    ) {
    }

    public function process(string $content, Data $data): string
    {
        $decryptedData = Json::encode($data->getValueMap());
        $encryptedData = $this->crypt->encrypt($decryptedData);
        $viewInBrowserUrl = $this->config->get('siteUrl') . '?entryPoint=viewInBrowser&data=' . urlencode($encryptedData);
        $viewInBrowseLink = '<a href="' . $viewInBrowserUrl . '">' . $this->language->translate('View in Browser', 'labels', 'Email') . '</a>';

        return str_replace(
            ['{viewInBrowserUrl}', '{viewInBrowserLink}'],
            [$viewInBrowserUrl, $viewInBrowseLink],
            $content
        );
    }
}
