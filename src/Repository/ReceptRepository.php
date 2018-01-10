<?php

namespace App\Repository;

use App\Entity\Recept;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Doctrine\ORM\Query\Expr\Join;

class ReceptRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Recept::class);
    }

    /*
    public function findBySomething($value)
    {
        return $this->createQueryBuilder('r')
            ->where('r.something = :value')->setParameter('value', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    public function findOneByIdJoinedToIngredienten($receptId)
    {
        $qb = $this->createQueryBuilder('r')
            ->where('r.id = :receptId')->setParameter('receptId', $receptId)
//			->innerJoin()
//			->innerjoin('r.id', 'i')
//			->addSelect('i')
//          ->innerJoin('r', 'recepten', 'p', 'r.id = p.id')
            ->innerJoin('id.recepten', 'p', Join::ON, 'c.id = p.ingredientId')
            ->getQuery();

        return $qb->execute();

//		return $this->createQueryBuilder('p')
//			->innerJoin('p.category', 'c')
//			->addSelect('c')
//			->andWhere('p.id = :id')
//			->setParameter('id', $productId)
//			->getQuery()
//			->getOneOrNullResult();
    }
}
