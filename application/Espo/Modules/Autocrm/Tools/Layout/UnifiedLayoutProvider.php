<?php

namespace Espo\Modules\Autocrm\Tools\Layout;

use Espo\Core\Utils\{
    File\Manager as FileManager,
    Json,
    Util};
use Espo\Core\Utils\Resource\{
    Reader as ResourceReader,
    Reader\Params as ResourceReaderParams};

class UnifiedLayoutProvider
{
    private string $defaultPath = 'application/Espo/Modules/Autocrm/Resources/defaults/layouts';
    private ?array $data = null;

    public function __construct(
        private readonly FileManager $fileManager,
        private readonly ResourceReader $resourceReader,
    ) {
    }

    /**
     * @throws \JsonException
     */
    public function get(
        string $scope,
        string $name
    ): ?string {
        // 1. Unified layout
        $layout = Util::getValueByKey($this->getData(), [$scope, $name]);

        if ($layout !== null) {
            return Json::encode($layout);
        }

        // 2. AutoCRM's default layout
        $path = $this->defaultPath . '/' . $name . '.json';

        if ($this->fileManager->isFile($path)) {
            return $this->fileManager->getContents($path);
        }

        return null;
    }

    private function getData(): array
    {
        if (empty($this->data) || !is_array($this->data)) {
            $this->loadData();
        }

        assert($this->data !== null);

        return $this->data;
    }

    private function loadData(): void
    {
        $this->data = $this->resourceReader->readAsArray(
            'layouts',
            ResourceReaderParams::create()
        );
    }
}
