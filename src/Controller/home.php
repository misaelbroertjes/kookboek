<?php

namespace App\Controller;

use App\Entity\Ingredient;
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
		
		// Maak een repo aan voor resultaten van de database
		$repository = $this->getDoctrine()->getRepository(Ingredient::class);
		
		// Haal alle ingredienten op
		$ingredienten = $repository->findAll();
		
		//dump($ingredienten);
		return $this->render('home.html.twig', ['ingredienten' => $ingredienten] );
	}
}