<?php

namespace App\Repository;

use App\Entity\Challenge;
use App\Entity\ChallengeRun;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ChallengeRun|null find($id, $lockMode = null, $lockVersion = null)
 * @method ChallengeRun|null findOneBy(array $criteria, array $orderBy = null)
 * @method ChallengeRun[]    findAll()
 * @method ChallengeRun[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ChallengeRunRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ChallengeRun::class);
    }

    /**
     * @return Challenge|null
     */
    public function findRun(): ?Challenge
    {
        $qb = $this->createQueryBuilder('c');
        $qb->andWhere($qb->expr()->isNotNull('c.current'))
            ->orderBy('c.created', 'DESC')
            ->setMaxResults(1)
            ->getQuery()
            ->getResult();
    }

}
