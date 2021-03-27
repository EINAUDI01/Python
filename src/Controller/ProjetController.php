<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Utilisateur;

class ProjetController extends AbstractController
{
    /**
     * @Route("/projet", name="projet")
     */
    public function index(): Response
    {
        return $this->render('projet/index.html.twig', [
            'controller_name' => 'ProjetController',
        ]);
    }
	
	/**
     * @Route("inscription", name="inscription")
     */
    public function inscription() : Response
    {
        return $this->render('projet/inscription.html.twig');
    }
	
	/**
     * @Route("CreationUtilisateur", name="CreationUtilisateur")
     */
    public function creer_utilisateur() : Response
    {
        return $this->render('projet/creer-utilisateur.html.twig');
    }
	
	
	/**
     * @Route("login", name="login")
     */
    public function login (Request $request, EntityManagerInterface $manager) : Response
    {
		$nom=$request->request->get("nom");
		$password=$request->request->get("password");
		
		$reponse = $manager -> getRepository(Utilisateur::class) -> findBy(["Nom" => $nom, "MotDePasse" => $password]);
		
		if (sizeof($reponse)>0)
		{
			if ($nom=="admin")
			{
				$message="Bienvenue cher Administrateur";
				$erreur="MOT DE PASSE VALIDE";
			}
			else
			{
				$message="Bienvenue cher Utilisateur";
				$erreur="MOT DE PASSE VALIDE";
				
			} 
			return $this->render('login/index.html.twig', [ 'nom' => "$nom", 'message'  => "$message", 'erreur'  => "$erreur" ]);
		}
		else{
			$erreur="MOT DE PASSE OU LOGIN INCORRECT !!! ";
			return $this->render('login/Erreur.html.twig', [  'erreur' => "$erreur" ]);
		}
	}
}
