<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Entity\Traits\DateTraits;
use App\Enum\Confirmed;
use App\Repository\CourseRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CourseRepository::class)]
#[ORM\HasLifecycleCallbacks]
#[ApiResource]
class Course
{
    use DateTraits;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $title = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(type: Types::SMALLINT, nullable: true)]
    private ?int $duration = null;

    #[ORM\Column(type: "string", enumType: Confirmed::class, nullable: true)]
    private ?Confirmed $status = null;

    // Corrected relationship with the 'Formation' entity
    #[ORM\ManyToOne(targetEntity: Formations::class, inversedBy: 'courses')]
    private ?Formations $formation = null;  // Renamed for clarity

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getDuration(): ?int
    {
        return $this->duration;
    }

    public function setDuration(?int $duration): static
    {
        $this->duration = $duration;

        return $this;
    }

    public function getStatus(): ?Confirmed
    {
        return $this->status;
    }

    public function setStatus(?Confirmed $status): static
    {
        $this->status = $status;

        return $this;
    }

    public function getRelation(): ?Formation
    {
        return $this->relation;
    }

    public function setRelation(?Formation $relation): static
    {
        $this->relation = $relation;

        return $this;
    }
}