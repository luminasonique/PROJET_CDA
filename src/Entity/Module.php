<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\ModuleRepository;
use App\Entity\Traits\DateTraits;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ModuleRepository::class)]
#[ORM\HasLifecycleCallbacks]
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
    private ?string $repositoryLink = null; // Renamed `repository_link` for camelCase consistency

    #[ORM\Column(type: Types::SMALLINT, nullable: true)]
    private ?int $moduleOrder = null; // Renamed `module_order`

    #[ORM\Column(type: Types::SMALLINT, nullable: true)]
    private ?int $duration = null;

    #[ORM\Column(nullable: true)]
    private ?bool $isUpdated = null; // Renamed `is_updated`

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $status = null;

    #[ORM\ManyToOne(inversedBy: 'modules')] // Updated for correct relation naming
    private ?Rating $rating = null;

 

    public function __construct()
    {
        $this->users = new ArrayCollection();
    }

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
        return $this->repositoryLink;
    }

    public function setRepositoryLink(?string $repositoryLink): static
    {
        $this->repositoryLink = $repositoryLink;

        return $this;
    }

    public function getModuleOrder(): ?int
    {
        return $this->moduleOrder;
    }

    public function setModuleOrder(?int $moduleOrder): static
    {
        $this->moduleOrder = $moduleOrder;

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
        return $this->isUpdated;
    }

    public function setIsUpdated(?bool $isUpdated): static
    {
        $this->isUpdated = $isUpdated;

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

    public function getRating(): ?Rating
    {
        return $this->rating;
    }

    public function setRating(?Rating $rating): static
    {
        $this->rating = $rating;

        return $this;
    }

    /**
     * @return Collection<int, UserModulePlanning>
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(UserModulePlanning $user): static
    {
        if (!$this->users->contains($user)) {
            $this->users->add($user);
        }

        return $this;
    }

    public function removeUser(UserModulePlanning $user): static
    {
        $this->users->removeElement($user);

        return $this;
    }
}