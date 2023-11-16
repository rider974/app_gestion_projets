<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Repository\ProjetRepository;
use Doctrine\Persistence\ManagerRegistry;

use App\Repository\UtilisateurRepository;

use App\Entity\Utilisateur;
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
    public function showCreationProjectPage(Request $request): Response
    {
        
        $users = $this->doctrine->getRepository(Utilisateur::class)->findAll();
        $arrayUsersInfo = [];

        foreach($users as $oneUser)
        {
            $user = [];
            $user['id'] = $oneUser->getId();
            
            $user['prenom'] = $oneUser->getPrenom();
            
            $user['nom'] = $oneUser->getNom();
            array_push($arrayUsersInfo,$user);
        }
        return $this->render('projet/page_creation_project.html.twig', [
            'controller_name' => 'ProjetController',
            'users'=> $arrayUsersInfo,
            'userId'=> $request->getSession()->get("idUser"),
        ]);
    }
}
