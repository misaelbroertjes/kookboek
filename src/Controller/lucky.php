<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class lucky {
	/**
	 * @Route("/lucky")
	 */
	public function showHome(){
		return new Response('Under the sea!');
	}
}