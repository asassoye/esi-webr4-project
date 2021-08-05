<?php

namespace App\DataFixtures;

use App\Entity\Screenshot;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;


class ScreenshotFixtures extends Fixture
{
    /**
     * @inheritDoc
     */
    public function load(ObjectManager $manager)
    {
        $json = json_decode(file_get_contents('resources/screenshots.json'));

        foreach ($json as $item) {
            $element = new Screenshot();
            $element
              ->setUrl(strval(strval($item->image_id)));

            if (isset($item->width)) {
                $element->setWidth($item->width);
            }

            if (isset($item->height)) {
                $element->setHeight($item->height);
            }

            $manager->persist($element);
            $this->addReference("screenshot".strval($item->id), $element);
        }

        $manager->flush();
    }
}