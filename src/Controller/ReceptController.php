<?php

namespace App\Controller;

use App\Entity\Ingredient;
use App\Entity\Recept;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ReceptController extends Controller
{
	/**
	 * Lijst van alle recepten
	 * @Route("/recepten", name="recepten")
	 */
	public function receptList()
	{
		// Start de doctrine manager
		$em = $this->getDoctrine()->getManager();
		
		// Maak een repo aan voor resultaten van de database
		$repository = $this->getDoctrine()->getRepository(Recept::class);
		
		// Haal alle recepten op
		$recepten = $repository->findAll();
		//$receptenCompleet = $repository->addLinkedIngredienten();

		return $this->render('recept/ReceptLijst.html.twig', ['recepten' => $recepten]);
	}

	/**
	 *	Detail pagina van een recept
	 * @Method("GET")
	 * @Route("/recept", name="recept")
	 * @Route("/recept/{id}")
	 */
	public function receptDetail($id = "")
	{
		// Start de doctrine manager
		$em = $this->getDoctrine()->getManager();

		// Maak een repo aan voor resultaten van de database
		$repository = $this->getDoctrine()->getRepository(Recept::class);

		// Maak een repo aan voor de ingredienten
		$repositoryIngredienten = $this->getDoctrine()->getRepository(Ingredient::class);

		$ingredienten = $repositoryIngredienten->findAll();

		if($id != ""){
			$recept = $repository->findOneByIdJoinedToIngredienten($id);
			dump($recept);
//			$recept = $repository->find($id);
//			dump($recept);
//			exit();
			return $this->render('recept/ReceptDetail.html.twig',array( 'recept' => $recept[0], 'ingredienten' => $ingredienten ) );
		} else{
			return $this->render('recept/ReceptDetail.html.twig', array( 'ingredienten' => $ingredienten ) );
		}
	}
	
	/**
	 * Verwerken van een recept aanpassing of aanmaken
	 * @Method("POST")
	 * @Route("/recept", name="recept")
	 * @Route("/recept/{old}")
	 */
	public function receptVerwerken()
	{
		// Maak een object om request uit te lezen
		$request = Request::createFromGlobals();
		
		// Haal gevonden waarde uit de POST
		$id = $request->request->get('id');
		$naam = $request->request->get('naam');
		$prijs = $request->request->get('prijs');
		$opmerking = $request->request->get('opmerking');
		$keywords = $request->request->get('keywords');

		// Vervang eventueele , door . voor de prijs
		$prijs = str_replace(',', '.', $prijs);

		// Ingredienten string aanpassen naar een array
		$ingredienten = $request->request->get('ingredienten');
        $ingredienten = substr($ingredienten, 0, -1);
		$ingredienten = explode(",", $ingredienten);
		
		// Start de doctrine manager
		$em = $this->getDoctrine()->getManager();
		
		// Maak een repo aan voor resultaten van de database
		$repository = $this->getDoctrine()->getRepository(Recept::class);
		
		// Als het gaat om een bestaand recept (id nummer mee gegeven)
		if($id != "") {
		    // haal bestaande info op
			$recept = $em->getRepository(Recept::class)->find($id);
		} else {
			// als het gaat om een nieuw recept dan checken of de naam het al bestaat onder een andere id
			$recept = $repository->findOneBy(['naam' => $naam]);
			if($recept){
				return $this->redirectToRoute("recept", array('error' => "001") );
				exit();
			}
		}
		
		// Wanneer het gaat om een echt nieuw recept
		if(!$recept){
			// Maak dan een schoon recept aan
			$recept = new Recept();
		}
		
		// Vul het met de ontvangen waarden
		$recept->setId($id);
		$recept->setNaam($naam);
		$recept->setKeywords($keywords);
		$recept->setOpmerking($opmerking);
		$recept->setPrijs($prijs);
		
		// Maak de ingredienten aan
		$repositoryIngredienten = $this->getDoctrine()->getRepository(Ingredient::class);
		
		foreach ($ingredienten as $key => $value){
			$value = explode(":", $value);
			$ingredient[$value[0]] = $repositoryIngredienten->find($value[0]);
		}
		
		// Koppel de ingredienten aan het recept
		$recept->setIngredienten($ingredient);
		
		// Geef aan het object te willen bewaren
		$em->persist($recept);
		
		// Voer wijzingen door
		$em->flush();
		
		return $this->redirectToRoute("recepten");
	}
	
	/**
	 * Verwerken van een recept aanpassing of aanmaken
	 * @Route("/recept/delete/{id}")
	 */
	public function receptVerwijderen($id)
	{
		// Start de doctrine manager
		$em = $this->getDoctrine()->getManager();
		
		// Maak een repo aan voor resultaten van de database
		$repository = $this->getDoctrine()->getRepository(Recept::class);
		
		// Haal het te verwijderen $recept op
		$recept = $em->getRepository(Recept::class)->find($id);
		
		// Maak de opdracht voor verwijderen aan
		$em->remove($recept);
		
		// Verwijder uit dataabase
		$em->flush();
		
		return $this->redirectToRoute("recepten" );
	}
	
}