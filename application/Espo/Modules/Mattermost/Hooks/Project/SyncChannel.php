<?php

namespace Espo\Modules\Mattermost\Hooks\Project;

use Espo\Modules\Mattermost\Services\Chat as ChatService;
use Espo\ORM\Entity;
use Espo\ORM\EntityManager;
use Espo\Services\Stream as StreamService;
use Exception;

class SyncChannel
{
    protected bool $enabled = true;

    public function __construct(
        private readonly ChatService $service,
        private readonly EntityManager $entityManager,
        private readonly StreamService $streamService
    ) {
        if (!$this->service->init()) {
            $this->enabled = false;
        }
    }

    public function afterSave(Entity $entity, array $options = []): void
    {
        if (
            !empty($options['skipMattermost'])
            || !$this->enabled
            || !$entity->isNew()
        ) {
            return;
        }

        $entityManager = $this->entityManager;
        $followersNames = array_map(function ($id) use ($entityManager) {
            return $entityManager->getEntity('User', $id)->get('userName');
        }, $this->streamService->getEntityFollowers($entity)['idList']);

        try {
            $this->service->createProjectChannel($entity->getId(), $entity->get('name'), $followersNames);
        } catch (Exception $e) {
            $GLOBALS['log']->error('Mattermost: Error creating channel: ' . $e->getMessage());
        }
    }

    public function afterRemove(Entity $entity): void
    {
        if (
            !empty($options['skipMattermost'])
            || !$this->enabled
        ) {
            return;
        }

        try {
            $this->service->archiveChannel($entity->getId()); // channel might not exist, throwing an error
        } catch (Exception $e) {
            $GLOBALS['log']->debug('Mattermost: Error archiving channel: ' . $e->getMessage());
        }
    }
}
