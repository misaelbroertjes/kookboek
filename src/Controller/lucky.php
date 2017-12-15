<?php

namespace App\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class lucky {
	/**
	 * @Route("/lucky")
	 */
	public function showPage(){
		return new Response('Under the sea!');
	}
}