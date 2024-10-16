<?php

namespace Espo\Modules\Mattermost\EntryPoints;

use Espo\Core\Acl;
use Espo\Core\Api\{
    Request,
    Response,
};
use Espo\Core\Exceptions\ForbiddenSilent;
use Espo\Core\Utils\{
    Json,
    Language,
    Metadata,
};
use Espo\ORM\EntityManager;

class MattermostCreateTaskOptions implements \Espo\Core\EntryPoint\EntryPoint
{
    public function __construct(
        private readonly Acl $acl,
        private readonly EntityManager $entityManager,
        private readonly Language $language,
        private readonly Metadata $metadata,
    ) {
    }

    /**
     * @throws ForbiddenSilent|\JsonException
     */
    public function run(Request $request, Response $response): void
    {
        if (
            !$this->acl->checkScope('User', Acl\Table::ACTION_READ)
            || !$this->acl->checkScope('Project', Acl\Table::ACTION_READ)
            || !$this->acl->checkScope('Task', Acl\Table::ACTION_CREATE)
        ) {
            throw new ForbiddenSilent('Not enough permissions to get task create data.');
        }

        $defs = $this->entityManager->getDefs();
        $locale = $request->getQueryParam('locale');

        if ($locale) {
            $locale .= '_';
            $languageList = $this->metadata->get(['app', 'language', 'list'], []);
            $targetLocale = null;

            foreach ($languageList as $lang) {
                if (str_starts_with($lang, $locale)) {
                    $targetLocale = $lang;
                }
            }

            if ($targetLocale) {
                $this->language->setLanguage($targetLocale);
            }
        }

        $userList = $this->entityManager->getRDBRepository('User')
            ->select(['id', 'name', 'userName'])
            ->where([
                'isActive' => true,
                'type' => ['regular', 'admin'],
            ])
            ->order('name', 'ASC')
            ->find();

        if (!$defs->hasEntity('Project')) {
            $projectList = [];
        } else {
            $projectList = $this->entityManager->getRDBRepository('Project')
                ->select(['id', 'name'])
                ->where([
                    'status' => 'Active',
                ])
                ->order('name', 'ASC')
                ->find();
        }

        $taskPriorityList = $defs->getEntity('Task')->getField('priority')->getParam('options');
        $taskPriorityList = array_map(
            fn(string $value): array => [
                'value' => $value,
                'label' => $this->language->translateOption($value, 'priority', 'Task'),
            ],
            $taskPriorityList
        );

        $response
            ->setHeader('Content-Type', 'application/json')
            ->writeBody(
                Json::encode([
                    'userList' => $userList->getValueMapList(),
                    'projectList' => $projectList->getValueMapList(),
                    'taskPriorityList' => $taskPriorityList,
                ])
            );
    }
}
