<?php


namespace App\DataFixtures;

use App\Factory\EducationFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class EducationFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        EducationFactory::createMany(20); // Creates 20 random Education entities
        $manager->flush();
    }
}