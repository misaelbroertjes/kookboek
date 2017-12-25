<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ReceptRepository")
 */
class Recept
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;
	
	/**
	 * @ORM\Column(type="string", length=400)
	 */
	private $keywords;
	
	/**
	 * @ORM\Column(type="string", length=200)
	 */
	private $imgage;
	
	/**
	 * @ORM\Column(type="float", length=10)
	 */
	private $prijs;
	
	/**
	 * @ORM\Column(type="string", length=500)
	 */
	private $ingredienten;
	
	/**
	 * @ORM\Column(type="string", length=500)
	 */
	private $hoeveelheden;
	
	/**
	 * @ORM\Column(type="string", length=500)
	 */
	private $opmerking;
	
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
	public function getKeywords()
	{
		return $this->keywords;
	}
	
	/**
	 * @param mixed $keywords
	 */
	public function setKeywords($keywords): void
	{
		$this->keywords = $keywords;
	}
	
	/**
	 * @return mixed
	 */
	public function getImgage()
	{
		return $this->imgage;
	}
	
	/**
	 * @param mixed $imgage
	 */
	public function setImgage($imgage): void
	{
		$this->imgage = $imgage;
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
	
	/**
	 * @return mixed
	 */
	public function getIngredienten()
	{
		return $this->ingredienten;
	}
	
	/**
	 * @param mixed $ingredienten
	 */
	public function setIngredienten($ingredienten): void
	{
		$this->ingredienten = $ingredienten;
	}
	
	/**
	 * @return mixed
	 */
	public function getHoeveelheden()
	{
		return $this->hoeveelheden;
	}
	
	/**
	 * @param mixed $hoeveelheden
	 */
	public function setHoeveelheden($hoeveelheden): void
	{
		$this->hoeveelheden = $hoeveelheden;
	}
	
	/**
	 * @return mixed
	 */
	public function getOpmerking()
	{
		return $this->opmerking;
	}
	
	/**
	 * @param mixed $opmerking
	 */
	public function setOpmerking($opmerking): void
	{
		$this->opmerking = $opmerking;
	}

    // Setters and Getters
	
}
