<?php

namespace App\DataFixtures;

use App\Entity\Car;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class CarFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        for ($i=0 ; $i<30; $i++)
        {
            $car = new Car();
            $car->setName($faker->company);
            $car->setNbSeats($faker->numberBetween(min: 1, max: 5));
            $car->setNbDoors($faker->numberBetween(min: 1, max: 5));
            $car->setCost($faker->randomFloat(2, 100, 500));
            $car->setCategory($this->getReference('category_' . $faker->numberBetween(0,4)));
            $manager->persist($car);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            CarCategoryFixtures::class
        ];
        // TODO: Implement getDependencies() method.
    }
}
