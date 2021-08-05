<?php

namespace App\DataFixtures;

use App\Entity\Cover;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;


class CoverFixtures extends Fixture
{
    /**
     * @inheritDoc
     */
    public function load(ObjectManager $manager)
    {
        $json = json_decode(file_get_contents('resources/covers.json'));

        foreach ($json as $item) {
            $element = new Cover();
            $element
              ->setUrl(strval($item->image_id))
              ->setWidth($item->width)
              ->setHeight($item->height);

            $manager->persist($element);
            $this->addReference("cover".strval($item->id), $element);
        }

        $manager->flush();
    }
}