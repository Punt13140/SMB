<?php

namespace App\Repository;

use App\Entity\VersionFramework;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method VersionFramework|null find($id, $lockMode = null, $lockVersion = null)
 * @method VersionFramework|null findOneBy(array $criteria, array $orderBy = null)
 * @method VersionFramework[]    findAll()
 * @method VersionFramework[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VersionFrameworkRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, VersionFramework::class);
    }

    // /**
    //  * @return VersionFramework[] Returns an array of VersionFramework objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('v.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?VersionFramework
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
