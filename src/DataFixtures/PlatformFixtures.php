<?php

namespace App\DataFixtures;

use App\Entity\Platform;
use App\Entity\PlatformLogo;
use DateTimeImmutable;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;


class PlatformFixtures extends Fixture implements DependentFixtureInterface
{
    /**
     * @inheritDoc
     */
    public function load(ObjectManager $manager)
    {
        $json = json_decode(file_get_contents('resources/platforms.json'));

        foreach ($json as $item) {
            $element = new Platform();
            $element
              ->setName(strval($item->name))
              ->setSlug(strval($item->slug))
              ->setCreatedAt((new DateTimeImmutable())->setTimestamp(strval($item->created_at)))
              ->setUpdatedAt((new DateTimeImmutable())->setTimestamp(strval($item->updated_at)));

            if (isset($item->abbreviation)) {
                $element->setAbbreviation(strval($item->abbreviation));
            }

            if (isset($item->summary)) {
                $element->setSummary(strval($item->summary));
            }

            if (isset($item->category)) {
                $element->setCategory($item->category);
            }

            if (isset($item->platform_logo)) {
                $logo = $this->getReference("platform_logo".strval($item->platform_logo));
                if ($logo instanceof PlatformLogo) {
                    $element->setLogo($logo);
                }
            }

            $manager->persist($element);
            $this->addReference("platform".strval($item->id), $element);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return array(
          PlatformLogoFixtures::class,
        );
    }
}