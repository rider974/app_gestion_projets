<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Repository\ProjetRepository;
use Doctrine\Persistence\ManagerRegistry;

class ProjetController extends AbstractController
{
    private $doctrine;

    public function __construct(ManagerRegistry $doctrine) {
        $this->doctrine = $doctrine;
    }
    
    #[Route('/project', name: 'project_user')]
    public function index(): Response
    {
        return $this->render('projet/index.html.twig', [
            'controller_name' => 'ProjetController',
        ]);
    }

    #[Route('/project/page_creation_project', name: 'page_creation_project')]
    public function showCreationProjectPage(): Response
    {

        return $this->render('projet/page_creation_project.html.twig', [
            'controller_name' => 'ProjetController',
        ]);
    }
}
