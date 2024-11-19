<?php

namespace App\DataFixtures;

use App\Factory\UserInfoFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UserInfoFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // Use the factory to generate user info data
        UserInfoFactory::createMany(10); // Adjust the number as needed

        $manager->flush();
    }
}