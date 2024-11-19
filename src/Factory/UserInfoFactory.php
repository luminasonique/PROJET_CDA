<?php

namespace App\Factory;

use App\Entity\UserInfo;
use Zenstruck\Foundry\Persistence\PersistentProxyObjectFactory;

/**
 * @extends PersistentProxyObjectFactory<UserInfo>
 */
final class UserInfoFactory extends PersistentProxyObjectFactory
{
    public static function class(): string
    {
        return UserInfo::class;
    }

    protected function defaults(): array|callable
    {
        return [
            'user_cv' => self::faker()->url, // Generate a random URL for user_cv
            'user_linkedin' => self::faker()->url, // Generate a random URL for LinkedIn
            'user_git' => self::faker()->url, // Generate a random URL for GitHub
        ];
    }

    protected function initialize(): static
    {
        return $this
            // ->afterInstantiate(function(UserInfo $userInfo): void {})
        ;
    }
}