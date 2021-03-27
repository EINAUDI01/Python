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
     * @Route("inscription", name="inscription")
     */
    public function inscription() : Response
    {
        return $this->render('projet/inscription.html.twig');
    }
	
	//Route Pour la Connexion
	
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
	public function creer_utilisateur(EntityManagerInterface $manager, Request $request) : Response
    {
		//Recuperation des valeurs du formulaire
		$recupIdentifiant = $request -> request -> get("Email"); 
		$recupNom = $request -> request -> get("Nom"); 
		$recupPrenom = $request -> request -> get("Prenom"); 
		$recupMDP = $request -> request -> get("Password");
		
		//Cryptage du MotDePasse
		$cost = 12;
		$hash = password_hash($recupMDP, PASSWORD_BCRYPT, ["cost" => $cost]);
		
		if (password_verify($recupMDP, $hash)
		{
		//Création d'un nouvel utilisateur
		$User = new User();
		
		//Insertion de la valeur dans l'objet
		$User -> setEmail($recupIdentifiant);
		$User -> setNom($recupNom);
		$User -> setPrenom($recupPrenom);
		$User -> setMotDePasse($recupMDP);
		
		//Validation de la BD
		$manager -> persist($User);
		$manager -> flush();
		
        return $this->redirecToRoute('ListeUtilisateur');
		}
		
		else
		{
			$Information = "Recommencez une nouvelle fois !";
			
			return $this->render('login/ErreurAjoutUser.html.twig', [ 'Information' => "$Information"]);
		}
			
    }
	
	// Route Liste des Utilisateurs
	
	/**
     * @Route("ListeUtilisateur", name="ListeUtilisateur")
     */
    public function login (Request $request, EntityManagerInterface $manager) : Response
    {
		//Récupérer tous les Utilisateurs
		$ListeUser = $manager -> getRepository(Utilisateur::class)->findAll;
		
		return $this -> render('login/ListeUtilisateur.html.twig', ['ListeUser' => $ListeUser]);
	}
}
