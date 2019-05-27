<?php

namespace App\Repository;

use App\Entity\ThemeLogiciel;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ThemeLogiciel|null find($id, $lockMode = null, $lockVersion = null)
 * @method ThemeLogiciel|null findOneBy(array $criteria, array $orderBy = null)
 * @method ThemeLogiciel[]    findAll()
 * @method ThemeLogiciel[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ThemeLogicielRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ThemeLogiciel::class);
    }

    // /**
    //  * @return ThemeLogiciel[] Returns an array of ThemeLogiciel objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ThemeLogiciel
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
