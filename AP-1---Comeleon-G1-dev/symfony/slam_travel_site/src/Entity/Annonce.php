<?php

namespace App\Entity;

use App\Repository\AnnonceRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AnnonceRepository::class)]
class Annonce
{

    #[ORM\ManyToOne(targetEntity: Utilisateur::class)]
    #[ORM\JoinColumn(nullable: false)]
    private $user;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?float $prixannonce = null;

    #[ORM\Column]
    private ?int $nbmaxpersonne = null;
    
    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $datedepart = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateretour = null;

    #[ORM\Column(length: 255)]
    private ?string $paysannonce = null;

    #[ORM\Column(length: 255)]
    private ?string $villeannonce = null;

    #[ORM\Column(length: 255)]
    private ?string $descriptionannonce = null;

    #[ORM\Column(length: 255)]
    private ?string $lienphoto = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrixannonce(): ?float
    {
        return $this->prixannonce;
    }

    public function setPrixannonce(float $prixannonce): static
    {
        $this->prixannonce = $prixannonce;

        return $this;
    }

    public function getNbmaxpersonne(): ?int
    {
        return $this->nbmaxpersonne;
    }

    public function setNbmaxpersonne(int $nbmaxpersonne): static
    {
        $this->nbmaxpersonne = $nbmaxpersonne;

        return $this;
    }

    public function getDatedepart(): ?\DateTimeInterface
    {
        return $this->datedepart;
    }

    public function setDatedepart(\DateTimeInterface $datedepart): static
    {
        $this->datedepart = $datedepart;

        return $this;
    }

    public function getDateretour(): ?\DateTimeInterface
    {
        return $this->dateretour;
    }

    public function setDateretour(\DateTimeInterface $dateretour): static
    {
        $this->dateretour = $dateretour;

        return $this;
    }

    public function getPaysannonce(): ?string
    {
        return $this->paysannonce;
    }

    public function setPaysannonce(string $paysannonce): static
    {
        $this->paysannonce = $paysannonce;

        return $this;
    }

    public function getVilleannonce(): ?string
    {
        return $this->villeannonce;
    }

    public function setVilleannonce(string $villeannonce): static
    {
        $this->villeannonce = $villeannonce;

        return $this;
    }

    public function getDescriptionannonce(): ?string
    {
        return $this->descriptionannonce;
    }

    public function setDescriptionannonce(string $descriptionannonce): static
    {
        $this->descriptionannonce = $descriptionannonce;

        return $this;
    }

    public function getLienphoto(): ?string
    {
        return $this->lienphoto;
    }

    public function setLienphoto(string $lienphoto): static
    {
        $this->lienphoto = $lienphoto;

        return $this;
    }
}
