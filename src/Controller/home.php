<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class home{
	/**
	 * @Route("/")
	 */
	public function showPage(){
		return new Response('Under the sea!');
	}
}