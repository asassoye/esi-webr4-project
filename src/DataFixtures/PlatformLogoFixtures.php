<?php

namespace App\DataFixtures;

use App\Entity\PlatformLogo;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;


class PlatformLogoFixtures extends Fixture
{
    /**
     * @inheritDoc
     */
    public function load(ObjectManager $manager)
    {
        $json = json_decode(file_get_contents('resources/platform_logos.json'));

        foreach ($json as $item) {
            $element = new PlatformLogo();
            $element
              ->setUrl(strval(strval($item->url)))
              ->setWidth($item->width)
              ->setHeight($item->height);

            $manager->persist($element);
            $this->addReference("platform_logo".strval($item->id), $element);
        }

        $manager->flush();
    }
}