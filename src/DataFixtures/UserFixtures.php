<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class UserFixtures extends Fixture
{
    const USERS = [
        'POG',
        'Paulette',
        'JoLeTaxi',
        'Toolow',
        'Andy',
        'Jordan',
        'Kiks',
        'Julio',
        'Biche',
        'Jlbokass',
        'Antho',
        'Naomie',
        'JantesAllu',
        'Aldéric',

    ];

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        foreach (self::USERS as $key => $firstname) {
            $user = new User();
            $user->setFirstname($firstname);
            $user->setLastname('Fifou');
            $user->setEmail($faker->email);
            $user->setLocation($faker->city);
            $user->setDescription($faker->paragraphs(1, true));
            $user->setPassword(password_hash('azerty', PASSWORD_DEFAULT));
            $this->addReference('user_' . $key, $user);
            $manager->persist($user);
        }

        $manager->flush();
    }
}
