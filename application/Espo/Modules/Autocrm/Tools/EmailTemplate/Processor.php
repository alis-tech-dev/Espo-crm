<?php

namespace Espo\Modules\Autocrm\Tools\EmailTemplate;

use Espo\Core\Di;
use Espo\Entities\EmailTemplate;
use Espo\Modules\Autocrm\Tools\EmailTemplate\ViewInBrowser\{
    Data as ViewInBrowserData,
    Processor as ViewInBrowserProcessor,
};
use Espo\Tools\EmailTemplate\{
    Data,
    Params,
    Result
};

class Processor extends \Espo\Tools\EmailTemplate\Processor implements Di\EntityManagerAware, Di\InjectableFactoryAware
{
    use Di\EntityManagerSetter;
    use Di\InjectableFactorySetter;

    private ?ViewInBrowserProcessor $viewInBrowserProcess = null;

    public function process(EmailTemplate $template, Params $params, Data $data): Result
    {
        $result = parent::process($template, $params, $data);

        $parent = $data->getParent();
        $parentId = $parent?->getId() ?? $data->getParentId();
        $parentType = $parent?->getEntityType() ?? $data->getParentType();

        if (!$parentId || !$parentType) {
            return $result;
        }

        $data = ViewInBrowserData::create()
            ->withEmailTemplateId($template->getId())
            ->withParentId($parentId)
            ->withParentType($parentType);

        $body = $this->getViewInBrowserProcessor()->process($result->getBody(), $data);

        return new Result(
            $result->getSubject(),
            $body,
            $template->isHtml(),
            $result->getAttachmentList(),
        );
    }

    private function getViewInBrowserProcessor(): ViewInBrowserProcessor
    {
        return $this->viewInBrowserProcess ??= $this->injectableFactory->create(ViewInBrowserProcessor::class);
    }
}
