<?php

namespace App\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class unlucky
{
	/**
	 * @Route("/unlucky")
	 */
	public function unluckyShow(){
		return new Response("test");
	}
}