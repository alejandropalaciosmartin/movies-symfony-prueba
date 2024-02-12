<?php

namespace App\Entity;

use App\Repository\MovieRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

#[ORM\Entity(repositoryClass: MovieRepository::class)]
#[UniqueEntity(fields: ['title'], message: 'Este título ya está en uso')]
class Movie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 120)]
    #[Assert\NotBlank(message: 'El título no puede estar vacío')]
	#[Assert\Length(max: 120, maxMessage: 'El título no puede tener más de {{ limit }} caracteres')]
    private ?string $title = null;

    #[ORM\Column(length: 2000)]
    #[Assert\NotBlank(message: 'La descripción no puede estar vacía')]
	#[Assert\Length(max: 2000, maxMessage: 'La descripción no puede tener más de {{ limit }} caracteres')]
    private ?string $description = null;

    #[ORM\Column]
    #[Assert\NotBlank(message: 'La duración no puede estar vacía')]
	#[Assert\Positive(message: 'La duración debe de ser un número positivo')]
    private ?int $runtime = null;

    #[ORM\Column]
    #[Assert\NotBlank(message: 'El presupuesto no puede estar vacío')]
	#[Assert\Positive(message: 'El presupuesto debe de ser un número positivo')]
    private ?int $budget = null;

    #[ORM\Column(length: 250)]
    #[Assert\NotBlank(message: 'El cartel no puede estar vacío')]
	#[Assert\Length(max: 255, maxMessage: 'El cartel no puede tener más de {{ limit }} caracteres')]
    private ?string $poster = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    #[Assert\NotBlank(message: 'La fecha de estreno no puede estar vacía')]
	#[Assert\Type(type: 'DateTimeInterface', message: 'La fecha de estreno debe ser una fecha válida')]
    private ?\DateTimeInterface $release_date = null;

    #[ORM\ManyToOne(inversedBy: 'movies')]
    #[ORM\JoinColumn(nullable: false)]
    #[Assert\NotBlank(message: 'El género no puede estar vacío')]
    private ?Genre $genre = null;

    #[ORM\ManyToOne(inversedBy: 'movies')]
    #[ORM\JoinColumn(nullable: false)]
    #[Assert\NotBlank(message: 'El país no puede estar vacío')]
    private ?Country $country = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getRuntime(): ?int
    {
        return $this->runtime;
    }

    public function setRuntime(int $runtime): static
    {
        $this->runtime = $runtime;

        return $this;
    }

    public function getBudget(): ?int
    {
        return $this->budget;
    }

    public function setBudget(int $budget): static
    {
        $this->budget = $budget;

        return $this;
    }

    public function getPoster(): ?string
    {
        return $this->poster;
    }

    public function setPoster(string $poster): static
    {
        $this->poster = $poster;

        return $this;
    }

    public function getReleaseDate(): ?\DateTimeInterface
    {
        return $this->release_date;
    }

    public function setReleaseDate(?\DateTimeInterface $release_date): static
    {
        $this->release_date = $release_date;

        return $this;
    }

    public function getGenre(): ?Genre
    {
        return $this->genre;
    }

    public function setGenre(?Genre $genre): static
    {
        $this->genre = $genre;

        return $this;
    }

    public function getCountry(): ?Country
    {
        return $this->country;
    }

    public function setCountry(?Country $country): static
    {
        $this->country = $country;

        return $this;
    }
}
