<?php

namespace App\Entity;

use App\Repository\ActorRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\UX\Turbo\Attribute\Broadcast;

#[ORM\Entity(repositoryClass: ActorRepository::class)]
#[Broadcast]
class Actor
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $actor_picture = null;

    #[ORM\Column(length: 255)]
    private ?string $actor_name = null;

    #[ORM\ManyToMany(targetEntity: Movie::class, inversedBy: 'actors')]
    private Collection $movies;

    public function __construct()
    {
        $this->movies = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getActorPicture(): ?string
    {
        return $this->actor_picture;
    }

    public function setActorPicture(string $actor_picture): static
    {
        $this->actor_picture = $actor_picture;

        return $this;
    }

    public function getActorName(): ?string
    {
        return $this->actor_name;
    }

    public function setActorName(string $actor_name): static
    {
        $this->actor_name = $actor_name;

        return $this;
    }

    /**
     * @return Collection<int, Movie>
     */
    public function getMovies(): Collection
    {
        return $this->movies;
    }

    public function addMovie(Movie $movie): static
    {
        if (!$this->movies->contains($movie)) {
            $this->movies->add($movie);
        }

        return $this;
    }

    public function removeMovie(Movie $movie): static
    {
        $this->movies->removeElement($movie);

        return $this;
    }
}
