<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\RatingRepository;
use App\Entity\Traits\DateTraits;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RatingRepository::class)]
#[ORM\HasLifecycleCallbacks]  // Enable lifecycle callbacks
#[ApiResource]
class Rating
{
    use DateTraits;
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private ?int $supervisor_id = null;

    #[ORM\Column(nullable: true)]
    private ?int $module_id = null;

    #[ORM\Column(nullable: true)]
    private ?int $user_rating_id = null;

    #[ORM\Column(type: Types::SMALLINT, nullable: true)]
    private ?int $score = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $comment = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $status = null;

    /**
     * @var Collection<int, module>
     */
    #[ORM\OneToMany(targetEntity: module::class, mappedBy: 'rating')]
    private Collection $relation;

    public function __construct()
    {
        $this->relation = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSupervisorId(): ?int
    {
        return $this->supervisor_id;
    }

    public function setSupervisorId(?int $supervisor_id): static
    {
        $this->supervisor_id = $supervisor_id;

        return $this;
    }

    public function getModuleId(): ?int
    {
        return $this->module_id;
    }

    public function setModuleId(?int $module_id): static
    {
        $this->module_id = $module_id;

        return $this;
    }

    public function getUserRatingId(): ?int
    {
        return $this->user_rating_id;
    }

    public function setUserRatingId(?int $user_rating_id): static
    {
        $this->user_rating_id = $user_rating_id;

        return $this;
    }

    public function getScore(): ?int
    {
        return $this->score;
    }

    public function setScore(?int $score): static
    {
        $this->score = $score;

        return $this;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(?string $comment): static
    {
        $this->comment = $comment;

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
     * @return Collection<int, module>
     */
    public function getRelation(): Collection
    {
        return $this->relation;
    }

    public function addRelation(module $relation): static
    {
        if (!$this->relation->contains($relation)) {
            $this->relation->add($relation);
            $relation->setRating($this);
        }

        return $this;
    }

    public function removeRelation(module $relation): static
    {
        if ($this->relation->removeElement($relation)) {
            // set the owning side to null (unless already changed)
            if ($relation->getRating() === $this) {
                $relation->setRating(null);
            }
        }

        return $this;
    }
}