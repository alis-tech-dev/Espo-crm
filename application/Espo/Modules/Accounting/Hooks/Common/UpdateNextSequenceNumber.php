<?php

namespace Espo\Modules\Accounting\Hooks\Common;

use Espo\Core\Field\Date;
use Espo\Core\ORM\Repository\Option\SaveOption;
use Espo\Core\Utils\{
    DateTime};
use Espo\Modules\Accounting\Entities\NextSequenceNumber;
use Espo\ORM\{
    Defs\FieldDefs,
    Entity,
    EntityManager};

class UpdateNextSequenceNumber
{
    /**
     * @var array<string,string[]>
     */
    private array $fieldListMapCache = [];

    public function __construct(
        private readonly EntityManager $entityManager
    ) {
    }

    public function beforeSave(Entity $entity, array $options = []): void
    {
        $fieldList = $this->getFieldList($entity->getEntityType());

        foreach ($fieldList as $field) {
            $this->processItem($entity, $field, $options);
        }

    }

    /**
     * @param array<string,mixed> $options
     */
    private function processItem(Entity $entity, FieldDefs $defs, array $options): void
    {
        $field = $defs->getName();

        if (!empty($options[SaveOption::IMPORT])) {
            if ($entity->has($field)) {
                return;
            }
        }

        if (!$entity->isNew()) {
            if ($entity->isAttributeChanged($field)) {
                $entity->set($field, $entity->getFetched($field));
            }

            return;
        }

        $this->entityManager->getTransactionManager()->start();

        /** @var NextSequenceNumber $nextNumber */
        $nextNumber = $this->entityManager
            ->getRDBRepository(NextSequenceNumber::ENTITY_TYPE)
            ->where([
                'fieldName' => $field,
                'entityType' => $entity->getEntityType(),
            ])
            ->forUpdate()
            ->findOne();

        if (!$nextNumber) {
            /** @var NextSequenceNumber $nextNumber */
            $nextNumber = $this->entityManager->getNewEntity(NextSequenceNumber::ENTITY_TYPE);

            $nextNumber->set([
                'entityType' => $entity->getEntityType(),
                'fieldName' => $field,
                'date' => DateTime::getSystemTodayString(),
            ]);
        }

        $format = $defs->getParam('format');
        $padLength = $defs->getParam('padLength');
        $reset = $defs->getParam('reset');

        $value = $nextNumber->getNumberValue();
        $date = $nextNumber->getDate();

        $dateNow = Date::createToday();

        $resetMap = [];
        $resetMap[NextSequenceNumber::RESET_YEARLY] = $date->getYear() !== $dateNow->getYear();
        $resetMap[NextSequenceNumber::RESET_MONTHLY] = $resetMap[NextSequenceNumber::RESET_YEARLY] || $date->getMonth() !== $dateNow->getMonth();
        $resetMap[NextSequenceNumber::RESET_DAILY] = $resetMap[NextSequenceNumber::RESET_MONTHLY] || $date->getDay() !== $dateNow->getDay();
        $resetMap[NextSequenceNumber::RESET_NEVER] = false;

        if ($reset && $resetMap[$reset]) {
            $value = 1;
        }

        $replaces = [
            'YYYY' => date('Y'),
            'YY' => date('y'),
            'MM' => date('m'),
            'DD' => date('d'),
            'number' => str_pad($value, $padLength, '0', STR_PAD_LEFT),
        ];

        $composedNumber = $format;

        foreach ($replaces as $key => $value) {
            $composedNumber = str_replace("{{$key}}", $value, $composedNumber);
        }

        $entity->set($field, $composedNumber);

        $nextNumber->setNumberValue($value + 1);
        $nextNumber->setDate($dateNow);

        $this->entityManager->saveEntity($nextNumber);

        $this->entityManager->getTransactionManager()->commit();
    }

    /**
     * @return FieldDefs[]
     */
    private function getFieldList(string $entityType): array
    {
        if (array_key_exists($entityType, $this->fieldListMapCache)) {
            return $this->fieldListMapCache[$entityType];
        }

        $entityDefs = $this->entityManager
            ->getDefs()
            ->getEntity($entityType);

        $list = [];

        foreach ($entityDefs->getFieldList() as $field) {
            if ($field->getType() !== 'sequenceNumber') {
                continue;
            }

            $list[] = $field;
        }

        $this->fieldListMapCache[$entityType] = $list;

        return $list;
    }
}
