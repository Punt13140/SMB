<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\IdeRepository")
 */
class Ide
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
     * @ORM\ManyToOne(targetEntity="App\Entity\CurriculumVitae", inversedBy="ides")
     */
    private $curriculumVitae;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Projet", mappedBy="ide")
     */
    private $projet;

    public function __construct()
    {
        $this->projet = new ArrayCollection();
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

    public function getCurriculumVitae(): ?CurriculumVitae
    {
        return $this->curriculumVitae;
    }

    public function setCurriculumVitae(?CurriculumVitae $curriculumVitae): self
    {
        $this->curriculumVitae = $curriculumVitae;

        return $this;
    }

    /**
     * @return Collection|Projet[]
     */
    public function getProjet(): Collection
    {
        return $this->projet;
    }

    public function addFramework(Projet $framework): self
    {
        if (!$this->projet->contains($framework)) {
            $this->projet[] = $framework;
            $framework->setIde($this);
        }

        return $this;
    }

    public function removeFramework(Projet $framework): self
    {
        if ($this->projet->contains($framework)) {
            $this->projet->removeElement($framework);
            // set the owning side to null (unless already changed)
            if ($framework->getIde() === $this) {
                $framework->setIde(null);
            }
        }

        return $this;
    }
}
