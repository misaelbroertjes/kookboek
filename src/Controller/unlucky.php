<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

class unlucky{
	public function showPage(){
		return new Response('I am so unlucky!');
	}
}