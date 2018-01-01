<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ReceptenIngredientenRepository")
 */
class ReceptenIngredienten
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;
	
	/**
	 * @ORM\Column(type="integer")
	 */
	private $receptId;
	
	/**
	 * @ORM\Column(type="integer")
	 */
	private $ingredientId;
}
