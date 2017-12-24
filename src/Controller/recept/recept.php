<?php

namespace App\Controller\recept;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class recept extends Controller{
	/**
	 * Matches /lucky exactly
	 * @Route("/recept")
	 */
	public function showPage(){
		return new Response('I am so lucky!');
		//return $this->redirect('http://www.google.nl');
		//return $this->redirectToRoute('unlucky');
	}
	
	
	
}