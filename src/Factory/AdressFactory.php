<?php

namespace App\Factory;

use App\Entity\Adress;
use Zenstruck\Foundry\Persistence\PersistentProxyObjectFactory;

/**
 * @extends PersistentProxyObjectFactory<Adress>
 */
final class AdressFactory extends PersistentProxyObjectFactory
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
        return Adress::class;
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     *
     * @todo add your default values here
     */
    protected function defaults(): array|callable
    {
        return [
            'city' => self::faker()->city,
            'street' => self::faker()->streetAddress,
            'state' => self::faker()->state,
            'code' => self::faker()->postcode,
            'country' => self::faker()->country,
            'status' => self::faker()->randomElement(['archived', 'active']), // Assuming 'archived' and 'active' are possible statuses
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): static
    {
        return $this;
    }
}