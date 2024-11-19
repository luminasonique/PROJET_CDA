<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\CourseRepository;
use App\Entity\Traits\DateTraits;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Enum\Confirmed; // Add the use statement for the enum

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

    // Change status to use the Confirmed enum
    #[ORM\Column(type: "string", enumType: Confirmed::class, nullable: true)]
    private ?Confirmed $status = null;

    #[ORM\ManyToOne(inversedBy: 'courses')]
    private ?formations $relation = null;

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

    public function getRelation(): ?formations
    {
        return $this->relation;
    }

    public function setRelation(?formations $relation): static
    {
        $this->relation = $relation;

        return $this;
    }
}