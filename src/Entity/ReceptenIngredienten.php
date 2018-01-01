<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
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
	 * @ORM\ManyToMany(targetEntity="App\Repository\ReceptenRepository")
	 * @ORM\Column(type="string", length=200, nullable=true)
	 */
	private $receptNaam;
	
	public function __construct()	{
		$this->receptNaam = new ArrayCollection();
	}
	
	/**
	 * @ORM\Column(type="integer")
	 */
	private $ingredientId;
}
