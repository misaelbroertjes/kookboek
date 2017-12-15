<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class lucky {
	/**
	 * Matches /lucky exactly
	 * @Route("/lucky")
	 */
	public function showPage(){
		return new Response('I am so lucky!');
	}
}