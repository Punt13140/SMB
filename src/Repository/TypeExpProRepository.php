<?php

namespace App\Repository;

use App\Entity\TypeExpPro;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TypeExpPro|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypeExpPro|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypeExpPro[]    findAll()
 * @method TypeExpPro[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypeExpProRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TypeExpPro::class);
    }

    // /**
    //  * @return TypeExpPro[] Returns an array of TypeExpPro objects
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
    public function findOneBySomeField($value): ?TypeExpPro
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
