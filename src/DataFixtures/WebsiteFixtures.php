<?php

namespace App\DataFixtures;

use App\Entity\Website;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;


class WebsiteFixtures extends Fixture
{
    /**
     * @inheritDoc
     */
    public function load(ObjectManager $manager)
    {
        $json = json_decode(file_get_contents('resources/websites.json'));

        foreach ($json as $item) {
            $element = new Website();
            $element
              ->setCategory($item->category)
              ->setTrusted($item->trusted)
              ->setUrl(strval(strval($item->url)));

            $manager->persist($element);
            $this->addReference("website".strval($item->id), $element);
        }

        $manager->flush();
    }
}