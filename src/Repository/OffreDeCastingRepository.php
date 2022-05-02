<?php

namespace App\Repository;

use App\Entity\OffreDeCasting;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class OffreDeCastingRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, OffreDeCasting::class);
    }

    public function search($offre){
        return $this->createQueryBuilder('o')
            ->andWhere('o.intituleOffre LIKE :intituleOffre')
            ->setParameter('intituleOffre', '%'.$offre.'%')
            ->getQuery()
            ->getResult();
    }

    public function getPaginateCastings($page, $limit){
        $query = $this->createQueryBuilder('o')
            ->setFirstResult(($page * $limit) - $limit)
            ->setMaxResults($limit);
        return $query
            ->getQuery()
            ->getResult();
    }

    public function getTotalCastings(){
        $query = $this->createQueryBuilder('o')
            ->select('COUNT(o)');
        return $query->getQuery()->getSingleScalarResult();
    }

//    public function findByFirstname(){
//        $qb = $this->createQueryBuilder('o');
//        $qb->where('o.Intitule_Offre = :val')
//            ->setParameter('val', $value);
//
//    }
}