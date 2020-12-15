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
        return -1;
    }

    /**
     * @param ChallengeSection $section
     * @return int|mixed|string|null
     */
    public function findFirstFromSection(ChallengeSection $section): ?Challenge
    {
        try {
            return $this->createQueryBuilder('c')
                ->join('c.category', 'cat', 'WITH', 'cat.section = :section')
                ->setParameter(':section', $section)
                ->orderBy('cat.position', 'ASC')
                ->addOrderBy('c.position', 'ASC')
                ->setMaxResults(1)
                ->getQuery()
                ->getSingleResult();

        } catch (NoResultException | NonUniqueResultException $e) {
        }
        return null;
    }

    /**
     * @param ChallengeCategory $category
     * @return int|mixed|string|null
     */
    public function findFirstFromCategory(ChallengeCategory $category): ?Challenge
    {
        try {
            return $this->createQueryBuilder('c')
                ->join('c.category', 'cat', 'WITH', 'cat.id = :category')
                ->setParameter(':category', $category)
                ->addOrderBy('c.position', 'ASC')
                ->setMaxResults(1)
                ->getQuery()
                ->getSingleResult();

        } catch (NoResultException | NonUniqueResultException $e) {
        }
        return null;
    }

    public function findNextChallenge(Challenge $challenge)
    {
        try {
            $qb = $this->createQueryBuilder('c');
            return $qb->join('c.category', 'cat', 'WITH', 'cat.id = :category')
                ->andWhere($qb->expr()->eq('c.position', ':position'))
                ->setParameter(':category', $challenge->getCategory())
                ->setParameter(':position', $challenge->getPosition() + 1)
                ->setMaxResults(1)
                ->getQuery()
                ->getSingleResult();

        } catch (NoResultException | NonUniqueResultException $e) {
        }
        return null;
    }


}
