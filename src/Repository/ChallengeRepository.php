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
        } catch (NoResultException | NonUniqueResultException $e) {
        }
        return -1;
    }

    /**
     * @param ChallengeSection $section
     * @return Challenge|null
     */
    public function findFirstFromSection(ChallengeSection $section): ?Challenge
    {
        try {
            $qb = $this->createQueryBuilder('c')
                ->join('c.category', 'cat', 'WITH', 'cat.section = :section')
                ->setParameter(':section', $section)
                ->orderBy('cat.position', 'ASC')
                ->addOrderBy('c.position', 'ASC')
                ->setMaxResults(1);

            $result = $qb->getQuery()->getSingleResult();
            if ($result instanceof Challenge) {
                return $result;
            }

        } catch (NoResultException | NonUniqueResultException $e) {
        }
        return null;
    }

    /**
     * @param ChallengeCategory $category
     * @return Challenge|null
     */
    public function findFirstFromCategory(ChallengeCategory $category): ?Challenge
    {
        try {
            $qb = $this->createQueryBuilder('c')
                ->join('c.category', 'cat', 'WITH', 'cat.id = :category')
                ->setParameter(':category', $category)
                ->addOrderBy('c.position', 'ASC')
                ->setMaxResults(1);

            $result = $qb->getQuery()->getSingleResult();
            if ($result instanceof Challenge) {
                return $result;
            }

        } catch (NoResultException | NonUniqueResultException $e) {
        }
        return null;
    }

    /**
     * @param Challenge $challenge
     * @return Challenge|null
     */
    public function findNextChallenge(Challenge $challenge): ?Challenge
    {
        try {
            $qb = $this->createQueryBuilder('c');
            $qb->join('c.category', 'cat', 'WITH', 'cat.id = :category')
                ->andWhere($qb->expr()->eq('c.position', ':position'))
                ->setParameter(':category', $challenge->getCategory())
                ->setParameter(':position', $challenge->getPosition() + 1)
                ->setMaxResults(1);

            $result = $qb->getQuery()->getSingleResult();
            if ($result instanceof Challenge) {
                return $result;
            }

        } catch (NoResultException | NonUniqueResultException $e) {
        }
        return null;
    }

    /**
     * @param ChallengeSection $section
     * @return array
     */
    public function findChallengeIds(ChallengeSection $section): array
    {
        $qb = $this->createQueryBuilder('c');
        $qb->select('c.id');
        $qb->join('c.category', 'cat');
        $ex = $qb->expr();

        $results = $qb
            ->andWhere($ex->eq('cat.section', ':section'))
            ->setParameter(':section', $section)
            ->getQuery()
            ->getResult();

        $ids = [];
        foreach ($results ?? [] as $result) {
            $ids[] = $result['id'];
        }

        return $ids;
    }
}
