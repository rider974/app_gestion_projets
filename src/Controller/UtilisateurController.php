<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\UtilisateurRepository;

use App\Entity\Utilisateur;
use Doctrine\Persistence\ManagerRegistry;

class UtilisateurController extends AbstractController
{
    private $doctrine;

    public function __construct(ManagerRegistry $doctrine) {
        $this->doctrine = $doctrine;
    }


    #[Route('/utilisateur', name: 'app_utilisateur')]
    public function index(): Response
    {
        return $this->render('utilisateur/index.html.twig', [
            'controller_name' => 'UtilisateurController',
        ]);
    }

    
    #[Route('/', name: 'homepage')]
    public function homepageUtilisateur(Request $request): Response
    { 
        $session = $request->getSession();
        $user = $this->doctrine->getRepository(Utilisateur::class)->findOneBy(["id"=>1]);
        $projectsTitle = [];
        foreach ($user->getProjets() as $oneProject)
        {
            array_push($projectsTitle, $oneProject->getTitre());
        }
  

       $session->set('idUser', $user->getId());

        return $this->render('utilisateur/homepage_projects.html.twig', [
            'controller_name' => 'UtilisateurController',
            'projectsTitle'=> $projectsTitle,
            'userInitials'=> $user->getPrenom()[0].$user->getNom()[0]
        ]);
    }
}
