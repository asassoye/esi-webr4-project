<?php

namespace App\DataFixtures;

use App\Entity\AgeRating;
use App\Entity\Cover;
use App\Entity\Game;
use App\Entity\Genre;
use App\Entity\Platform;
use App\Entity\Screenshot;
use App\Entity\Video;
use App\Entity\Website;
use DateTimeImmutable;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

@ini_set('memory_limit', -1);

class GameFixtures extends Fixture implements DependentFixtureInterface
{
    /**
     * @inheritDoc
     */
    public function load(ObjectManager $manager)
    {
        $json = json_decode(file_get_contents('resources/games.json'));

        foreach ($json as $item) {
            $element = new Game();
            $element
              ->setName(strval($item->name))
              ->setSlug(strval($item->slug))
              ->setCategory($item->category);

            if (isset($item->summary)) {
                $element->setSummary(strval($item->summary));
            }

            if (isset($item->storyline)) {
                $element->setStoryline(strval($item->storyline));
            }

            if (isset($item->genres)) {
                foreach ($item->genres as $genre) {
                    $genre = $this->getReference("genre".strval($genre));
                    if ($genre instanceof Genre) {
                        $element->addGenre($genre);
                    }
                }
            }

            if (isset($item->platforms)) {
                foreach ($item->platforms as $platform) {
                    $platform = $this->getReference("platform".strval($platform));
                    if ($platform instanceof Platform) {
                        $element->addPlatform($platform);
                    }
                }
            }

            if (isset($item->first_release_date)) {
                $element->setReleaseDate((new DateTimeImmutable())->setTimestamp(strval($item->first_release_date)));
            }

            if (isset($item->age_ratings)) {
                foreach ($item->age_ratings as $ageRating) {
                    $ageRating = $this->getReference("age_rating".strval($ageRating));
                    if ($ageRating instanceof AgeRating) {
                        $element->addAgeRating($ageRating);
                    }
                }
            }

            if (isset($item->rating)) {
                $element->setRating($item->rating);
            }

            if (isset($item->rating_count)) {
                $element->setRatingCount($item->rating_count);
            }

            if (isset($item->aggregated_rating)) {
                $element->setAggregatedRating($item->aggregated_rating);
            }

            if (isset($item->aggregated_rating_count)) {
                $element->setAggregatedRatingCount($item->aggregated_rating_count);
            }

            if (isset($item->total_rating)) {
                $element->setTotalRating($item->total_rating);
            }

            if (isset($item->total_rating_count)) {
                $element->setTotalRatingCount($item->total_rating_count);
            }

            if (isset($item->cover)) {
                $cover = $this->getReference("cover".strval($item->cover));
                if ($cover instanceof Cover) {
                    $element->setCover($cover);
                }
            }

            if (isset($item->screenshots)) {
                foreach ($item->screenshots as $screenshot) {
                    $screenshot = $this->getReference("screenshot".strval($screenshot));
                    if ($screenshot instanceof Screenshot) {
                        $element->addScreenshot($screenshot);
                    }
                }
            }

            if (isset($item->videos)) {
                foreach ($item->videos as $video) {
                    $video = $this->getReference("video".strval($video));
                    if ($video instanceof Video) {
                        $element->addVideo($video);
                    }
                }
            }

            if (isset($item->websites)) {
                foreach ($item->websites as $website) {
                    $website = $this->getReference("website".strval($website));
                    if ($website instanceof Website) {
                        $element->addWebsite($website);
                    }
                }
            }

            if (isset($item->created_at)) {
                $element->setCreatedAt((new DateTimeImmutable())->setTimestamp(strval($item->created_at)));
            }

            if (isset($item->updated_at)) {
                $element->setUpdatedAt((new DateTimeImmutable())->setTimestamp(strval($item->updated_at)));
            }

            $manager->persist($element);
            $this->addReference("game".strval($item->id), $element);
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return array(
          AgeRatingFixtures::class,
          CoverFixtures::class,
          GenreFixtures::class,
          PlatformFixtures::class,
          ScreenshotFixtures::class,
          VideoFixtures::class,
          WebsiteFixtures::class,
        );
    }
}