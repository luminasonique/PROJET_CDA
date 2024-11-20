<?php

namespace App\DataFixtures;

use App\Factory\TitleFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TitleFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // Create a few Title instances
        $titles = TitleFactory::new()->createMany(5); // Create 5 titles

        // Persist the data first
        foreach ($titles as $title) {
            $manager->persist($title);
        }

        // Add relationships between some titles
        $titles[0]->addTitle($titles[1]);
        $titles[1]->addTitle($titles[2]);
        $titles[3]->addTitle($titles[4]);

        // Finally, flush to save all the data
        $manager->flush();
    }
}