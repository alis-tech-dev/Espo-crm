<?php


namespace Espo\Modules\Mattermost\Core\MattermostClient;

use Pnz\MattermostClient\Api\UsersApi;
use Pnz\MattermostClient\HttpClientConfigurator;

class ApiClient extends \Pnz\MattermostClient\ApiClient
{
    /**
     * @return Api\UsersApi
     */
    public function users(): UsersApi
    {
        return new Api\UsersApi($this->httpClient, $this->requestFactory, $this->hydrator);
    }

    public static function tokenConfiguration(string $url, string $token): self
    {
        $configurator = new HttpClientConfigurator();
        $client = $configurator->setEndpoint($url . '/api/v4')
            ->setToken($token)
            ->createConfiguredClient();

        return new self($client);
    }
}
