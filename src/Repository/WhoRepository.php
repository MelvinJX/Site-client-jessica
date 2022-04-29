<?php

namespace App\Repository;

use App\Entity\Who;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Who|null find($id, $lockMode = null, $lockVersion = null)
 * @method Who|null findOneBy(array $criteria, array $orderBy = null)
 * @method Who[]    findAll()
 * @method Who[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class WhoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Who::class);
    }

    // /**
    //  * @return Who[] Returns an array of Who objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('w')
            ->andWhere('w.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('w.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Who
    {
        return $this->createQueryBuilder('w')
            ->andWhere('w.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
