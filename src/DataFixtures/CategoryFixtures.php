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

        $count = 0;

        foreach ($categories as $category) {
            $categoryName = new Category();
            $categoryName->setCategoryName($category);

            $manager->persist($categoryName);
            
            $this->addReference('category_' . $count, $categoryName); // pour la récupérer dans MovieFixtures. Il faut concaténer avec un compteur sinon si les références ont toutes le même nom il y aura une erreur
            $count++;
        }
        $manager->flush();
    }
}
