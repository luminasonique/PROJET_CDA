<?php

namespace App\Factory;

use App\Entity\Degree;
use Zenstruck\Foundry\Persistence\PersistentProxyObjectFactory;

/**
 * @extends PersistentProxyObjectFactory<Degree>
 */
final class DegreeFactory extends PersistentProxyObjectFactory
{
    public static function class(): string
    {
        return Degree::class;
    }

    protected function defaults(): array|callable
    {
        return [
            'name' => self::faker()->word, // Random name for the degree (e.g., Bachelor, Master, etc.)
            'level' => self::faker()->word, // Random level (e.g., Bachelor's, Master's)
            'speciality' => self::faker()->word, // Random speciality (e.g., Computer Science, Engineering)
            'obtained_at' => self::faker()->dateTimeBetween('-10 years', 'now'), // Random date within the last 10 years
        ];
    }

    protected function initialize(): static
    {
        return $this;
            // ->afterInstantiate(function(Degree $degree): void {})
        ;
    }
}