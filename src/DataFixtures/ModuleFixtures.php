<?php

namespace App\DataFixtures;

use App\Factory\ModuleFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ModuleFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // Generate 10 modules for the database
        ModuleFactory::createMany(10);

        // Persist all the generated modules
        $manager->flush();
    }
}