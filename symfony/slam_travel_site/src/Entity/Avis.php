<?php

namespace App\Entity;

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
}
