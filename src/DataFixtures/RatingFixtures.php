<?php 

namespace App\DataFixtures;

use App\Entity\Rating;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class RatingFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // Replace this with direct creation of Rating entities
        $rating = new Rating();
        $rating->setScore(5);  // Example score
        $rating->setComment("Excellent!");
        $rating->setStatus("approved");

        // Add the entity to the manager
        $manager->persist($rating);

        // You can create multiple ratings like this
        // $rating2 = new Rating();
        // $rating2->setScore(3);
        // $rating2->setComment("Good");
        // $manager->persist($rating2);

        $manager->flush();
    }
}