<?php

namespace App\DataFixtures;

use App\Entity\Genre;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;


class GenreFixtures extends Fixture
{
    /**
     * @inheritDoc
     */
    public function load(ObjectManager $manager)
    {
        $json = json_decode(file_get_contents('resources/genres.json'));

        foreach ($json as $item) {
            $element = new Genre();
            $element
                    ->setName(strval($item->name))
                    ->setSlug(strval($item->slug));

            $manager->persist($element);
            $this->addReference("genre".strval($item->id), $element);
        }

        $manager->flush();
    }
}