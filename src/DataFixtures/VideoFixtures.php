<?php

namespace App\DataFixtures;

use App\Entity\Video;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;


class VideoFixtures extends Fixture
{
    /**
     * @inheritDoc
     */
    public function load(ObjectManager $manager)
    {
        $json = json_decode(file_get_contents('resources/videos.json'));

        foreach ($json as $item) {
            $element = new Video();
            $element
              ->setName(strval($item->name))
              ->setUrl(strval(strval($item->video_id)));

            $manager->persist($element);
            $this->addReference("video".strval($item->id), $element);
        }

        $manager->flush();
    }
}