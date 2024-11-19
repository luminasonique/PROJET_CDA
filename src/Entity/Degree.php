<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\DegreeRepository;
use App\Entity\Traits\DateTraits;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DegreeRepository::class)]
#[ORM\HasLifecycleCallbacks]  // Enable lifecycle callbacks
#[ApiResource]
class Degree
{
    use DateTraits;
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $level = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $speciality = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $obtained_at = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $status = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getLevel(): ?string
    {
        return $this->level;
    }

    public function setLevel(?string $level): static
    {
        $this->level = $level;

        return $this;
    }

    public function getSpeciality(): ?string
    {
        return $this->speciality;
    }

    public function setSpeciality(?string $speciality): static
    {
        $this->speciality = $speciality;

        return $this;
    }

    public function getObtainedAt(): ?\DateTimeImmutable
    {
        return $this->obtained_at;
    }

    public function setObtainedAt(?\DateTimeImmutable $obtained_at): static
    {
        $this->obtained_at = $obtained_at;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(?string $status): static
    {
        $this->status = $status;

        return $this;
    }
}