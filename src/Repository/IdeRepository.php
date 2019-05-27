<?php

namespace App\Repository;

use App\Entity\Ide;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Ide|null find($id, $lockMode = null, $lockVersion = null)
 * @method Ide|null findOneBy(array $criteria, array $orderBy = null)
 * @method Ide[]    findAll()
 * @method Ide[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class IdeRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Ide::class);
    }

    // /**
    //  * @return Ide[] Returns an array of Ide objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Ide
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
