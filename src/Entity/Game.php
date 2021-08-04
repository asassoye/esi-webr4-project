<?php

namespace App\Entity;

use App\Repository\GameRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GameRepository::class)
 */
class Game
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $slug;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $summary;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $storyline;

    /**
     * @ORM\Column(type="integer")
     */
    private $category;

    /**
     * @ORM\ManyToMany(targetEntity=Genre::class, inversedBy="games")
     */
    private $genres;

    /**
     * @ORM\ManyToMany(targetEntity=Platform::class, inversedBy="games")
     */
    private $platforms;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $releaseDate;

    /**
     * @ORM\ManyToMany(targetEntity=AgeRating::class, inversedBy="games")
     */
    private $ageRatings;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $rating;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $ratingCount;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $aggregatedRating;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $aggregatedRatingCount;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $totalRating;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $totalRatingCount;

    /**
     * @ORM\OneToOne(targetEntity=Cover::class, inversedBy="game", cascade={"persist", "remove"})
     */
    private $cover;

    /**
     * @ORM\OneToMany(targetEntity=Screenshot::class, mappedBy="game")
     */
    private $screenshots;

    /**
     * @ORM\OneToMany(targetEntity=Video::class, mappedBy="game")
     */
    private $videos;

    /**
     * @ORM\OneToMany(targetEntity=Website::class, mappedBy="game")
     */
    private $websites;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updatedAt;

    public function __construct()
    {
        $this->genres = new ArrayCollection();
        $this->platforms = new ArrayCollection();
        $this->ageRatings = new ArrayCollection();
        $this->screenshots = new ArrayCollection();
        $this->videos = new ArrayCollection();
        $this->websites = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getSummary(): ?string
    {
        return $this->summary;
    }

    public function setSummary(?string $summary): self
    {
        $this->summary = $summary;

        return $this;
    }

    public function getStoryline(): ?string
    {
        return $this->storyline;
    }

    public function setStoryline(?string $storyline): self
    {
        $this->storyline = $storyline;

        return $this;
    }

    public function getCategory(): ?int
    {
        return $this->category;
    }

    public function setCategory(int $category): self
    {
        $this->category = $category;

        return $this;
    }

    /**
     * @return Collection|Genre[]
     */
    public function getGenres(): Collection
    {
        return $this->genres;
    }

    public function addGenre(Genre $genre): self
    {
        if (!$this->genres->contains($genre)) {
            $this->genres[] = $genre;
        }

        return $this;
    }

    public function removeGenre(Genre $genre): self
    {
        $this->genres->removeElement($genre);

        return $this;
    }

    /**
     * @return Collection|Platform[]
     */
    public function getPlatforms(): Collection
    {
        return $this->platforms;
    }

    public function addPlatform(Platform $platform): self
    {
        if (!$this->platforms->contains($platform)) {
            $this->platforms[] = $platform;
        }

        return $this;
    }

    public function removePlatform(Platform $platform): self
    {
        $this->platforms->removeElement($platform);

        return $this;
    }

    public function getReleaseDate(): ?\DateTimeInterface
    {
        return $this->releaseDate;
    }

    public function setReleaseDate(?\DateTimeInterface $releaseDate): self
    {
        $this->releaseDate = $releaseDate;

        return $this;
    }

    /**
     * @return Collection|AgeRating[]
     */
    public function getAgeRatings(): Collection
    {
        return $this->ageRatings;
    }

    public function addAgeRating(AgeRating $ageRating): self
    {
        if (!$this->ageRatings->contains($ageRating)) {
            $this->ageRatings[] = $ageRating;
        }

        return $this;
    }

    public function removeAgeRating(AgeRating $ageRating): self
    {
        $this->ageRatings->removeElement($ageRating);

        return $this;
    }

    public function getRating(): ?float
    {
        return $this->rating;
    }

    public function setRating(?float $rating): self
    {
        $this->rating = $rating;

        return $this;
    }

    public function getRatingCount(): ?int
    {
        return $this->ratingCount;
    }

    public function setRatingCount(?int $ratingCount): self
    {
        $this->ratingCount = $ratingCount;

        return $this;
    }

    public function getAggregatedRating(): ?float
    {
        return $this->aggregatedRating;
    }

    public function setAggregatedRating(?float $aggregatedRating): self
    {
        $this->aggregatedRating = $aggregatedRating;

        return $this;
    }

    public function getAggregatedRatingCount(): ?int
    {
        return $this->aggregatedRatingCount;
    }

    public function setAggregatedRatingCount(?int $aggregatedRatingCount): self
    {
        $this->aggregatedRatingCount = $aggregatedRatingCount;

        return $this;
    }

    public function getTotalRating(): ?float
    {
        return $this->totalRating;
    }

    public function setTotalRating(?float $totalRating): self
    {
        $this->totalRating = $totalRating;

        return $this;
    }

    public function getTotalRatingCount(): ?int
    {
        return $this->totalRatingCount;
    }

    public function setTotalRatingCount(?int $totalRatingCount): self
    {
        $this->totalRatingCount = $totalRatingCount;

        return $this;
    }

    public function getCover(): ?Cover
    {
        return $this->cover;
    }

    public function setCover(?Cover $cover): self
    {
        $this->cover = $cover;

        return $this;
    }

    /**
     * @return Collection|Screenshot[]
     */
    public function getScreenshots(): Collection
    {
        return $this->screenshots;
    }

    public function addScreenshot(Screenshot $screenshot): self
    {
        if (!$this->screenshots->contains($screenshot)) {
            $this->screenshots[] = $screenshot;
            $screenshot->setGame($this);
        }

        return $this;
    }

    public function removeScreenshot(Screenshot $screenshot): self
    {
        if ($this->screenshots->removeElement($screenshot)) {
            // set the owning side to null (unless already changed)
            if ($screenshot->getGame() === $this) {
                $screenshot->setGame(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Video[]
     */
    public function getVideos(): Collection
    {
        return $this->videos;
    }

    public function addVideo(Video $video): self
    {
        if (!$this->videos->contains($video)) {
            $this->videos[] = $video;
            $video->setGame($this);
        }

        return $this;
    }

    public function removeVideo(Video $video): self
    {
        if ($this->videos->removeElement($video)) {
            // set the owning side to null (unless already changed)
            if ($video->getGame() === $this) {
                $video->setGame(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Website[]
     */
    public function getWebsites(): Collection
    {
        return $this->websites;
    }

    public function addWebsite(Website $website): self
    {
        if (!$this->websites->contains($website)) {
            $this->websites[] = $website;
            $website->setGame($this);
        }

        return $this;
    }

    public function removeWebsite(Website $website): self
    {
        if ($this->websites->removeElement($website)) {
            // set the owning side to null (unless already changed)
            if ($website->getGame() === $this) {
                $website->setGame(null);
            }
        }

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }
}
