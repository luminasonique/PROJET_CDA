<?php // src/DataFixtures/UserFixtures.php

namespace App\DataFixtures;

use App\Factory\UserFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // Create a few users using the factory
        UserFactory::new()->createMany(10);  // Create 10 users
        
        $manager->flush();
    }
}