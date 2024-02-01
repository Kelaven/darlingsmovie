<?php

namespace App\Controller;

use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Movie;
// use App\Entity\Category;


class MovieController extends AbstractController
{
    #[Route('/movie', name: 'app_movie')]
    public function index(ManagerRegistry $mr): Response // ManagerRegistry $mr pour récupérer les données avec getRepository et findAll
    {
        $subtitle = 'Les supers films de La Manu';

        $movies = $mr->getRepository(Movie::class)->findAll();
        // $categories = $mr->getRepository(Category::class)->findAll();

        return $this->render('movie/index.html.twig', [
            'controller_name' => 'MovieController',
            'subtitle' => $subtitle,
            'movies' => $movies,
            // 'categories' => $categories
        ]);
    }



}
