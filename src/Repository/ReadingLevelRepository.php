<?php

namespace App\Repository;

use App\Entity\ReadingLevel;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ReadingLevel|null find($id, $lockMode = null, $lockVersion = null)
 * @method ReadingLevel|null findOneBy(array $criteria, array $orderBy = null)
 * @method ReadingLevel[]    findAll()
 * @method ReadingLevel[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ReadingLevelRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ReadingLevel::class);
    }

    // /**
    //  * @return ReadingLevel[] Returns an array of ReadingLevel objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ReadingLevel
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
