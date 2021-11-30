<?php

namespace App\Entity;

use App\Repository\ConcessionnaireRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ConcessionnaireRepository::class)
 */
class Concessionnaire
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

   

    /**
     * @ORM\OneToOne(targetEntity=Concessionnairemarchand::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $concessionnairemarchand;

    public function getId(): ?int
    {
        return $this->id;
    }

    

    public function getConcessionnairemarchand(): ?Concessionnairemarchand
    {
        return $this->concessionnairemarchand;
    }

    public function setConcessionnairemarchand(Concessionnairemarchand $concessionnairemarchand): self
    {
        $this->concessionnairemarchand = $concessionnairemarchand;

        return $this;
    }
}
