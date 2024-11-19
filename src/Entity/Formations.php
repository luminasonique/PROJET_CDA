<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\FormationsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FormationsRepository::class)]
#[ApiResource]
class Formations
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $date_session = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $satus_actif = null;

    /**
     * @var Collection<int, Course>
     */
    #[ORM\OneToMany(targetEntity: Course::class, mappedBy: 'relation')]
    private Collection $courses;

    public function __construct()
    {
        $this->courses = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getDateSession(): ?\DateTimeInterface
    {
        return $this->date_session;
    }

    public function setDateSession(?\DateTimeInterface $date_session): static
    {
        $this->date_session = $date_session;

        return $this;
    }

    public function getSatusActif(): ?string
    {
        return $this->satus_actif;
    }

    public function setSatusActif(?string $satus_actif): static
    {
        $this->satus_actif = $satus_actif;

        return $this;
    }

    /**
     * @return Collection<int, Course>
     */
    public function getCourses(): Collection
    {
        return $this->courses;
    }

    public function addCourse(Course $course): static
    {
        if (!$this->courses->contains($course)) {
            $this->courses->add($course);
            $course->setRelation($this);
        }

        return $this;
    }

    public function removeCourse(Course $course): static
    {
        if ($this->courses->removeElement($course)) {
            // set the owning side to null (unless already changed)
            if ($course->getRelation() === $this) {
                $course->setRelation(null);
            }
        }

        return $this;
    }
}
