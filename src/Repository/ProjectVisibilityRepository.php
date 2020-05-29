<?php

namespace App\Repository;

use App\Entity\ProjectVisibility;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method ProjectVisibility|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProjectVisibility|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProjectVisibility[]    findAll()
 * @method ProjectVisibility[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProjectVisibilityRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProjectVisibility::class);
    }

    // /**
    //  * @return ProjectVisibility[] Returns an array of ProjectVisibility objects
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
    public function findOneBySomeField($value): ?ProjectVisibility
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
