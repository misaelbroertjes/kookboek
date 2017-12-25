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
	 * @ORM\Column(type="string", length=200, unique=true)
	 */
	private $naam;
    
    /**
	 * @ORM\Column(type="integer", length=20)
	 */
 	private $calorieen;
	
	
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
	public function getCalorieen()
	{
		return $this->calorieen;
	}
	
	/**
	 * @param mixed $calorieen
	 */
	public function setCalorieen($calorieen): void
	{
		$this->calorieen = $calorieen;
	}
	
	
	
	
	
}
