<?php

namespace App\Repository;

use App\Entity\ContactEmail;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ContactEmail|null find($id, $lockMode = null, $lockVersion = null)
 * @method ContactEmail|null findOneBy(array $criteria, array $orderBy = null)
 * @method ContactEmail[]    findAll()
 * @method ContactEmail[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ContactEmailRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ContactEmail::class);
    }

    // /**
    //  * @return ContactEmail[] Returns an array of ContactEmail objects
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
    public function findOneBySomeField($value): ?ContactEmail
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
