<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\UserRepository;
use App\Entity\Traits\DateTraits;
use App\Entity\Traits\EnumTraits;
use App\Enum\Status; // Import Status enum
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Serializer\Annotation\Groups;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\HasLifecycleCallbacks]
#[ApiResource]
class User
{
    use DateTraits;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['user_list', 'user_details'])]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    #[Groups(['user_list', 'user_details'])]
    private ?string $first_name = null;

    #[ORM\Column(length: 100)]
    #[Groups(['user_list', 'user_details'])]
    private ?string $last_name = null;

    #[ORM\Column(length: 100)]
    #[Groups(['user_list', 'user_details'])]
    private ?string $email = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(['user_details'])]
    private ?string $password = null;

    #[ORM\Column(nullable: true)]
    #[Groups(['user_list', 'user_details'])]
    private ?array $roles = [];

    #[ORM\Column(type: 'string', enumType: Status::class, nullable: true)] // Enum used here
    #[Groups(['user_list', 'user_details'])]
    private ?Status $status = null;

    #[ORM\ManyToMany(targetEntity: Degree::class, inversedBy: 'users')]
    private Collection $relation;

    #[ORM\OneToOne(mappedBy: 'relation', cascade: ['persist', 'remove'])]
    private ?Adress $adress = null;

    #[ORM\ManyToMany(targetEntity: UserModulePlaning::class, mappedBy: 'relation')]
    private Collection $userModulePlanings;

    public function __construct()
    {
        $this->relation = new ArrayCollection();
        $this->userModulePlanings = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->first_name;
    }

    public function setFirstName(string $first_name): static
    {
        $this->first_name = $first_name;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->last_name;
    }

    public function setLastName(string $last_name): static
    {
        $this->last_name = $last_name;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(?string $password): static
    {
        $this->password = $password;

        return $this;
    }

    public function getRoles(): ?array
    {
        return $this->roles;
    }

    public function setRoles(?array $roles): static
    {
        // Prevent overriding default roles
        if (empty(array_diff($roles, ['ROLE_STUDENT', 'ROLE_TEACHER', 'ROLE_ADMIN', 'ROLE_USER']))) {
            $this->roles = $roles;
        }

        return $this;
    }

    public function getStatus(): ?Status
    {
        return $this->status;
    }

    public function setStatus(?Status $status): static
    {
        $this->status = $status;

        return $this;
    }

    public function getRelation(): Collection
    {
        return $this->relation;
    }

    public function addRelation(Degree $relation): static
    {
        if (!$this->relation->contains($relation)) {
            $this->relation->add($relation);
        }

        return $this;
    }

    public function removeRelation(Degree $relation): static
    {
        $this->relation->removeElement($relation);

        return $this;
    }

    public function getAdress(): ?Adress
    {
        return $this->adress;
    }

    public function setAdress(?Adress $adress): static
    {
        if ($adress === null && $this->adress !== null) {
            $this->adress->setRelation(null);
        }

        if ($adress !== null && $adress->getRelation() !== $this) {
            $adress->setRelation($this);
        }

        $this->adress = $adress;

        return $this;
    }

    public function getUserModulePlanings(): Collection
    {
        return $this->userModulePlanings;
    }

    public function addUserModulePlaning(UserModulePlaning $userModulePlaning): static
    {
        if (!$this->userModulePlanings->contains($userModulePlaning)) {
            $this->userModulePlanings->add($userModulePlaning);
            $userModulePlaning->addRelation($this);
        }

        return $this;
    }

    public function removeUserModulePlaning(UserModulePlaning $userModulePlaning): static
    {
        if ($this->userModulePlanings->removeElement($userModulePlaning)) {
            $userModulePlaning->removeRelation($this);
        }

        return $this;
    }
}