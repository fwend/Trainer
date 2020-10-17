<?php

namespace App\Repository;

use App\Entity\ChallengeCategory;
use App\Entity\ChallengeSection;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\ORM\NoResultException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ChallengeCategory|null find($id, $lockMode = null, $lockVersion = null)
 * @method ChallengeCategory|null findOneBy(array $criteria, array $orderBy = null)
 * @method ChallengeCategory[]    findAll()
 * @method ChallengeCategory[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ChallengeCategoryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ChallengeCategory::class);
    }

    /**
     * @param ChallengeSection $section
     * @return int
     */
    public function findPosition(ChallengeSection $section): int
    {
        try {
            return $this->createQueryBuilder('c')
                ->select('count(c.id)')
                ->andWhere('c.section = :section')
                ->setParameter(':section', $section)
                ->getQuery()
                ->getSingleScalarResult();
        } catch (NoResultException|NonUniqueResultException $e) {
        }
        return 0;
    }
}
