<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\UserModulePlaningRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserModulePlaningRepository::class)]
#[ApiResource]
class UserModulePlaning
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $start_date = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $end_date = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $ongoing_status = null;

    /**
     * @var Collection<int, User>
     */
    #[ORM\ManyToMany(targetEntity: User::class, inversedBy: 'userModulePlanings')]
    private Collection $relation;

    /**
     * @var Collection<int, Module>
     */
    #[ORM\ManyToMany(targetEntity: Module::class, mappedBy: 'relation')]
    private Collection $modules;

    public function __construct()
    {
        $this->relation = new ArrayCollection();
        $this->modules = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStartDate(): ?\DateTimeInterface
    {
        return $this->start_date;
    }

    public function setStartDate(?\DateTimeInterface $start_date): static
    {
        $this->start_date = $start_date;

        return $this;
    }

    public function getEndDate(): ?\DateTimeInterface
    {
        return $this->end_date;
    }

    public function setEndDate(?\DateTimeInterface $end_date): static
    {
        $this->end_date = $end_date;

        return $this;
    }

    public function getOngoingStatus(): ?string
    {
        return $this->ongoing_status;
    }

    public function setOngoingStatus(?string $ongoing_status): static
    {
        $this->ongoing_status = $ongoing_status;

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getRelation(): Collection
    {
        return $this->relation;
    }

    public function addRelation(User $relation): static
    {
        if (!$this->relation->contains($relation)) {
            $this->relation->add($relation);
        }

        return $this;
    }

    public function removeRelation(User $relation): static
    {
        $this->relation->removeElement($relation);

        return $this;
    }

    /**
     * @return Collection<int, Module>
     */
    public function getModules(): Collection
    {
        return $this->modules;
    }

    public function addModule(Module $module): static
    {
        if (!$this->modules->contains($module)) {
            $this->modules->add($module);
            $module->addRelation($this);
        }

        return $this;
    }

    public function removeModule(Module $module): static
    {
        if ($this->modules->removeElement($module)) {
            $module->removeRelation($this);
        }

        return $this;
    }
}
