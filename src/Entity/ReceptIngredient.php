<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ReceptIngredientRepository")
 */
class ReceptIngredient
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Recept", inversedBy="ReceptIngredient")
     * @ORM\JoinColumn(name="receptId", referencedColumnName="id", nullable=FALSE)
     */
    private $receptId;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Ingredient", inversedBy="ReceptIngredient")
     * @ORM\JoinColumn(name="$ingredientId", referencedColumnName="id", nullable=FALSE)
     */
    private $ingredientId;

    /**
     * @ORM\Column(type="integer", length=10, nullable=true)
     */
    private $hoeveelheid;
}
