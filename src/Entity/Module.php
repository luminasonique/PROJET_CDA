<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\ModuleRepository;
use App\Entity\Traits\DateTraits;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ModuleRepository::class)]
#[ORM\HasLifecycleCallbacks]  // Enable lifecycle callbacks
#[ApiResource]
class Module
{
    use DateTraits;
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $content = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $repository_link = null;

    #[ORM\Column(type: Types::SMALLINT, nullable: true)]
    private ?int $module_order = null;

    #[ORM\Column(type: Types::SMALLINT, nullable: true)]
    private ?int $duration = null;

    #[ORM\Column(nullable: true)]
    private ?bool $is_updated = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $status = null;

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

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(?string $content): static
    {
        $this->content = $content;

        return $this;
    }

    public function getRepositoryLink(): ?string
    {
        return $this->repository_link;
    }

    public function setRepositoryLink(?string $repository_link): static
    {
        $this->repository_link = $repository_link;

        return $this;
    }

    public function getModuleOrder(): ?int
    {
        return $this->module_order;
    }

    public function setModuleOrder(?int $module_order): static
    {
        $this->module_order = $module_order;

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

    public function isUpdated(): ?bool
    {
        return $this->is_updated;
    }

    public function setUpdated(?bool $is_updated): static
    {
        $this->is_updated = $is_updated;

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