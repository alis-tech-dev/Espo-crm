<?php

namespace Espo\Modules\Autocrm\EntryPoints;

use Espo\Core\Api\{
    Request,
    Response
};
use Espo\Core\EntryPoint\Traits\NoAuth;
use Espo\Core\Exceptions\{
    BadRequest,
    NotFound
};
use Espo\Core\Utils\{
    Client\ActionRenderer,
    Crypt,
    Json
};
use Espo\Entities\{
    Email,
    EmailTemplate
};
use Espo\Modules\Autocrm\Tools\EmailTemplate\ViewInBrowser\Data;
use Espo\ORM\EntityManager;
use Espo\Tools\EmailTemplate\{
    Data as EmailTemplateData,
    Params as EmailTemplateParams,
    Processor as EmailTemplateProcessor
};
use JsonException;
use RuntimeException;

class ViewInBrowser
{
    use NoAuth;

    public function __construct(
        private readonly Crypt $crypt,
        private readonly EntityManager $entityManager,
        private readonly ActionRenderer $actionRenderer,
        private readonly EmailTemplateProcessor $emailTemplateProcessor,
    ) {
    }

    /**
     * @throws BadRequest
     * @throws NotFound
     */
    public function run(Request $request, Response $response): void
    {
        $encryptedData = $request->getQueryParam('data');

        if (!$encryptedData) {
            throw new BadRequest();
        }

        try {
            $decryptedData = Json::decode($this->crypt->decrypt($encryptedData));
        } catch (RuntimeException|JsonException $e) {
            throw new BadRequest();
        }

        $data = Data::create()
            ->withEmailTemplateId($decryptedData->emailTemplateId ?? null)
            ->withParentId($decryptedData->parentId ?? null)
            ->withParentType($decryptedData->parentType ?? null);

        $bodyContent = null;

        if ($data->getEmailTemplateId() && $data->getParentId() && $data->getParentType()) {
            $bodyContent = $this->handleEmailTemplate($data->getEmailTemplateId(), $data->getParentId(), $data->getParentType());
        }

        if (!$bodyContent) {
            throw new BadRequest();
        }

        $params = new ActionRenderer\Params('autocrm:controllers/view-in-browser', 'viewEmail', [
            'emailBody' => $bodyContent,
        ]);

        $this->actionRenderer->write($response, $params);
    }

    /**
     * @throws NotFound
     */
    private function handleEmailEntity(string $emailId): string
    {
        $email = $this->entityManager->getEntity('Email', $emailId);

        if (!$email) {
            throw new NotFound();
        }

        assert($email instanceof Email);

        return $email->getBody();
    }

    /**
     * @throws NotFound
     */
    private function handleEmailTemplate(string $templateId, string $parentId, string $parentType): string
    {
        $templateEntity = $this->entityManager->getEntity('EmailTemplate', $templateId);
        $parentEntity = $this->entityManager->getEntity($parentType, $parentId);

        if (!$templateEntity || !$parentEntity) {
            throw new NotFound();
        }

        assert($templateEntity instanceof EmailTemplate);

        return $this->emailTemplateProcessor->process(
            $templateEntity,
            EmailTemplateParams::create(),
            EmailTemplateData::create()->withParent($parentEntity),
        )->getBody();
    }
}
