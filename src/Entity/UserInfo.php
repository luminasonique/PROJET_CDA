<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\UserInfoRepository;
use App\Entity\Traits\DateTraits;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserInfoRepository::class)]
#[ApiResource]
class UserInfo
{
    use DateTraits; // Applying the trait

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $user_cv = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $user_linkedin = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $user_git = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $user_description = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserCv(): ?string
    {
        return $this->user_cv;
    }

    public function setUserCv(?string $user_cv): static
    {
        $this->user_cv = $user_cv;

        return $this;
    }

    public function getUserLinkedin(): ?string
    {
        return $this->user_linkedin;
    }

    public function setUserLinkedin(?string $user_linkedin): static
    {
        $this->user_linkedin = $user_linkedin;

        return $this;
    }

    public function getUserGit(): ?string
    {
        return $this->user_git;
    }

    public function setUserGit(?string $user_git): static
    {
        $this->user_git = $user_git;

        return $this;
    }

    public function getUserDescription(): ?string
    {
        return $this->user_description;
    }

    public function setUserDescription(?string $user_description): static
    {
        $this->user_description = $user_description;

        return $this;
    }
}