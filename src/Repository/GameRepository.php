<?php

namespace App\Repository;

use App\Entity\Game;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Game|null find($id, $lockMode = null, $lockVersion = null)
 * @method Game|null findOneBy(array $criteria, array $orderBy = null)
 * @method Game[]    findAll()
 * @method Game[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GameRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Game::class);
    }

    public function search(string $query): array
    {
        $qb = $this->createQueryBuilder("g")
          ->where('g.name LIKE :query')
          ->setParameter('query', '%'.$query.'%')
          ->orderBy('g.releaseDate', 'DESC')
          ->setMaxResults(10);

        $query = $qb->getQuery();

        return $query->execute();
    }
}
