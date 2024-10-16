<?php

namespace Espo\Modules\Mattermost\Services;

use Espo\Core\Utils\{
    Config,
    Language
};
use Espo\Modules\Mattermost\Core\MattermostClient\ApiClient;
use Throwable;

class Chat
{
    private ?string $teamId;
    private ?string $server;
    private ?string $token;

    private ApiClient $client;

    public function __construct(
        private readonly Config $config,
        private readonly Language $language,
    ) {
        $this->teamId = $this->config->get('mattermostTeamId');
        $this->server = $this->config->get('mattermostServerUrl');
        $this->token = $this->config->get('mattermostMasterToken');
    }

    public function init(): bool
    {
        if (empty($this->server)) {
            return false;
        }

        $this->client = ApiClient::tokenConfiguration($this->server, $this->token);

        return true;
    }

    public function getUserByName($user): ?string
    {
        try {
            return $this->client->users()->getUserByUsername($user)->getId();
        } catch (Throwable) {
            return null;
        }
    }

    /**
     * Creates team user and returns its token
     *
     * @param string $userName
     * @param string $email
     * @param string $firstName
     * @param string $lastName
     * @param string $password
     *
     * @return object
     */
    public function createUser(string $userName, string $email, string $firstName, string $lastName, string $password): object
    {
        $userId = $this->client->users()->createUser([
            'email' => $email,
            'username' => $userName,
            'first_name' => $firstName,
            'last_name' => $lastName,
            'password' => $password,
        ])->getId();
        $token = $this->createToken($userId);

        $this->client->teams()->addTeamMember($this->teamId, $userId);

        return (object)[
            'userId' => $userId,
            'token' => $token,
        ];
    }

    public function createToken(string $userId): string
    {
        return $this->client->users()->createToken(
            $userId,
            $this->language->translate('tokenDescription', 'mattermost', 'Integration')
        )->getToken();
    }

    public function updateUser(
        string $oldUserName,
        string $newUserName,
        string $email,
        ?string $firstName,
        ?string $lastName,
        $newPass = null
    ): void {
        $userId = $this->getUserByName($oldUserName);

        if (!$userId) {
            return;
        }

        $updateData = [
            'id' => $userId,
            'username' => $newUserName,
            'email' => $email,
            'create_at' => time(),
        ];

        if (!empty($firstName)) {
            $updateData['first_name'] = $firstName;
        }
        if (!empty($lastName)) {
            $updateData['last_name'] = $lastName;
        }

        $this->client->users()->updateUser($userId, $updateData);

        if (!empty($newPass)) {
            $this->client->users()->updateUserPassword($userId, "", $newPass);
        }
    }

    public function deleteUser(string $userName): void
    {
        $userId = $this->getUserByName($userName);

        $this->client->teams()->removeTeamMember($this->teamId, $userId);
        $this->client->users()->deactivateUser($userId);
    }

    public function createProjectChannel(string $projectId, string $projectName, $memberNames = []): void
    {
        $siteUrl = rtrim($this->config->get('siteUrl'), '/');
        $channelId = $this->client->channels()->createChannel([
            'team_id' => $this->teamId,
            'name' => $projectId,
            'display_name' => $projectName,
            'header' => sprintf(
                '%s %s - %s',
                $this->language->translate('projectChannelHeader', 'mattermost', 'Integration'),
                $projectName,
                $siteUrl . '/#Project/view/' . $projectId,
            ),
            'type' => 'O',
        ])->getId();

        foreach ($memberNames as $memberName) {
            $userId = $this->getUserByName($memberName);
            $this->client->channels()->addChannelMember($channelId, $userId);
        }
    }

    public function archiveChannel(string $channelName): void
    {
        $channelId = $this->client->channels()->getChannelByName($this->teamId, $channelName)->getId();
        $this->client->channels()->deleteChannel($channelId);
    }
}
