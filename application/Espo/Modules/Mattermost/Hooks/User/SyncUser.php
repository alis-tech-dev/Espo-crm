<?php


namespace Espo\Modules\Mattermost\Hooks\User;

use Espo\Core\Exceptions\{
    Error,
    Error\Body as ErrorBody,
    ErrorSilent
};
use Espo\Modules\Mattermost\Services\Chat as ChatService;
use Espo\ORM\Entity;

class SyncUser
{
    protected bool $enabled = true;

    public function __construct(
        private readonly ChatService $service
    ) {
        if (!$this->service->init()) {
            $this->enabled = false;
        }
    }

    /**
     * @throws ErrorSilent
     * @throws Error
     */
    public function beforeSave(Entity $entity, array $options = []): void
    {
        if (
            !empty($options['skipMattermost'])
            || !$this->enabled
        ) {
            return;
        }

        if (
            $entity->get('type') !== 'regular'
            && $entity->get('type') !== 'admin'
        ) {
            $entity->set('mattermostSyncEnabled', false);
            return;
        }

        if (!$entity->get('mattermostSyncEnabled')) {
            return;
        }

        $userName = !$entity->isNew() ? $entity->getFetched('userName') : $entity->get('userName');
        $create = empty($this->service->getUserByName($userName));

        if (empty($entity->get('emailAddress'))) {
            if ($create) {
                throw ErrorSilent::createWithBody(
                    'mattermostRequiresEmail',
                    ErrorBody::create()
                        ->withMessageTranslation('mattermostRequiresEmail')
                        ->encode(),
                );
            }

            return;
        }

        if ($create) {
            $username = $entity->get('userName');
            $password = $entity->get('passwordConfirm');
            $firstName = $entity->get('firstName');

            if (empty($firstName)) {
                throw ErrorSilent::createWithBody(
                    'mattermostRequiresFirstName',
                    ErrorBody::create()
                        ->withMessageTranslation('mattermostRequiresFirstName')
                        ->encode(),
                );
            }

            if (empty($password)) {
                throw ErrorSilent::createWithBody(
                    'mattermostRequiresPassword',
                    ErrorBody::create()
                        ->withMessageTranslation('mattermostRequiresPassword')
                        ->encode(),
                );
            }

            $data = $this->service->createUser(
                $username,
                $entity->get('emailAddress'),
                $firstName,
                $entity->get('lastName'),
                $password
            );

            $entity->set('mattermostToken', $data->token);
        } else {
            $username = $entity->getFetched('userName'); // previous

            $this->service->updateUser(
                $username,
                $entity->get('userName'),
                $entity->get('emailAddress'),
                $entity->get('firstName'),
                $entity->get('lastName'),
                $entity->get('passwordConfirm'),
            );
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

        if (!$entity->get('mattermostSyncEnabled')) {
            return;
        }

        $this->service->deleteUser($entity->get('userName'));
    }
}
