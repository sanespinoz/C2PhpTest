<?php

namespace App\Repository;

use App\Entity\EnderecamentoPostal;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method EnderecamentoPostal|null find($id, $lockMode = null, $lockVersion = null)
 * @method EnderecamentoPostal|null findOneBy(array $criteria, array $orderBy = null)
 * @method EnderecamentoPostal[]    findAll()
 * @method EnderecamentoPostal[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EnderecamentoPostalRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EnderecamentoPostal::class);
    }

    // /**
    //  * @return EnderecamentoPostal[] Returns an array of EnderecamentoPostal objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?EnderecamentoPostal
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
