<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProjetRepository")
 */
class Projet
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $libelle;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Ide", inversedBy="projet")
     */
    private $ide;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Framework", inversedBy="projets")
     */
    private $frameworks;

    public function __construct()
    {
        $this->frameworks = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getIde(): ?Ide
    {
        return $this->ide;
    }

    public function setIde(?Ide $ide): self
    {
        $this->ide = $ide;

        return $this;
    }

    /**
     * @return Collection|Framework[]
     */
    public function getFrameworks(): Collection
    {
        return $this->frameworks;
    }

    public function addFramework(Framework $framework): self
    {
        if (!$this->frameworks->contains($framework)) {
            $this->frameworks[] = $framework;
        }

        return $this;
    }

    public function removeFramework(Framework $framework): self
    {
        if ($this->frameworks->contains($framework)) {
            $this->frameworks->removeElement($framework);
        }

        return $this;
    }
}
