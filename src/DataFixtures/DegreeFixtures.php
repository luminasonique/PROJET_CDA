<?php

namespace App\DataFixtures;

use App\Factory\DegreeFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class DegreeFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // Generate 10 degrees with random data
        DegreeFactory::createMany(10);

        $manager->flush();
    }
}