<?php

namespace App\Factory;

use App\Entity\Module;
use Zenstruck\Foundry\Persistence\PersistentProxyObjectFactory;

/**
 * @extends PersistentProxyObjectFactory<Module>
 */
final class ModuleFactory extends PersistentProxyObjectFactory
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
        return Module::class;
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     *
     * @todo add your default values here
     */
    protected function defaults(): array|callable
    {
        return [
            'title' => self::faker()->text(255),
            'description' => self::faker()->paragraph(3),
            'content' => self::faker()->text(1000),
            'repository_link' => self::faker()->url(),
            'module_order' => self::faker()->numberBetween(1, 10), // Adjusted to generate an integer
            'duration' => self::faker()->numberBetween(30, 120),
            'status' => self::faker()->randomElement(['on', 'off', 'ongoing', 'reported']),
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