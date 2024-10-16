<?php

namespace Espo\Modules\Autocrm\Tools\RecordList;

use Espo\Core\Exceptions\{
    BadRequest,
    Error,
    Forbidden,
    NotFound};
use Espo\Core\Select\SearchParams;
use Espo\Core\Utils\{
    FieldUtil,
    Json,};
use Espo\ORM\{
    Defs,
    Entity,
    Type\AttributeType};
use Espo\Tools\LayoutManager\LayoutManager;
use JsonException;

class Loader
{
    public function __construct(
        private readonly Service $service,
        private readonly Defs $defs,
        private readonly LayoutManager $layoutManager,
        private readonly FieldUtil $fieldUtil,
    ) {
    }

    /**
     * @throws BadRequest
     * @throws Forbidden
     * @throws Error
     * @throws NotFound
     */
    public function load(Entity $entity, string $field, bool $forceSelectAllAttributes = false): void
    {
        $entityType = $entity->getEntityType();

        $entityDefs = $this->defs->getEntity($entityType);
        $foreignEntityType = $entityDefs->getRelation($field)->getForeignEntityType();
        $foreignEntityDefs = $this->defs->getEntity($foreignEntityType);
        $fieldDefs = $entityDefs->getField($field);

        $orderByField = $fieldDefs->getParam('recordListOrderByField');
        $layout = $fieldDefs->getParam('recordListLayout');
        $forceSelectAllAttributes = $fieldDefs->getParam('recordListForceSelectAllAttributes') || $forceSelectAllAttributes;
        $mandatorySelectAttributeList = $fieldDefs->getParam('recordListMandatorySelectAttributeList');

        $searchParams = SearchParams::create();

        if ($layout && !$forceSelectAllAttributes) {
            $attributeList = $this->fetchAttributeListFromLayout($foreignEntityType, $layout);

            if ($mandatorySelectAttributeList) {
                if ($attributeList === null) {
                    throw Error::createWithBody(
                        "Entity {$foreignEntityType} is missing layout {$layout} or layout does not contain valid JSON",
                        Error\Body::create()
                            ->withMessageTranslation('layoutMissingOrInvalid', "FieldManager", [
                                'layout' => $layout,
                                'entityType' => $foreignEntityType,
                            ])
                            ->encode()
                    );
                }

                $attributeList = array_merge($attributeList, $mandatorySelectAttributeList);
            }

            if ($orderByField) {
                if (!$foreignEntityDefs->hasAttribute($orderByField)) {
                    throw Error::createWithBody(
                        "Entity {$foreignEntityType} is missing '{$orderByField}' order attribute",
                        Error\Body::create()
                            ->withMessageTranslation('orderAttributeMissing', "FieldManager", [
                                'attribute' => $orderByField,
                                'entityType' => $foreignEntityType,
                            ])
                            ->encode()
                    );
                }

                if ($foreignEntityDefs->getAttribute($orderByField)->getType() !== AttributeType::INT) {
                    throw Error::createWithBody(
                        "Entity {$foreignEntityType} order attribute '{$orderByField}' must be of type 'int'",
                        Error\Body::create()
                            ->withMessageTranslation('orderAttributeWrongType', "FieldManager", [
                                'attribute' => $orderByField,
                                'entityType' => $foreignEntityType,
                            ])
                            ->encode()
                    );
                }

                $attributeList[] = $orderByField;

                $searchParams = $searchParams
                    ->withOrderBy($orderByField)
                    ->withOrder(SearchParams::ORDER_ASC);
            }

            if ($attributeList) {
                $searchParams = $searchParams->withSelect($attributeList);
            }
        }

        $recordCollection = $this->service->obtain(
            $entityType,
            $entity->getId(),
            $field,
            $searchParams,
        );

		$attributeName = $field . 'RecordList';

		if (!$entity->isNew() && !$entity->hasFetched($attributeName)) {
			$entity->setFetched($attributeName, $recordCollection->getValueMapList());
		}

        $entity->set($attributeName, $recordCollection->getValueMapList());
    }

    /**
     * @return string[]|null
     */
    private function fetchAttributeListFromLayout(string $entityType, string $layoutName): ?array
    {
        $layout = $this->layoutManager->get($entityType, $layoutName);

        if (!$layout) {
            return null;
        }

        try {
            $layout = Json::decode($layout, true);
        } catch (JsonException $e) {
            return null;
        }

        $fields = array_map(fn(array $item) => $item['name'], $layout);
        $attributes = [];

        foreach ($fields as $field) {
            foreach ($this->fieldUtil->getAttributeList($entityType, $field) as $attribute) {
                $attributes[] = $attribute;
            }
        }

        return $attributes;
    }
}
