<?php

namespace App\Repository;

use App\Entity\Challenge;
use App\Entity\ChallengeCategory;
use App\Entity\ChallengeSection;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\ORM\NoResultException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Challenge|null find($id, $lockMode = null, $lockVersion = null)
 * @method Challenge|null findOneBy(array $criteria, array $orderBy = null)
 * @method Challenge[]    findAll()
 * @method Challenge[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ChallengeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Challenge::class);
    }

    /**
     * @param ChallengeCategory $category
     * @return int
     */
    public function findPosition(ChallengeCategory $category): int
    {
        try {
            return $this->createQueryBuilder('c')
                ->select('count(c.id)')
                ->andWhere('c.category = :category')
                ->setParameter(':category', $category)
                ->getQuery()
                ->getSingleScalarResult();
        } catch (NoResultException|NonUniqueResultException $e) {
        }
        return 0;
    }

    /**
     * @param ChallengeSection $section
     * @return int|mixed|string|null
     */
    public function getFirstChallenge(ChallengeSection $section): ?Challenge
    {
        try {
            $qb = $this->createQueryBuilder('c');
            return $qb->join('c.category', 'cat', 'WITH', 'cat.section = :section')
                ->setParameter(':section', $section)
                ->orderBy('cat.position', 'ASC')
                ->addOrderBy('c.position', 'ASC')
                ->setMaxResults(1)
                ->getQuery()
                ->getSingleResult();

        } catch (NoResultException $e) {
        } catch (NonUniqueResultException $e) {
        }
        return null;
    }


}
