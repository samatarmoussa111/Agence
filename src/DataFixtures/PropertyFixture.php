<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use App\Entity\Property;
use DateTime;

class PropertyFixture extends Fixture
{

    
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');

        for ($i=0; $i<=100; $i++) {
            $property = new Property();

            $property
                ->setTitle($faker->words(3, true))
                ->setDescription($faker->sentences(3, true))
                ->setSurface($faker->numberBetween(20, 350))
                ->setRooms($faker->numberBetween(2, 10))
                ->setFloor($faker->numberBetween(0, 15))
                ->setPrice($faker->numberBetween(100000, 1000000))
                ->setCity($faker->city)
                ->setAddress($faker->address)
                ->setSold(false)
                ->setCreatedAt(new DateTime());
            
            $manager->persist($property);
        }
        
        $manager->flush();
    }
}
