<?php

namespace App\Controller;

use App\Entity\Ingredient;
use App\Entity\Recept;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class home extends Controller{
	/**
	 * @Route("/", name="home")
	 */
	public function showHome(){
		
		// Start de doctrine manager
		$em = $this->getDoctrine()->getManager();
		
		// Maak een repo aan voor resultaten van de database voor ingredienten
		$repositoryIngredient = $this->getDoctrine()->getRepository(Ingredient::class);
		
		// Maak een repo aan voor resultaten van de database voor recepten
		$repositoryRecept = $this->getDoctrine()->getRepository(Recept::class);
		
		// Haal alle ingredienten op
		$ingredienten = $repositoryIngredient->findAll();
		
		// Haal alle ingredienten op
		$recepten = $repositoryRecept->findAll();
		
		//dump($ingredienten);
		return $this->render('home.html.twig', array('ingredienten' => $ingredienten, 'recepten' => $recepten) );
	}
}