<?php

namespace Espo\Modules\Mattermost\Hooks\Integration;

use Espo\Core\Utils\Config\ConfigWriter;
use Espo\ORM\Entity;

class Mattermost
{
    public function __construct(
        private readonly ConfigWriter $configWriter,
    ) {
    }

    public function afterSave(Entity $entity): void
    {
        if ($entity->getId() !== 'mattermost') {
            return;
        }

        if (!$entity->get('enabled')) {
            $this->configWriter->setMultiple([
                'mattermostTeamId' => null,
                'mattermostServerUrl' => null,
                'mattermostMasterToken' => null,
            ]);
            $this->configWriter->save();

            return;
        }

        $this->configWriter->setMultiple([
            'mattermostTeamId' => $entity->get('teamId'),
            'mattermostServerUrl' => $entity->get('serverUrl'),
            'mattermostMasterToken' => $entity->get('token'),
        ]);
        $this->configWriter->save();
    }
}
