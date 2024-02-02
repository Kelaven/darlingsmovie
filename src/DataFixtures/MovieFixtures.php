<?php
// !!!!!!! pourrait s'appeler plus logiquement MovieFixtures.php !!!!!!! //
namespace App\DataFixtures;

use App\Entity\Movie;
use App\DataFixtures\ActorFixtures;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\DataFixtures\CategoryFixtures;
use Doctrine\Common\DataFixtures\DependentFixtureInterface; // pour appeler la méthode implements DependentFixtureInterface
use Doctrine\ORM\Mapping\Id;

class MovieFixtures extends Fixture implements DependentFixtureInterface
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

        for ($count = 0; $count < 10; $count++) { // cette boucle est créée pour créer 10 films
            $movie = new Movie(); // À chaque itération de la boucle, un nouvel objet Movie est créé pour représenter un film.
            $movie->setPicture('img/titanic.jpg'); // Les propriétés du film (image, nom, durée, date de sortie, etc.) sont définies avec des valeurs aléatoires ou prédéfinies.
            $movie->setName('Titre du film' . $count);
            $movie->setDuration('Durée du film' . $count);
            $movie->setReleaseDate(new \DateTime('2010-01-01'));
            $movie->setReview(8.0);
            $movie->setSynopsis('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vestibulum, felis eget fermentum euismod, ligula justo fringilla purus, vel laoreet orci metus in risus. Ut in urna vel est dictum posuere a non ex. Sed eu odio ac orci cursus vehicula nec at libero. Integer quis arcu auctor, euismod libero ac, ultrices odio.');
            $movie->setTrailer('https://www.youtube.com/' . $count);

            $category = $this->getReference('category_' . rand(0, 5)); // récupérer l'id category en insérant un objet issu de la classe Category. Une catégorie est récupérée de manière aléatoire parmi les catégories déjà créées.
            $movie->setCategory($category); // La catégorie récupérée est associée au film.




            $actorsNumber = rand(1,10); // je veux qu'il y ai entre 1 et 10 acteurs par films
            $actors = []; // la variable prendra le nombre défini au dessus dans son tableau
            for ($i=0; $i < $actorsNumber ; $i++) { // pour répéter l'opération d'association des acteurs au film selon le nombre généré.
                $actors[] = $this->getReference('actor_' . rand(0,9)); // un acteur est récupéré de manière aléatoire parmi les acteurs déjà créés.
            }
            foreach ($actors as $actor) {
                $movie->addActor($actor); // L'acteur récupéré est ajouté à la liste des acteurs associés au film.
            }
            // Donc par exemple, on a 7 acteurs. On va boucler pour arriver jusqu'au 7eme acteur.  A chaque acteur, on va associé un nom au hasard. Puis on lie tous ces acteurs au film. 


            $manager->persist($movie);

        }
        $manager->flush();
    }

    public function getDependencies() 
    {
        return [
            CategoryFixtures::class, // dépend de CategoryFixtures car un film doit etre rattaché à une catégorie 
            ActorFixtures::class // pour qu'un film ai un acteur, il faut que les acteurs soient créés
        ];
    }


}
