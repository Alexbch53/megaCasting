<?php

namespace App\Repository;

use App\Entity\Artiste;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class ArtisteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Artiste::class);
    }

    public function getPaginateArtiste($page, $limit)
    {
        $query = $this->createQueryBuilder('o')
            ->setFirstResult(($page * $limit) - $limit)
            ->setMaxResults($limit);
        return $query
            ->getQuery()
            ->getResult();
    }

    public function getTotalArtiste()
    {
        $query = $this->createQueryBuilder('o')
            ->select('COUNT(o)');
        return $query->getQuery()->getSingleScalarResult();
    }
}