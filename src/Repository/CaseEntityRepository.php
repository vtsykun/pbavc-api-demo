<?php

namespace App\Repository;

use App\Entity\CaseEntity;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method CaseEntity|null find($id, $lockMode = null, $lockVersion = null)
 * @method CaseEntity|null findOneBy(array $criteria, array $orderBy = null)
 * @method CaseEntity[]    findAll()
 * @method CaseEntity[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CaseEntityRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, CaseEntity::class);
    }

    // /**
    //  * @return CaseEntity[] Returns an array of CaseEntity objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CaseEntity
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
