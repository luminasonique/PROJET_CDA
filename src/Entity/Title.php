<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\TitleRepository;
use App\Entity\Traits\DateTraits;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TitleRepository::class)]
#[ORM\HasLifecycleCallbacks]  // Enable lifecycle callbacks
#[ApiResource]
class Title
{
    use DateTraits;
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

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