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

    public function popular(): array
    {
        $qb = $this->createQueryBuilder("g")
          ->where('YEAR(g.releaseDate) > YEAR(NOW()) - 2')
          ->andWhere('g.aggregatedRatingCount > 5')
          ->andWhere('g.ratingCount > 50')
          ->orderBy("g.totalRating", "DESC")
          ->setMaxResults(18);

        $query = $qb->getQuery();

        return $query->execute();
    }

    public function favorites(): array
    {
        $qb = $this->createQueryBuilder("g")
          ->where("g.slug = 'final-fantasy-ix'")
          ->orWhere("g.slug = 'final-fantasy-xv'")
          ->orWhere("g.slug = 'final-fantasy-x'")
          ->orWhere("g.slug = 'final-fantasy-vii'")
          ->orWhere("g.slug = 'final-fantasy-viii'")
          ->orWhere("g.slug = 'final-fantasy-vii-remake'")
          ->orWhere("g.slug = 'kingdom-hearts'")
          ->orWhere("g.slug = 'kingdom-hearts-iii'")
          ->orWhere("g.slug = 'kingdom-hearts-ii'")
          ->orWhere("g.slug = 'the-last-guardian'")
          ->orWhere("g.slug = 'ratchet-and-clank'")
          ->orWhere("g.slug = 'hollow-knight'")
          ->orWhere("g.slug = 'celeste'")
          ->orWhere("g.slug = 'no-man-s-sky'")
          ->orWhere("g.slug = 'assassin-s-creed-ii'")
          ->orWhere("g.slug = 'god-of-war--1'")
          ->orWhere("g.slug = 'the-elder-scrolls-v-skyrim-special-edition'")
          ->orWhere("g.slug = 'fallout-4'")
          ->orWhere("g.slug = 'portal'")
          ->orWhere("g.slug = 'psychonauts'")
          ->orWhere("g.slug = 'oddworld-abe-s-oddysee'")
          ->orWhere("g.slug = 'crash-bandicoot-n-sane-trilogy'")
          ->orWhere("g.slug = 'portal-2'")
          ->orWhere("g.slug = 'inside'")
          ->orderBy("g.totalRating", "DESC");

        $query = $qb->getQuery();

        return $query->execute();
    }
}
