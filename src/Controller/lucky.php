<?php
/**
 * Created by PhpStorm.
 * User: Misaël
 * Date: 15-12-2017
 * Time: 15:43
 */

namespace App\Controller;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class lucky {
	/**
	 * @Route("/lucky")
	 */
	public function showAction(){
		return new Response('Under the sea!');
	}
}