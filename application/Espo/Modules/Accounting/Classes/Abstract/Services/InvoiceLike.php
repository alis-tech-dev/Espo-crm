<?php

namespace Espo\Modules\Accounting\Classes\Abstract\Services;

use Espo\Core\Di;
use Espo\Core\Exceptions\{
	Error,
	Forbidden,
	ForbiddenSilent,
	NotFound};
use Espo\Core\Exceptions\Error\Body;
use Espo\Core\Field\LinkParent;
use Espo\Core\Templates\Services\Base;
use Espo\Core\Utils\ClassFinder;
use Espo\Core\Utils\Util;
use Espo\Entities\{
	Attachment,
	Template,};
use Espo\Modules\Autocrm\Tools\RecordList\Loader as RecordListLoader;
use Espo\Modules\ProductBase\Entities\Product;
use Espo\ORM\Entity;
use Espo\Tools\Pdf\{
	Params,
	Service as PdfService};
use stdClass;

class InvoiceLike extends Base implements
	Di\InjectableFactoryAware,
	Di\FileStorageManagerAware,
	Di\FieldUtilAware,
	Di\ConfigAware
{
	use Di\InjectableFactorySetter;
	use Di\FileStorageManagerSetter;
	use Di\ConfigSetter;

	public const ITEM_LINK_NAME = 'items';

	public const ADVANCE_DEDUCTIONS_LINK_NAME = 'advanceDeductions';

	protected $mandatorySelectAttributeList = ['productId'];

	protected const CONVERSION_ATTRIBUTES_TO_IGNORE
		= [
			'createdAt',
			'createdBy',
			'modifiedAt',
			'modifiedBy',
			'number',
			'numberA',
		];

	private ?RecordListLoader $recordListLoader = null;

	private ?ClassFinder $classFinder = null;

	/**
	 * @throws ForbiddenSilent
	 * @throws NotFound
	 * @throws Error
	 * @throws Forbidden
	 */
	public function getAttributesForEmail(string $id, string $templateId): stdClass
	{
		$entity = $this->getEntity($id);
		$template = $this->entityManager->getEntityById(Template::ENTITY_TYPE, $templateId);

		if (!$entity || !$template) {
			throw new NotFound();
		}

		$attributes = [];

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

		$attributes['to'] = $account->get('emailAddress');
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

	public function recalculate(Entity $entity, bool $save = false): void
	{
		$this->recalculateRecordList($entity);
		$this->recalculateTotals($entity);

		if ($save) {
			$this->entityManager->saveEntity($entity, [
				'skipRecalculation' => true,
			]);
		}
	}

	public function recalculateRecordList(Entity $entity): void
	{
		if (!$entity->has('itemsRecordList') && !$entity->isNew()) {
			$this->loadItemsRecordList($entity);
		}

		$recordList = $entity->get('itemsRecordList') ?: [];
		$productIds = array_values(array_filter(array_column($recordList, 'productId')));
		$currency = $entity->get('amountCurrency');

		$productList = $this->entityManager
			->getRDBRepository(Product::ENTITY_TYPE)
			->select(['id', 'weight'])
			->where([
				'id' => $productIds,
			])
			->find();

		$productWeightMap = [];

		foreach ($productList as $product) {
			$productWeightMap[$product->getId()] = $product->get('weight');
		}

		$shippingItem = null;

        foreach ($recordList as &$item) {
            if (isset($item->type) && $item->type === 'shipping') {
                $shippingItem = &$item;
                break;
            }
        }

        $shippingCost = $entity->get('shippingCost') ?? 0;
        $shippingCostTaxRate = $entity->get('shippingCostTaxRate') ?? 0;

        if ($shippingCost) {

            if ($shippingItem) {

                $shippingItem->unitPrice = $shippingCost;
                $shippingItem->taxRate = $shippingCostTaxRate;

            } else {

                $shippingItem = (object)[
                    'type' => 'shipping',
                    'name' => 'Doprava',
                    'quantity' => 1,
                    'unitPrice' => $shippingCost,
                    'taxRate' => $shippingCostTaxRate,
                    'discount' => 0,
                    'withTax' => true
                ];

                $recordList[] = $shippingItem;

            }

        }

		foreach ($recordList as &$record) {
            
			$record->quantity ??= 0;
			$record->taxRate ??= 0;
			$record->unitPrice ??= 0;
			$record->discount ??= 0;
			$record->withTax ??= false;

			$record->amount = ($record->withTax ? ($record->unitPrice * $record->quantity) / (1 + $record->taxRate / 100) : $record->unitPrice * $record->quantity);
			$record->amount -= $record->amount * $record->discount / 100;
			$record->amount = $record->amount;
			$record->amountWithTax = $record->amount * (1 + $record->taxRate / 100);
			$record->taxAmount = $this->round($record->amountWithTax - $record->amount);

			$record->amount = $this->round($record->amount);

            $record->taxAmountCurrency = $currency;
			$record->unitPriceCurrency = $currency;
			$record->amountCurrency = $currency;
			$record->amountWithTaxCurrency = $currency;

			if ((!isset($record->unitWeight) || $record->unitWeight === '')) {
				$record->unitWeight = isset($record->productId) ? $productWeightMap[$record->productId] ?? 0 : 0;
			}

			$record->weight = $record->unitWeight * $record->quantity;

		}

		$entity->set('itemsRecordList', $recordList);

		$this->afterRecalculateRecordList($entity);

	}

	protected function afterRecalculateRecordList(Entity $entity): void
	{

	}

    protected function findShippingItem(array $recordList): ?stdClass
    {
        foreach ($recordList as $record) {
            if (isset($record->type) && $record->type === 'shipping') {
                return $record;
            }
        }
        return null;
    }

	public function recalculateTotals(Entity $entity): void
	{
		if (!$entity->has('itemsRecordList') && !$entity->isNew()) {
			$this->loadItemsRecordList($entity);
		}

		if ($entity->getEntityType() === "Invoice" && !$entity->has('advanceDeductionsRecordList') && !$entity->isNew()) {
			$this->loadAdvanceDeductionsRecordList($entity);
		}

		$recordList = $entity->get('itemsRecordList') ?: [];
		$advanceDeductions = $entity->get('advanceDeductionsRecordList') ?: [];

		$amountCurrency = $entity->get('amountCurrency');

		$amount = 0;
		$preDiscountedAmount = 0;
		$paidAdvances = 0;
		$taxAmount = 0;
		$weight = 0;

		foreach ($recordList as $record) {
			$amount += $record->amount;
			$taxAmount += $record->taxAmount ?? 0;
			$type = $record->type ?? null;
			$weight += $record->weight;

			if ($type === 'discount') {
				continue;
			}

			$preDiscountedAmount += $this->round(
				$record->withTax ? ($record->unitPrice * $record->quantity) / (1 + $record->taxRate / 100) : $record->unitPrice * $record->quantity
			);
		}

		foreach ($advanceDeductions as &$advanceDeductionItem) {
			$paidAdvances += $advanceDeductionItem->amountWithTax;
			$advanceDeductionItem->amountWithTaxCurrency = $amountCurrency;
			$advanceDeductionItem->amountCurrency = $amountCurrency;
			$advanceDeductionItem->taxAmountCurrency = $amountCurrency;
			$advanceDeductionItem->unitPriceCurrency = $amountCurrency;
		}

		$grandTotalAmount = $amount + $taxAmount - $paidAdvances;
		$discountAmount = $preDiscountedAmount - $amount;

		$entity->set([
			'amount' => $this->round($amount),
			'amountCurrency' => $amountCurrency,
			'preDiscountedAmount' => $preDiscountedAmount,
			'preDiscountedAmountCurrency' => $amountCurrency,
			'discountAmount' => $this->round($discountAmount),
			'discountAmountCurrency' => $amountCurrency,
			'taxAmount' => $this->round($taxAmount),
			'taxAmountCurrency' => $amountCurrency,
			'grandTotalAmount' => $this->round($grandTotalAmount),
			'grandTotalAmountCurrency' => $amountCurrency,
			'paidAdvances' => $this->round($paidAdvances),
			'paidAdvancesCurrency' => $amountCurrency,
			'invoicedAmount' => $this->round($amount + $taxAmount),
			'invoicedAmountCurrency' => $amountCurrency,
			'weight' => $weight,
			'advanceDeductionsRecordList' => $advanceDeductions,
		]);
	}

	public function loadItemsRecordList(Entity $entity): void
	{
		try {
			$this->getRecordListLoader()->load($entity, static::ITEM_LINK_NAME, true);
		} catch (\Exception $e) {
			$this->log->error($e->getMessage());
		}
	}

	public function loadAdvanceDeductionsRecordList(Entity $entity): void
	{
		try {
			$this->getRecordListLoader()->load($entity, static::ADVANCE_DEDUCTIONS_LINK_NAME, true);
		} catch (\Exception $e) {
			$this->log->error($e->getMessage());
		}
	}

	/**
	 * @throws Forbidden
	 * @throws NotFound
	 * @throws ForbiddenSilent
	 */
	public function getConvertAttributesFor(string $scope, string $id): stdClass
	{
		if (!$this->entityManager->getDefs()->hasEntity($scope)) {
			throw new NotFound();
		}

		$entity = $this->getEntity($id);

		if (!$entity) {
			throw new NotFound();
		}

		$entityDefs = $this->entityManager->getDefs()->getEntity($scope);
		$fields = $entityDefs->getFieldList();

		$ignoreSet = array_flip(static::CONVERSION_ATTRIBUTES_TO_IGNORE);
		$ignoreSet[static::ITEM_LINK_NAME] = true;

		$data = [];

		foreach ($fields as $field) {
			if (
				isset($ignoreSet[$field->getName()])
				|| $field->getParam('convertDisabled')
				|| $field->getParam('readOnly')
			) {
				{
					continue;
				}
			}

			$attributes = $this->fieldUtil->getAttributeList($scope, $field->getName());

			foreach ($attributes as $attribute) {
				if ($entity->has($attribute)) {
					$data[$attribute] = $entity->get($attribute);
				}
			}
		}

		$this->loadItemsRecordList($entity);

		$fieldName = static::ITEM_LINK_NAME . 'RecordList';

		/** @var class-string<InvoiceLike> $foreignClassName */
		$foreignClassName = $this->getClassFinder()->find('Services', $scope);
		$foreignFieldName = $foreignClassName::ITEM_LINK_NAME . 'RecordList';

		$data[$foreignFieldName] = $this->duplicateRecordList($entity->get($fieldName));

		$GLOBALS['log']->debug('convert attributes', $data);

		return (object)$data;
	}

	private function duplicateRecordList(array $recordList): array
	{
		foreach ($recordList as &$record) {
			unset($record->id);
		}
		return $recordList;
	}

	private function getRecordListLoader(): RecordListLoader
	{
		return $this->recordListLoader ??= $this->injectableFactory->create(RecordListLoader::class);
	}

	private function getClassFinder(): ClassFinder
	{
		return $this->classFinder ??= $this->injectableFactory->create(ClassFinder::class);
	}

	public function round(float $value): float
	{
		return round($value, $this->config->get('currencyDecimalPlaces'));
	}
}
