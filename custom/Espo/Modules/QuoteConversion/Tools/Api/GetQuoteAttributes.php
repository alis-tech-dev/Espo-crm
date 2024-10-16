<?php

namespace Espo\Modules\QuoteConversion\Tools\Api;

use Espo\Core\Api\{Action, Request, Response, ResponseComposer};
use Espo\Core\Exceptions\BadRequest;
use Espo\Core\Record\ServiceContainer as RecordServiceContainer;
use Espo\Core\Utils\FieldUtil;
use Espo\Entities\Attachment;
use Espo\Modules\Accounting\Entities\{Quote, Opportunity};
use Espo\ORM\EntityManager;
use Espo\Repositories\Attachment as AttachmentRepository;

class GetQuoteAttributes implements Action
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

        $opportunityDefs = $defs->getEntity(Opportunity::ENTITY_TYPE);
		$salesOrderDefs = $defs->getEntity(Quote::ENTITY_TYPE);

		$attributes = [];

		foreach ($opportunityDefs->getFieldList() as $field) {
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
