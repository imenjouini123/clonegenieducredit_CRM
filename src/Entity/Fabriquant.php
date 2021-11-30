<?php

namespace App\Entity;

use App\Repository\FabriquantRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FabriquantRepository::class)
 */
class Fabriquant
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean")
     */
    private $actifcrm;

    /**
     * @ORM\Column(type="boolean")
     */
    private $actifservice;

    /**
     * @ORM\Column(type="boolean")
     */
    private $actifaccueil;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lien;

    /**
     * @ORM\Column(type="datetime")
     */
    private $datecreation;

    /**
     * @ORM\Column(type="datetime")
     */
    private $datemodification;

    /**
     * @ORM\ManyToMany(targetEntity=Concessionnairemarchand::class, inversedBy="fabriquants")
     */
    private $concessionnairesmarchans;

    public function __construct()
    {
        $this->concessionnairesmarchans = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getActifcrm(): ?bool
    {
        return $this->actifcrm;
    }

    public function setActifcrm(bool $actifcrm): self
    {
        $this->actifcrm = $actifcrm;

        return $this;
    }

    public function getActifservice(): ?bool
    {
        return $this->actifservice;
    }

    public function setActifservice(bool $actifservice): self
    {
        $this->actifservice = $actifservice;

        return $this;
    }

    public function getActifaccueil(): ?bool
    {
        return $this->actifaccueil;
    }

    public function setActifaccueil(bool $actifaccueil): self
    {
        $this->actifaccueil = $actifaccueil;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getLien(): ?string
    {
        return $this->lien;
    }

    public function setLien(string $lien): self
    {
        $this->lien = $lien;

        return $this;
    }

    public function getDatecreation(): ?\DateTimeInterface
    {
        return $this->datecreation;
    }

    public function setDatecreation(\DateTimeInterface $datecreation): self
    {
        $this->datecreation = $datecreation;

        return $this;
    }

    public function getDatemodification(): ?\DateTimeInterface
    {
        return $this->datemodification;
    }

    public function setDatemodification(\DateTimeInterface $datemodification): self
    {
        $this->datemodification = $datemodification;

        return $this;
    }

    /**
     * @return Collection|Concessionnairemarchand[]
     */
    public function getConcessionnairesmarchans(): Collection
    {
        return $this->concessionnairesmarchans;
    }

    public function addConcessionnairesmarchan(Concessionnairemarchand $concessionnairesmarchan): self
    {
        if (!$this->concessionnairesmarchans->contains($concessionnairesmarchan)) {
            $this->concessionnairesmarchans[] = $concessionnairesmarchan;
        }

        return $this;
    }

    public function removeConcessionnairesmarchan(Concessionnairemarchand $concessionnairesmarchan): self
    {
        $this->concessionnairesmarchans->removeElement($concessionnairesmarchan);

        return $this;
    }
}
