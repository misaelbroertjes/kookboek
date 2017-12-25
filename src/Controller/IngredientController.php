<?php

namespace App\Controller;

use App\Entity\Ingredient;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class IngredientController extends Controller
{
    /**
	 * Lijst van alle ingredienten
     * @Route("/ingredienten", name="ingredienten")
     */
    public function ingedrientList()
    {
    	// Start de doctrine manager
		$em = $this->getDoctrine()->getManager();
		
		// Maak een repo aan voor resultaten van de database
		$repository = $this->getDoctrine()->getRepository(Ingredient::class);
	
		// Haal alle ingredienten op
		$ingredienten = $repository->findAll();
		return $this->render('ingredient/IngredientLijst.html.twig', ['ingredienten' => $ingredienten]);
    }
	
	/**
	 *	Detail pagina van een ingredient
	 * @Method("GET")
	 * @Route("/ingredient", name="ingredient")
	 * @Route("/ingredient/{id}")
	 */
	public function ingedrientDetail($id = "")
	{
		// Start de doctrine manager
		$em = $this->getDoctrine()->getManager();
		
		// Maak een repo aan voor resultaten van de database
		$repository = $this->getDoctrine()->getRepository(Ingredient::class);
		
		if($id != ""){
			$ingredient = $repository->find($id);
			return $this->render('ingredient/IngredientDetail.html.twig', ['ingredient' => $ingredient]);
		} else{
			return $this->render('ingredient/IngredientDetail.html.twig');
		}
	}
	
	/**
	 * Verwerken van een ingredient aanpassing of aanmaken
	 * @Method("POST")
	 * @Route("/ingredient", name="ingredient")
	 * @Route("/ingredient/{old}")
	 */
	public function ingedrientVerwerken()
	{
		// Maak een object om request uit te lezen
		$request = Request::createFromGlobals();
		
		// Haal gevonden waarde uit de POST
		$naam = $request->request->get('naam');
		$calorieen = $request->request->get('calorieen');
		$id = $request->request->get('id');
		
		// Start de doctrine manager
		$em = $this->getDoctrine()->getManager();
		
		// Maak een repo aan voor resultaten van de database
		$repository = $this->getDoctrine()->getRepository(Ingredient::class);
		
		// Als het gaat om een bestaand ingredient
		if($id != "") {
			$ingredient = $em->getRepository(Ingredient::class)->find($id);
		} else {
			// alse het gaat om een nieuw ingredient dan checken of het al bestaat
			$ingredient = $repository->findOneBy(['naam' => $naam]);
			if($ingredient){
				return $this->redirectToRoute("ingredient", array('error' => "001") );
				exit();
			}
		}
		
		// Wanneer het gaat om een echt nieuw product
		if(!$ingredient){
			// Maak dan een schoon ingredient aan
			$ingredient = new Ingredient();
		}
		
		// Vul het met de ontvangen waarden
		$ingredient->setId($id);
		$ingredient->setNaam($naam);
		$ingredient->setCalorieen($calorieen);
		
		// Geef aan het object te willen bewaren
		$em->persist($ingredient);
		
		// Voer wijzingen door
		$em->flush();
		
		return $this->redirectToRoute("ingredienten");
		
	}
}
