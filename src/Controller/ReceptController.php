<?php

namespace App\Controller;

use App\Entity\Recept;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
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
		
		if($id != ""){
			$recept = $repository->find($id);
			return $this->render('recept/ReceptDetail.html.twig', ['recept' => $recept]);
		} else{
			return $this->render('recept/ReceptDetail.html.twig');
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
		$naam = $request->request->get('naam');
		$prijs = $request->request->get('prijs');
		
		// Vervang eventueele , door .
		$prijs = str_replace(',', '.', $prijs);
		
		$opmerking = $request->request->get('opmerking');
		/*$calorieen = $request->request->get('calorieen');
		$eenheden = $request->request->get('eenheden');*/
		$id = $request->request->get('id');
		
		
		// Start de doctrine manager
		$em = $this->getDoctrine()->getManager();
		
		// Maak een repo aan voor resultaten van de database
		$repository = $this->getDoctrine()->getRepository(Recept::class);
		
		// Als het gaat om een bestaand recept
		if($id != "") {
			$recept = $em->getRepository(Recept::class)->find($id);
		} else {
			// alse het gaat om een nieuw recept dan checken of het al bestaat
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
		/*$recept->setCalorieen($calorieen);
		$recept->setEenheden($eenheden);*/
		$recept->setNaam($naam);
		$recept->setOpmerking($opmerking);
		$recept->setPrijs($prijs);
		
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