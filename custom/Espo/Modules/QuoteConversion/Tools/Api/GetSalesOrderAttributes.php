<?php

namespace Espo\Modules\QuoteConversion\Tools\Api;

use Espo\Core\Api\{Action, Request, Response, ResponseComposer};
use Espo\Core\Exceptions\BadRequest;
use Espo\Core\Record\ServiceContainer as RecordServiceContainer;
use Espo\Core\Utils\FieldUtil;
use Espo\Entities\Attachment;
use Espo\Modules\Accounting\Entities\{Quote, SalesOrder};
use Espo\ORM\EntityManager;
use Espo\Repositories\Attachment as AttachmentRepository;

class GetSalesOrderAttributes implements Action
{
	public function __construct(
		private readonly RecordServiceContainer $recordServiceContainer,
		private readonly EntityManager          $entityManager,
		private readonly FieldUtil              $fieldUtil,
	)
	{
	}

	public function process(Request $request): Response
	{
		$id = $request->getRouteParam('id');

		if (!$id) {
			throw new BadRequest();
		}

		$quote = $this->recordServiceContainer
			->get(Quote::ENTITY_TYPE)
			->getEntity($id);

		$ignoreFieldList = [
			'createdAt',
			'modifiedAt',
			'items',
		];

		$defs = $this->entityManager->getDefs();
		/** @var AttachmentRepository $attachmentRepository */
		$attachmentRepository = $this->entityManager->getRepositoryByClass(Attachment::class);

		$quoteDefs = $defs->getEntity(Quote::ENTITY_TYPE);
		$salesOrderDefs = $defs->getEntity(SalesOrder::ENTITY_TYPE);

		$attributes = [];

		foreach ($quoteDefs->getFieldList() as $field) {
			$name = $field->getName();

			if (!$salesOrderDefs->hasField($name)) {
				continue;
			}

			if (in_array($name, $ignoreFieldList)) {
				continue;
			}

			$salesOrderField = $salesOrderDefs->getField($name);
			$type = $field->getType();

			if ($type !== $salesOrderField->getType()) {
				continue;
			}

			switch ($type) {
				case 'file':
				case 'image':
					$attachment = $quote->get($name);

					if (!$attachment) {
						break;
					}

					$copiedAttachment = $attachmentRepository->getCopiedAttachment($attachment);
					$attributes[$name . 'Id'] = $copiedAttachment->getId();
					$attributes[$name . 'Name'] = $copiedAttachment->getName();
					break;
				case 'attachmentMultiple':
					$attachments = $quote->get($name);

					if (!$attachments) {
						break;
					}

					$idList = [];
					$nameHash = (object)[];
					$typeHash = (object)[];

					foreach ($attachments as $attachment) {
						$copiedAttachment = $attachmentRepository->getCopiedAttachment($attachment);

						$idList[] = $copiedAttachment->getId();
						$nameHash->{$copiedAttachment->getId()} = $copiedAttachment->getName();
						$typeHash->{$copiedAttachment->getId()} = $copiedAttachment->getType();
					}

					$attributes[$name . 'Ids'] = $idList;
					$attributes[$name . 'Names'] = $nameHash;
					$attributes[$name . 'Types'] = $typeHash;
					break;
				default:
					$attributeList = $this->fieldUtil->getAttributeList(Quote::ENTITY_TYPE, $name);

					foreach ($attributeList as $attribute) {
						$attributes[$attribute] = $quote->get($attribute);
					}
					break;
			}
		}

		return ResponseComposer::json([
			'attributes' => $attributes,
		]);
	}
}
