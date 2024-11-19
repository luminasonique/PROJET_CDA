<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\UserRepository;
use App\Entity\Traits\DateTraits;
use App\Entity\Traits\EnumTraits;
use App\Enum\Status; // Import de l'énumération
use Symfony\Component\Serializer\Annotation\Groups;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ApiResource]
class User
{
    use DateTraits;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['user_list', 'user_details'])]  // Group added here for serializing the id in both lists and details
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    #[Groups(['user_list', 'user_details'])]  // Added to both lists and details groups
    private ?string $first_name = null;

    #[ORM\Column(length: 100)]
    #[Groups(['user_list', 'user_details'])]  // Added to both lists and details groups
    private ?string $last_name = null;

    #[ORM\Column(length: 100)]
    #[Groups(['user_list', 'user_details'])]  // Added to both lists and details groups
    private ?string $email = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(['user_details'])]  // Only included in the user_details group
    private ?string $password = null;

    #[ORM\Column(nullable: true)]
    #[Groups(['user_list', 'user_details'])]  // Added to both lists and details groups
    private ?array $roles = [];

    #[ORM\Column(type: 'string', enumType: Status::class, nullable: true)]
    #[Groups(['user_list', 'user_details'])]  // Added to both lists and details groups
    private ?Status $status = null;

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
        $this->roles = $roles;

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
}