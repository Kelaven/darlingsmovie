<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;


class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $categories = ['Action', 'Horreur', 'Science fiction', 'Documentaire', 'Romantique', 'Comique'];

        foreach ($categories as $category) {
            $categoryName = new Category();
            $categoryName->setCategoryName($category);

            $manager->persist($categoryName);
        }
        $manager->flush();
    }


}
