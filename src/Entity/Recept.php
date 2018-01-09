<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
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
	 * @ORM\Column(type="string", length=400, nullable=true)
	 */
	private $keywords;
	
	/**
	 * @ORM\Column(type="string", length=200, nullable=true)
	 */
	private $naam;
	
	/**
	 * @ORM\Column(type="string", length=200, nullable=true)
	 */
	private $image;
	
	/**
	 * @ORM\Column(type="decimal", precision=8, scale=2, nullable=true)
	 */
	private $prijs;
	
	/**
	 * @ORM\Column(type="string", length=500, nullable=true)
	 */
	private $opmerking;

    /**
     * @ORM\ManyToMany(targetEntity="Ingredient", inversedBy="recepten")
     * @ORM\JoinTable(name="recepten_ingredienten")
     */
    private $ingredienten;

    public function __construct() {
        $this->ingredienten = new ArrayCollection();
    }

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
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image): void
    {
        $this->image = $image;
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
}