<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Utilisateur;

class ProjetController extends AbstractController
{
	//Route page Index
	
    /**
     * @Route("/projet", name="projet")
     */
    public function index(): Response
    {
        return $this->render('projet/index.html.twig', [
            'controller_name' => 'ProjetController',
        ]);
    }
	
	//Route Formulaire de Connexion
	/**
     * @Route("connexion", name="connexion")
     */
    public function connexion() : Response
    {
        return $this->render('projet/connexion.html.twig');
    }
	
	//Route Pour Vérification de la Connexion
	
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
				$message="Bienvenue cher ";
				$erreur="MOT DE PASSE VALIDE";
			
			return $this->redirectToRoute('OuvertureDeSession', [ 'message' => "$message",  'login' => "$login", 'erreur' => "$erreur" ]);
		}
		else{
			$erreur="MOT DE PASSE OU LOGIN INCORRECT !!! ";
			//Ne Pas oublier la modification d'ici
			return $this->redirectToRoute('OuvertureDeSession', 'erreur' => "$erreur" ]);
		}
	}
	
	//Route Gestion de Session
	
	/**
     * @Route("OuvertureDeSession", name="OuvertureDeSession")
     */
    public function OuvertureDeSession(Request $request, EntityManagerInterface $manager, SessionInterface $session) : Response
    {
		
        return $this->render('projet/PageAccueil.html.twig');
    }
	
	
	//Route formulaire pour ajouter un nouveau utilisateur
	
	/**
     * @Route("FormulaireNouveauUtilisateur", name="FormulaireNouveauUtilisateur")
     */
    public function FormulaireNouveauUtilisateur() : Response
    {
        return $this->render('projet/Creer-utilisateur.html.twig');
    }
	
	//Route enregistrement des informations du nouvel Utilisateur
	
	/**
     * @Route("CreationUtilisateur", name="CreationUtilisateur")
     */
	public function creer_utilisateur(EntityManagerInterface $manager, Request $request)
    {
		//Recuperation des valeurs du formulaire
		$recupIdentifiant = $request -> request -> get("Email"); 
		$recupNom = $request -> request -> get("Nom"); 
		$recupPrenom = $request -> request -> get("Prenom"); 
		$recupMDP = $request -> request -> get("Password");
		
		//Cryptage du MotDePasse
		//$cost = 12;
		//$hash = password_hash($recupMDP, PASSWORD_BCRYPT, ["cost" => $cost]);
		
		//if (password_verify($recupMDP, $hash)
		//{
		//Création d'un nouvel utilisateur
		$user = new Utilisateur ();
		
		//Insertion de la valeur dans l'objet
		$user -> setNom($recupNom);
		$user -> setPrenom($recupPrenom);
		$user -> setMotDePasse($recupMDP);
		$user->setEmail($recupIdentifiant);
		
		//Validation de la BD
		$manager -> persist($user);
		$manager -> flush();
		
        return $this->redirectToRoute('ListeUtilisateur');
		//}
		
		//else
		//{
			//$Information = "Recommencez une nouvelle fois !";
			
			//return $this->render('login/ErreurAjoutUser.html.twig', [ 'Information' => "$Information"]);
		//}
			
    }
	
	// Route Liste des Utilisateurs
	
	/**
     * @Route("ListeUtilisateur", name="ListeUtilisateur")
     */
    public function ListeUtilisateur (Request $request, EntityManagerInterface $manager)
    {
		//Récupérer tous les Utilisateurs
		$ListeUser = $manager -> getRepository(Utilisateur::class)->findAll();
		
		return $this -> render('login/ListeUtilisateur.html.twig', ['ListeUser' => $ListeUser]);
	}
}
