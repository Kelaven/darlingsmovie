<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MovieController extends AbstractController
{
    #[Route('/movie', name: 'app_movie')]
    public function index(): Response
    {
        $subtitle = 'Les supers films de La Manu';
        return $this->render('movie/index.html.twig', [
            'controller_name' => 'MovieController',
            'subtitle' => $subtitle
        ]);
    }
}
