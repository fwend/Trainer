<?php

namespace App\Repository;

use App\Entity\ChallengeSection;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ChallengeSection|null find($id, $lockMode = null, $lockVersion = null)
 * @method ChallengeSection|null findOneBy(array $criteria, array $orderBy = null)
 * @method ChallengeSection[]    findAll()
 * @method ChallengeSection[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ChallengeSectionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ChallengeSection::class);
    }
}
