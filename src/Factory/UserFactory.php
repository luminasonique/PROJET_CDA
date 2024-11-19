<?php

namespace App\Factory;

use App\Entity\User;
use App\Enum\Status;
use Zenstruck\Foundry\Persistence\PersistentProxyObjectFactory;

/**
 * @extends PersistentProxyObjectFactory<User>
 */
final class UserFactory extends PersistentProxyObjectFactory
{
    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#factories-as-services
     *
     * @todo inject services if required
     */
    public function __construct()
    {
    }

    public static function class(): string
    {
        return User::class;
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     *
     * @todo add your default values here
     */
    protected function defaults(): array|callable
    {
        // Define the possible roles
        $roles = ['ROLE_STUDENT', 'ROLE_TEACHER', 'ROLE_ADMIN', 'ROLE_USER'];

        return [
            'email' => self::faker()->email(),
            'first_name' => self::faker()->firstName(),
            'last_name' => self::faker()->lastName(),
            'status' => self::faker()->randomElement(Status::cases()), // Randomly pick one of the Status enum values
            'roles' => [self::faker()->randomElement($roles)], // Randomly assign a role from the available roles
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): static
    {
        return $this
            // ->afterInstantiate(function(User $user): void {})
        ;
    }
}