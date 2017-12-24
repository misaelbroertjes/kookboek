<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\IngredientRepository")
 */
class Ingredient
{
	// DB Layout
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;
	
	/**
	 * @ORM\Column(type="string", length=200)
	 */
	private $naam;
    
    /**
	 * @ORM\Column(type="float", length=100)
	 */
 	private $prijs;
	
	
	// Getters en setters
	/**
	 * @return mixed
	 */
	public function getId()
	{
		return $this->id;
	}
	
	/**
	 * @param mixed $id
	 */
	public function setId($id): void
	{
		$this->id = $id;
	}
	
	/**
	 * @return mixed
	 */
	public function getNaam()
	{
		return $this->naam;
	}
	
	/**
	 * @param mixed $naam
	 */
	public function setNaam($naam): void
	{
		$this->naam = $naam;
	}
	
	/**
	 * @return mixed
	 */
	public function getPrijs()
	{
		return $this->prijs;
	}
	
	/**
	 * @param mixed $prijs
	 */
	public function setPrijs($prijs): void
	{
		$this->prijs = $prijs;
	}
	
	
	
}
