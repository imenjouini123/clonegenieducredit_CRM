<?php

namespace App\Entity;

use App\Repository\AdministrateurRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AdministrateurRepository::class)
 */
class Administrateur
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
    private $authenvoiemail;

    /**
     * @ORM\Column(type="boolean")
     */
    private $authenvoisms;

   

    /**
     * @ORM\OneToOne(targetEntity=Utilisateur::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $utilisateur;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAuthenvoiemail(): ?bool
    {
        return $this->authenvoiemail;
    }

    public function setAuthenvoiemail(bool $authenvoiemail): self
    {
        $this->authenvoiemail = $authenvoiemail;

        return $this;
    }

    public function getAuthenvoisms(): ?bool
    {
        return $this->authenvoisms;
    }

    public function setAuthenvoisms(bool $authenvoisms): self
    {
        $this->authenvoisms = $authenvoisms;

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
}
