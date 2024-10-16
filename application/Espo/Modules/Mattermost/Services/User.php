<?php

namespace Espo\Modules\Mattermost\Services;

use Espo\Core\Exceptions\{
    ErrorSilent,
    Forbidden,
};
use Espo\Modules\Mattermost\Services\Chat as ChatService;

class User extends \Espo\Services\User
{

    protected bool $mattermostEnabled = true;

    public function __construct(
        private readonly ChatService $service
    ) {
        if (!$this->service->init()) {
            $this->mattermostEnabled = false;
        }

        parent::__construct();
    }

    /**
     * @throws ErrorSilent
     * @throws Forbidden
     */
    public function forceMattermostSync(string $id): string
    {
        if (!$this->user->isAdmin()) {
            throw new Forbidden();
        }

        if (!$this->mattermostEnabled) {
            throw new ErrorSilent('Mattermost integration is not enabled');
        }

        $user = $this->getEntity($id);
        $remoteUser = $this->service->getUserByName($user->get('userName'));

        if (empty($remoteUser)) {
            throw new ErrorSilent('User not found in Mattermost');
        }

        $token = $this->service->createToken($remoteUser);
        $user->set('mattermostToken', $token);

        $this->entityManager->saveEntity($user);

        return $token;
    }
}
