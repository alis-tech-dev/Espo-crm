<?php

namespace Espo\Modules\HumanResources\Hooks\HumanResource;

use Espo\ORM\Entity;
use Espo\Core\Field\Date;
use Espo\Modules\Crm\Entities\Meeting;
use Espo\Core\ORM\EntityManager;
use Espo\Core\Utils\Config;
use Espo\ORM\Repository\Option\RelateOptions;
use Espo\ORM\BaseEntity;
use Espo\Entities\Team;
use Espo\Core\Utils\Language;

class CreateMeetingForEducation implements \Espo\Core\Hook\Hook\AfterRelate
{

    public function __construct(
        private readonly EntityManager $entityManager,
        private readonly Config $config,
        private readonly Language $language
    ) {
    }


    public function afterRelate(
        Entity $entity,
        string $relationName,
        Entity $relatedEntity,
        array $columnData,
        RelateOptions $options
    ): void {
        /** @var BaseEntity $relatedEntity */
        if ($relationName !== 'educationAndTrainingRecords') {
            return;
        }
        /** @var Date $date */
        $date = $relatedEntity->getValueObject('dateOfTheNextInspection');

        /** @var BaseEntity $meeting */
        $meeting = $this->entityManager->getNewEntity(Meeting::ENTITY_TYPE);

        $meeting->set([
            'name' => $this->language->translate('employeeTraining', 'labels', 'VacationApproval') . ' - '. $entity->get('name'),
            'description' => "https://" . ($this->config->get('siteUrl') ?? "") . "/#HumanResource/view/{$entity->getId()}",
            'reminders' => '[{"seconds":86400,"type":"Popup"}, {"seconds":604800,"type":"Email"}]',
            'isAllDay' => true
        ]);

        $meeting->setValueObject('dateStartDate', $date);
        $meeting->setValueObject('dateEndDate', $date);

        $this->entityManager->saveEntity($meeting);

        if ($this->config->get('humanResourceApprovalTeamId')){
            $team = $this->entityManager->getEntityById(Team::ENTITY_TYPE, $this->config->get('humanResourceApprovalTeamId'));
            $meetingRDB = $this->entityManager->getRDBRepositoryByClass(Meeting::class);
            $meetingRDB->getRelation($meeting, 'teams')->relate($team);
        }
    }
}