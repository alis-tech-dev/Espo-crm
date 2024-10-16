<?php


namespace Espo\Modules\Mattermost\Core\MattermostClient\Api;

use Espo\Modules\Mattermost\Core\MattermostClient\Model\Token;
use Pnz\MattermostClient\Exception\InvalidArgumentException;
use Pnz\MattermostClient\Model\Status;

class UsersApi extends \Pnz\MattermostClient\Api\UsersApi
{
    public function createToken(string $userId, string $description): Token
    {
        $response = $this->httpPost(sprintf('/users/%s/tokens', $userId), [
            'description' => $description,
        ]);

        return $this->handleResponse($response, Token::class);
    }


    public function updateUserPassword(string $userId, string $currentPassword, string $newPassword): mixed
    {
        if (empty($userId)) {
            throw new InvalidArgumentException('UserId can not be empty');
        }
        if (empty($newPassword)) {
            throw new InvalidArgumentException('The new password can not be empty');
        }

        $data = [
            'new_password' => $newPassword,
        ];

        if (!empty($currentPassword)) {
            $data['current_password'] = $currentPassword;
        }

        $response = $this->httpPut(sprintf('/users/%s/password', $userId), $data);
        return $this->handleResponse($response, Status::class);
    }
}
