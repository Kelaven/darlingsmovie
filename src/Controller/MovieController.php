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
        // return $this->render('/../templates/base.html.twig');
        return $this->render('movie/index.html.twig', [
            'controller_name' => 'Kévin',
        ]);
        // return $this->render('/../templates/footer.html.twig');
        // dd('coucou');
    }
}
