<?php
// !!!!!!! pourrait s'appeler plus logiquement MovieFixtures.php !!!!!!! //
namespace App\DataFixtures;

use App\Entity\Movie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\DataFixtures\CategoryFixtures;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class AppFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        // $movie = new Movie();
        // $movie->setPicture('titanic.jpg');
        // $movie->setName('Titanic');
        // $movie->setDuration('2h06');
        // $movie->setReleaseDate(new \DateTime('2010-01-01'));
        // $movie->setReview(9.7);
        // $movie->setSynopsis('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vestibulum, felis eget fermentum euismod, ligula justo fringilla purus, vel laoreet orci metus in risus. Ut in urna vel est dictum posuere a non ex. Sed eu odio ac orci cursus vehicula nec at libero. Integer quis arcu auctor, euismod libero ac, ultrices odio.');
        // $movie->setTrailer('https://www.youtube.com/watch?v=aLRl4mnvfWQ');

        for ($count = 0; $count < 10; $count++) {
            $movie = new Movie();
            $movie->setPicture('img/titanic.jpg');
            $movie->setName('Titre du film' . $count);
            $movie->setDuration('Durée du film' . $count);
            $movie->setReleaseDate(new \DateTime('2010-01-01'));
            $movie->setReview(8.0);
            $movie->setSynopsis('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vestibulum, felis eget fermentum euismod, ligula justo fringilla purus, vel laoreet orci metus in risus. Ut in urna vel est dictum posuere a non ex. Sed eu odio ac orci cursus vehicula nec at libero. Integer quis arcu auctor, euismod libero ac, ultrices odio.');
            $movie->setTrailer('https://www.youtube.com/' . $count);


// addReference, getReference


            $manager->persist($movie);
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            CategoryFixtures::class,
        ];
    }
}
