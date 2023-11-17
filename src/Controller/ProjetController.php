<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ProjetRepository;
use Doctrine\Persistence\ManagerRegistry;

use App\Entity\Projet;
use App\Repository\UtilisateurRepository;

use App\Entity\Utilisateur;

use App\Repository\TableauRepository;

use App\Entity\Tableau;

use App\Repository\ColonneRepository;

use App\Entity\Colonne;
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

    #[Route('/project/create_new_project', name: 'create_new_project')]
    public function createProject(Request $request): Response
    {
        $content = json_decode($request->getContent(),true);
        
        $em = $this->doctrine->getManager();

        $projectTitle = $content["titleProject"];
        
        $arrayIdsMembers = $content["arrayIdsMembers"];
    
        $goals = $content["goals"];

        // creation of the project 
        $newProject = new Projet();
        $newProject->setTitre($projectTitle);
        
        $newProject->setObjectifs($goals);

        foreach($arrayIdsMembers as $idMember)
        {
            $newProject->addUtilisateur($this->doctrine->getRepository(Utilisateur::class)->find((int)$idMember));
        }
        $em->persist($newProject);

        // creation of the table 
        // creation of the 3 columns (EN cours, A faire, Terminé) related to each table 

        $table = new Tableau();
        $table->setProjet($newProject);
    
        // add Columns to the table
        $this->createColumns($table, ["A faire", "En cours", "Terminé"]);
        $em->persist($table);
        $em->flush();

        return new JsonResponse("Le projet a bien été créer", 200);
    }

    
    #[Route('/project/page_project', name: 'page_project')]
    public function showProjectPage(Request $request): Response
    {
        $project = $this->doctrine->getRepository(Projet::class)->findOneBy([], ['id'=> "DESC"], 1);
        return $this->render('projet/projet.html.twig', [
            'controller_name' => 'ProjetController',
            'project'=> $project
        ]);
    }

    /**
     * Create each columns for the table 
     *
     * param Type $var Description
     * return type
     **/
    private function createColumns($table, $arrayColumnNames)
    {
        $em = $this->doctrine->getManager();

        foreach($arrayColumnNames as $oneColumnName)
         {
             $column = new Colonne();
             $column->setIntitule($oneColumnName);
             $table->addColonne($column);
             $em->persist($column);
         }
    }

   
    
    
}
