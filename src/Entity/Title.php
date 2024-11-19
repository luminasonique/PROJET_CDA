<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\TitleRepository;
use App\Entity\Traits\DateTraits;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    /**
     * @var Collection<int, Title>
     */
    #[ORM\ManyToMany(targetEntity: Title::class, mappedBy: 'relation')]
    private Collection $titles;

    public function __construct()
    {
        $this->titles = new ArrayCollection();
    }

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

    /**
     * @return Collection<int, Title>
     */
    public function getTitles(): Collection
    {
        return $this->titles;
    }

    public function addTitle(Title $title): static
    {
        if (!$this->titles->contains($title)) {
            $this->titles->add($title);
            $title->addRelation($this);
        }

        return $this;
    }

    public function removeTitle(Title $title): static
    {
        if ($this->titles->removeElement($title)) {
            $title->removeRelation($this);
        }

        return $this;
    }
}