<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    const CATEGORIES = [
        'Blonde',
        'Brune',
        'Ambré',
        'Blanche',
        'Aromatisé',
        'IPA',
        'Triple',
        'Stout',
    ];
    public function load(ObjectManager $manager): void
    {
        foreach (self::CATEGORIES as $key => $categoryName) {
            $category = new Category();
            $category->setName($categoryName);
            $this->addReference('category_' . $key, $category);
            $manager->persist($category);
        }

        $manager->flush();
    }
}
