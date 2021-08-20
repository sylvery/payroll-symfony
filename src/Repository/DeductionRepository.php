<?php

namespace App\Repository;

use App\Entity\Deduction;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Deduction|null find($id, $lockMode = null, $lockVersion = null)
 * @method Deduction|null findOneBy(array $criteria, array $orderBy = null)
 * @method Deduction[]    findAll()
 * @method Deduction[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DeductionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Deduction::class);
    }

    // /**
    //  * @return Deduction[] Returns an array of Deduction objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Deduction
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
