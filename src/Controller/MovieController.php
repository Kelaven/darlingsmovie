<?php

namespace App\Controller;

use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Movie;



class MovieController extends AbstractController
{
    // ! home page
    #[Route('/movie', name: 'app_movie')]
    public function index(ManagerRegistry $mr): Response // ManagerRegistry $mr pour récupérer les données avec getRepository et findAll
    {
        $subtitle = 'Les supers films de La Manu';

        $movies = $mr->getRepository(Movie::class)->findAll();

        return $this->render('movie/index.html.twig', [
            'controller_name' => 'MovieController',
            'subtitle' => $subtitle,
            'movies' => $movies,

        ]);
    }

    // ! page détail
    #[Route('/movie/detailmovie.html.twig', name: 'detail_movie')]
    public function detail(ManagerRegistry $mr): Response // ManagerRegistry $mr pour récupérer les données avec getRepository et findAll
    {
        $page = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));

        $movie = $mr->getRepository(Movie::class)->find($page);

        return $this->render('movie/detailmovie.html.twig', [
            'controller_name' => 'MovieController',
            'movie' => $movie
        ]);
    }
}
