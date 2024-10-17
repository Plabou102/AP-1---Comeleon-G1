<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use App\Repository\AvisRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AvisRepository::class)]
class Avis
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $auteuravis = null;

    #[ORM\Column(length: 255)]
    private ?string $descriptionavis = null;

    #[ORM\Column]
    private ?int $noteavis = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateavis = null;

    #[ORM\ManyToOne(targetEntity: Utilisateur::class)]
    #[ORM\JoinColumn(name: "user_id", referencedColumnName: "id", nullable: false, onDelete: "CASCADE")]
    private ?Utilisateur $user = null; 

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAuteuravis(): ?string
    {
        return $this->auteuravis;
    }

    public function setAuteuravis(string $auteuravis): static
    {
        $this->auteuravis = $auteuravis;

        return $this;
    }

    public function getDescriptionavis(): ?string
    {
        return $this->descriptionavis;
    }

    public function setDescriptionavis(string $descriptionavis): static
    {
        $this->descriptionavis = $descriptionavis;

        return $this;
    }

    public function getNoteavis(): ?int
    {
        return $this->noteavis;
    }

    public function setNoteavis(int $noteavis): static
    {
        $this->noteavis = $noteavis;

        return $this;
    }

    public function getDateavis(): ?\DateTimeInterface
    {
        return $this->dateavis;
    }

    public function setDateavis(\DateTimeInterface $dateavis): static
    {
        $this->dateavis = $dateavis;

        return $this;
    }

    public function getUser(): ?Utilisateur
    {
        return $this->user;
    }

    public function setUser(?Utilisateur $user): static
    {
        $this->user = $user;

        return $this;
    }
}

