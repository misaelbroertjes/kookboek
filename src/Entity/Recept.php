<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ReceptRepository")
 */
class Recept
{
	// DB Layout
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;
	
	/**
	 * @ORM\Column(type="string", length=100)
	 */
	private $naam;
	
	/**
	 * @ORM\Column(type="float", length=100)
	 */
	private $prijs;
	
	/**
	 * @ORM\Column(type="string", length=100)
	 */
	private $img_url;
	
	/**
	 * @ORM\Column(type="string", length=900)
	 */
	private $keywords;
	
	
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
	
	/**
	 * @return mixed
	 */
	public function getImgUrl()
	{
		return $this->img_url;
	}
	
	/**
	 * @param mixed $img_url
	 */
	public function setImgUrl($img_url): void
	{
		$this->img_url = $img_url;
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
	
	
}
