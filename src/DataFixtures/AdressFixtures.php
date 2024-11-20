<?php

namespace App\DataFixtures;

use App\Factory\AdressFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AdressFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        AdressFactory::createMany(10); // Creates 10 random Adress entities
        $manager->flush();
    }
}