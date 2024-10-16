<?php

namespace Espo\Modules\PriceLists\Services;

use Espo\Core\Exceptions\{
    Error,
    NotFound
};
use Espo\Core\Field\LinkParent;
use Espo\Core\Exceptions\Error\Body;
use Espo\Core\Utils\Util;
use Espo\Entities\{
    Attachment,
    Template,
};
use Espo\Tools\Pdf\{
    Params,
    Service as PdfService
};
use Espo\Core\Di;
use stdClass;

class PriceList extends \Espo\Core\Templates\Services\Base implements Di\FileStorageManagerAware
{
    use Di\FileStorageManagerSetter;

    public function getAttributesForEmail(string $id, string $templateId): stdClass
    {
        $entity = $this->getEntity($id);
        $template = $this->entityManager->getEntityById(Template::ENTITY_TYPE, $templateId);

        if (!$entity || !$template) {
            throw new NotFound();
        }

        $attributes = [];
        /* 
        $account = $this->entityManager
            ->getRDBRepository($entity->getEntityType())
            ->getRelation($entity, 'account')
            ->findOne();

        if (!$account) {
            throw Error::createWithBody(
                "Account not found",
                Body::create()
                    ->withMessageTranslation('accountNotFound', "Account")
                    ->encode()
            );
        }

        $attributes['to'] = $account->get('emailAddress'); */
        $attributes['name'] = $entity->get('name');

        $params = Params::create()->withAcl();

        $contents = $this->injectableFactory->create(PdfService::class)
            ->generate(
                $entity->getEntityType(),
                $entity->getId(),
                $template->getId(),
                $params,
            );

        $fileName = Util::sanitizeFileName($entity->get('name')) . '.pdf';
        /** @var Attachment $attachment */
        $attachment = $this->entityManager->getNewEntity(Attachment::ENTITY_TYPE);
        $attachment
            ->setName($fileName)
            ->setType('application/pdf')
            ->setSize($contents->getStream()->getSize())
            ->setRelated(LinkParent::create($entity->getEntityType(), $entity->getId()))
            ->setRole(Attachment::ROLE_ATTACHMENT);

        $this->entityManager->saveEntity($attachment);

        $this->fileStorageManager->putStream($attachment, $contents->getStream());

        $attributes['attachmentsIds'] = [$attachment->getId()];
        $attributes['attachmentsNames'] = [
            $attachment->getId() => $attachment->get('name'),
        ];

        return (object)$attributes;
    }
}
