<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use PhpOffice\PhpSpreadsheet\IOFactory;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: '`user`')]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(name: 'Nom_Du_Groupe', type: 'string', length: 255, nullable: true)]
    private ?string $nomDuGroupe = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $origine = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $ville = null;

    #[ORM\Column(name: 'Année_Début', type: 'integer', nullable: true)]
    private ?int $annéeDébut = null;

    #[ORM\Column(name: 'Année_Séparation', type: 'integer', nullable: true)]
    private ?int $annéeSéparation = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $fondateurs = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $membres = null;

    #[ORM\Column(name: 'Courant_Musical', type: 'string', length: 255, nullable: true)]
    private ?string $courantMusical = null;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $présentation = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomDuGroupe(): ?string
    {
        return $this->nomDuGroupe;
    }

    public function setNomDuGroupe(?string $nomDuGroupe): self
    {
        $this->nomDuGroupe = $nomDuGroupe;

        return $this;
    }

    public function getOrigine(): ?string
    {
        return $this->origine;
    }

    public function setOrigine(?string $origine): self
    {
        $this->origine = $origine;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(?string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getAnnéeDébut(): ?int
    {
        return $this->annéeDébut;
    }

    public function setAnnéeDébut(?int $annéeDébut): self
    {
        $this->annéeDébut = $annéeDébut;

        return $this;
    }

    public function getAnnéeSéparation(): ?int
    {
        return $this->annéeSéparation;
    }

    public function setAnnéeSéparation(?int $annéeSéparation): self
    {
        $this->annéeSéparation = $annéeSéparation;

        return $this;
    }

    public function getFondateurs(): ?string
    {
        return $this->fondateurs;
    }

    public function setFondateurs(?string $fondateurs): self
    {
        $this->fondateurs = $fondateurs;

        return $this;
    }

    public function getMembres(): ?string
    {
        return $this->membres;
    }

    public function setMembres(?string $membres): self
    {
        $this->membres = $membres;

        return $this;
    }

    public function getCourantMusical(): ?string
    {
        return $this->courantMusical;
    }

    public function setCourantMusical(?string $courantMusical): self
    {
        $this->courantMusical = $courantMusical;

        return $this;
    }

    public function getPrésentation(): ?string
    {
        return $this->présentation;
    }

    public function setPrésentation(?string $présentation): self
    {
        $this->présentation = $présentation;

        return $this;
    }
}

