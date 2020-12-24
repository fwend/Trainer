<?php

namespace App\Repository;

use App\Entity\RunHistory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method RunHistory|null find($id, $lockMode = null, $lockVersion = null)
 * @method RunHistory|null findOneBy(array $criteria, array $orderBy = null)
 * @method RunHistory[]    findAll()
 * @method RunHistory[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RunHistoryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RunHistory::class);
    }

    // /**
    //  * @return RunHistory[] Returns an array of RunHistory objects
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
    public function findOneBySomeField($value): ?RunHistory
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
