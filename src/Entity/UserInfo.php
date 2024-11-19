<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ApiResource]
class UserInfo
{
    // Primary Key field
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    // Other fields
    #[ORM\Column(type: "text", nullable: true)]
    private ?string $user_cv = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $user_linkedin = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $user_git = null;

    // Getter and Setter for id
    public function getId(): ?int
    {
        return $this->id;
    }

    // Getter and Setter for user_cv
    public function getUserCv(): ?string
    {
        return $this->user_cv;
    }

    public function setUserCv(?string $user_cv): self
    {
        $this->user_cv = $user_cv;

        return $this;
    }

    // Getter and Setter for user_linkedin
    public function getUserLinkedin(): ?string
    {
        return $this->user_linkedin;
    }

    public function setUserLinkedin(?string $user_linkedin): self
    {
        $this->user_linkedin = $user_linkedin;

        return $this;
    }

    // Getter and Setter for user_git
    public function getUserGit(): ?string
    {
        return $this->user_git;
    }

    public function setUserGit(?string $user_git): self
    {
        $this->user_git = $user_git;

        return $this;
    }
}