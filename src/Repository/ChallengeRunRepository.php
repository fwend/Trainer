<?php

namespace App\Repository;

use App\Entity\ChallengeRun;
use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\ORM\ORMException;
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
     * @return ChallengeRun|null
     */
    public function findRun(): ?ChallengeRun
    {
        $qb = $this->createQueryBuilder('c');
        try {
            return $qb->andWhere($qb->expr()->isNotNull('c.current'))
                ->orderBy('c.created', 'DESC')
                ->setMaxResults(1)
                ->getQuery()
                ->getOneOrNullResult();
        } catch (NonUniqueResultException $e) {
        }
        return null;
    }

    public function purge(User $user, bool $flush = false)
    {
        try {
            $em = $this->getEntityManager();
            foreach ($user->getRuns() as $run) {
                $em->remove($run);
            }
            if ($flush) {
                $em->flush();
            }
        } catch (ORMException $e) {
        }
    }
}
