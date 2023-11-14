<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ColonneController extends AbstractController
{
    #[Route('/colonne', name: 'app_colonne')]
    public function index(): Response
    {
        return $this->render('colonne/index.html.twig', [
            'controller_name' => 'ColonneController',
        ]);
    }
}
