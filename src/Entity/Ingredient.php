<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\IngredientRepository")
 */
class Ingredient
{
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
	 * @ORM\Column(type="string", length=1)
	 */
	private $eenheden;

    /**
     * @ORM\Column(type="integer", length=500)
     */
    private $calorieen;

    /**
     * @ORM\ManyToMany(targetEntity="Recept", mappedBy="recepten")
     */
    private $recepten;

    public function __construct() {
        $this->recepten = new ArrayCollection();
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
    public function getEenheden()
    {
        return $this->eenheden;
    }

    /**
     * @param mixed $eenheden
     */
    public function setEenheden($eenheden): void
    {
        $this->eenheden = $eenheden;
    }

    /**
     * @return mixed
     */
    public function getRecepten()
    {
        return $this->recepten;
    }

    /**
     * @param mixed $recepten
     */
    public function setRecepten($recepten): void
    {
        $this->recepten = $recepten;
    }
}