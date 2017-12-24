<?php

namespace App\Controller;

use App\Entity\Ingredient;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class IngredientController extends Controller
{
    /**
	 * Haal een lijst op van ingredienten
     * @Route("/ingredient", name="ingredient")
     */
    public function ingedrientList()
    {
    	// Start de doctrine manager
		$em = $this->getDoctrine()->getManager();
		
		// Maak een repo aan voor resultaten van de database
		$repository = $this->getDoctrine()->getRepository(Ingredient::class);
	
		$products = $repository->findAll();
		dump($products);
		return $this->render('ingredient/show.html.twig', ['products' => $products]);
		
		
		/*
		//$ingredient = $repository->find($id);
		$ingredient = $repository->findOneBy(['naam' => 'kaas']);
		
		if($ingredient){
			$ingredient->setPrijs(3.0);
		}
		
		//$ingredient = new Ingredient();
		//$ingredient->setNaam('kaas');
		
		
		// Zet de verranderingen in in het doctrine object
		$em->persist($ingredient);
		
		// Voer de verranderingen uit in de database
		$em->flush();
		*/
		//return new Repsonse('Saved the new '.$ingredient->getNaam() );
		//return new Response('Saved the new '.$ingredient->getNaam() );
    }
}
