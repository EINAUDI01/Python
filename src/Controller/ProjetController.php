<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

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
     * @Route("/login", name="Create_login")
    */
    public function Createlogin (Request $request,EntityManagerInterface $manager) : Response
    {
		$login=$request->request->get("nom");
		$password=$request->request->get("password");
		
		if ($login=="admin")
			$message="BIENVENUE CHER ADMINISTRATEUR";
		else
			$message="BIENVENUE CHER UTILISATEUR";
		
		
        return $this->render('login/Creerlogin.html.twig', [ 'nom' => $login, 'message' => $message, ] );
    }
}
