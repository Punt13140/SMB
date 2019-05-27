<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ThemeLogicielRepository")
 */
class ThemeLogiciel
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $libelle;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Logiciel", mappedBy="themes")
     */
    private $logiciels;

    public function __construct()
    {
        $this->logiciels = new ArrayCollection();
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

    /**
     * @return Collection|Logiciel[]
     */
    public function getLogiciels(): Collection
    {
        return $this->logiciels;
    }

    public function addLogiciel(Logiciel $logiciel): self
    {
        if (!$this->logiciels->contains($logiciel)) {
            $this->logiciels[] = $logiciel;
            $logiciel->addTheme($this);
        }

        return $this;
    }

    public function removeLogiciel(Logiciel $logiciel): self
    {
        if ($this->logiciels->contains($logiciel)) {
            $this->logiciels->removeElement($logiciel);
            $logiciel->removeTheme($this);
        }

        return $this;
    }
}
