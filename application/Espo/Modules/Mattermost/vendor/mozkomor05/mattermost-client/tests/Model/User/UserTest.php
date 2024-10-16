<?php

declare(strict_types=1);

namespace Pnz\MattermostClient\Tests\Model\User;

use PHPUnit\Framework\TestCase;
use Pnz\MattermostClient\Model\User\User;

/**
 * @coversDefaultClass \Pnz\MattermostClient\Model\User\User
 */
class UserTest extends TestCase
{
    public function testUserCreationEmpty(): void
    {
        $data = [];
        $user = User::createFromArray($data);

        $this->assertNull($user->getId());
        $this->assertNull($user->getEmail());
        $this->assertNull($user->getUsername());
        $this->assertNull($user->getLastName());
        $this->assertNull($user->getFirstName());
        $this->assertNull($user->getLocale());
        $this->assertNull($user->getRoles());
        $this->assertNull($user->getAllowMarketing());
        $this->assertNull($user->getAuthData());
        $this->assertNull($user->getCreateAt());
        $this->assertNull($user->getEmailVerified());
        $this->assertNull($user->getNickname());
        $this->assertNull($user->getUpdateAt());
        $this->assertNull($user->getDeleteAt());
    }

    public function testUserCreation(): void
    {
        $data = [
            'id' => 'Data for: id',
            'username' => 'Data for: Username',
            'email' => 'Data for: email',
            'last_name' => 'Data for: last_name',
            'first_name' => 'Data for: first_name',
            'locale' => 'Data for: locale',
            'roles' => 'Data for: roles',
            'allow_marketing' => true,
            'auth_data' => 'Data for: auth_data',
            'email_verified' => false,
            'nickname' => 'Data for: nickname',
            'create_at' => 1234567890,
            'update_at' => 1234567891,
            'delete_at' => 1234567892,
        ];

        $user = User::createFromArray($data);

        $this->assertSame($data['id'], $user->getId());
        $this->assertSame($data['email'], $user->getEmail());
        $this->assertSame($data['username'], $user->getUsername());

        $this->assertSame($data['last_name'], $user->getLastName());
        $this->assertSame($data['first_name'], $user->getFirstName());
        $this->assertSame($data['locale'], $user->getLocale());
        $this->assertSame($data['roles'], $user->getRoles());
        $this->assertTrue($user->getAllowMarketing());
        $this->assertSame($data['auth_data'], $user->getAuthData());
        $this->assertFalse($user->getEmailVerified());
        $this->assertSame($data['nickname'], $user->getNickname());
        $this->assertSame($data['create_at'], $user->getCreateAt());
        $this->assertSame($data['update_at'], $user->getUpdateAt());
        $this->assertSame($data['delete_at'], $user->getDeleteAt());
    }
}
