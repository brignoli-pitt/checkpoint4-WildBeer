<?php

namespace App\DataFixtures;

use App\Entity\Beer;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class BeerFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        for ($i = 0; $i < 112; $i++) {
            $beer = new Beer();
            $beer->setName($faker->word);
            $beer->setAlcoholContent($faker->randomFloat(1, 3, 12));
            $beer->setDescription($faker->paragraphs(2, true));
            $beer->setCategory($this->getReference('category_' . $faker->numberBetween(0, 7)));
            $beer->setCreatedBy($this->getReference('user_' . $faker->numberBetween(0, 13)));
            $manager->persist($beer);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            CategoryFixtures::class,
            UserFixtures::class,
        ];
    }
}
