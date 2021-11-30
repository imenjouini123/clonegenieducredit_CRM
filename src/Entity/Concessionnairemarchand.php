<?php

namespace App\Entity;

use App\Repository\ConcessionnairemarchandRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ConcessionnairemarchandRepository::class)
 */
class Concessionnairemarchand
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
    private $actif;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $logo;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $siteweb;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $liendealertrack;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\OneToOne(targetEntity=Utilisateur::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $utilisateur;

    /**
     * @ORM\ManyToMany(targetEntity=Fabriquant::class, mappedBy="concessionnairesmarchans")
     */
    private $fabriquants;

    public function __construct()
    {
        $this->fabriquants = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getActif(): ?bool
    {
        return $this->actif;
    }

    public function setActif(bool $actif): self
    {
        $this->actif = $actif;

        return $this;
    }

    public function getLogo(): ?string
    {
        return $this->logo;
    }

    public function setLogo(string $logo): self
    {
        $this->logo = $logo;

        return $this;
    }

    public function getSiteweb(): ?string
    {
        return $this->siteweb;
    }

    public function setSiteweb(string $siteweb): self
    {
        $this->siteweb = $siteweb;

        return $this;
    }

    public function getLiendealertrack(): ?string
    {
        return $this->liendealertrack;
    }

    public function setLiendealertrack(string $liendealertrack): self
    {
        $this->liendealertrack = $liendealertrack;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getUtilisateur(): ?Utilisateur
    {
        return $this->utilisateur;
    }

    public function setUtilisateur(Utilisateur $utilisateur): self
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }

    /**
     * @return Collection|Fabriquant[]
     */
    public function getFabriquants(): Collection
    {
        return $this->fabriquants;
    }

    public function addFabriquant(Fabriquant $fabriquant): self
    {
        if (!$this->fabriquants->contains($fabriquant)) {
            $this->fabriquants[] = $fabriquant;
            $fabriquant->addConcessionnairesmarchan($this);
        }

        return $this;
    }

    public function removeFabriquant(Fabriquant $fabriquant): self
    {
        if ($this->fabriquants->removeElement($fabriquant)) {
            $fabriquant->removeConcessionnairesmarchan($this);
        }

        return $this;
    }
}
