<?php

namespace Espo\Modules\ExportXml\Tools\Xml;

use Espo\Core\Acl;
use Espo\Core\Exceptions\Error;
use Espo\Core\Exceptions\Forbidden;
use Espo\Core\Exceptions\NotFound;
use Espo\Core\Htmlizer\TemplateRenderer;
use Espo\Core\Htmlizer\TemplateRendererFactory;
use Espo\Core\Record\ServiceContainer;
use Espo\Modules\ExportXml\Entities\XmlTemplate as XmlTemplateEntity;
use Espo\ORM\Entity;
use Espo\ORM\EntityManager;
use Espo\Tools\Pdf\Data;
use Espo\Tools\Pdf\Params;
use Espo\Modules\ExportXml\Tools\Xml\Contents as XmlContents;

class Service
{

    protected TemplateRenderer $templateRenderer;

    public function __construct(
        protected readonly EntityManager $entityManager,
        protected readonly ServiceContainer $serviceContainer,
        protected readonly Data\DataLoaderManager $dataLoaderManager,
        protected readonly Acl $acl,
        protected readonly TemplateRendererFactory $templateRendererFactory
    ) {
        $this->templateRenderer = $this->templateRendererFactory->create();
    }

    /**
     * @throws Forbidden
     * @throws NotFound
     * @throws Error
     */
    public function generate(
        string $entityType,
        string $id,
        string $templateId,
        ?Params $params = null,
        ?Data $data = null
    ): XmlContents {
        $params = $params ?? Params::create()->withAcl();

        $applyAcl = $params->applyAcl();

        $entity = $this->entityManager->getEntityById($entityType, $id);

        if (!$entity) {
            throw new NotFound("Record not found.");
        }

        /** @var ?XmlTemplateEntity $template */
        $template = $this->entityManager->getEntityById(XmlTemplateEntity::ENTITY_TYPE, $templateId);

        if (!$template) {
            throw new NotFound("Template not found.");
        }

        if ($applyAcl && !$this->acl->checkEntityRead($entity)) {
            throw new Forbidden("No access to record.");
        }

        if ($applyAcl && !$this->acl->checkEntityRead($template)) {
            throw new Forbidden("No access to template.");
        }

        $service = $this->serviceContainer->get($entityType);

        $service->loadAdditionalFields($entity);

        if (method_exists($service, 'loadAdditionalFieldsForPdf')) {
            // For bc.
            $service->loadAdditionalFieldsForPdf($entity);
        }

        if ($template->getTargetEntityType() !== $entityType) {
            throw new Error("Not matching entity types.");
        }

        $data = $this->dataLoaderManager->load($entity, $params, $data);

        $title = $this->renderInternal($entity, $template->get('title') ?? '', $data);

        $contents = $this->renderInternal($entity, $template->get('body') ?? '', $data);

        return new XmlContents($title, $contents);
    }

    protected function renderInternal(Entity $entity, string $template, Data $data): string
    {
        return $this
            ->templateRenderer
            ->setSkipInlineAttachmentHandling()
            ->setEntity($entity)
            ->setTemplate($template)
            ->setData($data->getAdditionalTemplateData())
            ->render();
    }

}
