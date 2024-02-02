<?php

namespace App\DataFixtures;

use App\Entity\Actor;
use App\DataFixtures\MovieFixtures;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ActorFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $i = 0;

        for ($count = 0; $count < 10; $count++) {
            $actor = new Actor();
            $actor->setActorPicture('img/1379642-leonardo-dicaprio-sur-le-tapis-rouge-du-beverly-hilton-hotel-de-los-angeles.jpg');
            $actor->setActorName('Acteur ' . $count);

            $manager->persist($actor);

            $this->addReference('actor_' . $i, $actor); // pour la récupérer dans MovieFixtures. Il faut concaténer avec un compteur sinon si les références ont toutes le même nom il y aura une erreur
            $i++;
        }

        $manager->flush();
    }


}
