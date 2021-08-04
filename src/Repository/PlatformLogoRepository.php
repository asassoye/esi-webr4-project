<?php

namespace App\Repository;

use App\Entity\PlatformLogo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PlatformLogo|null find($id, $lockMode = null, $lockVersion = null)
 * @method PlatformLogo|null findOneBy(array $criteria, array $orderBy = null)
 * @method PlatformLogo[]    findAll()
 * @method PlatformLogo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PlatformLogoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PlatformLogo::class);
    }

    // /**
    //  * @return PlatformLogo[] Returns an array of PlatformLogo objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PlatformLogo
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
