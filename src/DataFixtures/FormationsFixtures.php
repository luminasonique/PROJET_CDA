<?php

namespace App\DataFixtures;

use App\Factory\FormationsFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class FormationsFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        FormationsFactory::createMany(10); // Creates 10 random formations
        $manager->flush();
    }
}