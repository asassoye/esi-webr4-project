<?php

namespace App\DataFixtures;

use App\Entity\AgeRating;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

@ini_set('memory_limit', -1);

class AgeRatingFixtures extends Fixture
{
    /**
     * @inheritDoc
     */
    public function load(ObjectManager $manager)
    {
        $json = json_decode(file_get_contents('resources/age_ratings.json'));

        foreach ($json as $item) {
            $element = new AgeRating();
            $element
              ->setCategory($item->category)
              ->setRating($item->rating);

            if (isset($item->synopsis)) {
                $element->setSynopsis(strval($item->synopsis));
            }

            $manager->persist($element);
            $this->addReference("age_rating".strval($item->id), $element);
        }

        $manager->flush();
    }
}