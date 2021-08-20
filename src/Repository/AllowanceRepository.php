<?php

namespace App\Repository;

use App\Entity\Allowance;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Allowance|null find($id, $lockMode = null, $lockVersion = null)
 * @method Allowance|null findOneBy(array $criteria, array $orderBy = null)
 * @method Allowance[]    findAll()
 * @method Allowance[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AllowanceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Allowance::class);
    }

    // /**
    //  * @return Allowance[] Returns an array of Allowance objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Allowance
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
