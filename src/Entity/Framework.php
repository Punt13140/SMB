<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FrameworkRepository")
 */
class Framework
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
     * @ORM\ManyToMany(targetEntity="App\Entity\Langage", inversedBy="frameworks")
     */
    private $langages;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\VersionFramework", mappedBy="framework")
     */
    private $versionFrameworks;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Projet", mappedBy="frameworks")
     */
    private $projets;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Experience", mappedBy="frameworks")
     */
    private $experiences;

    public function __construct()
    {
        $this->langages = new ArrayCollection();
        $this->versionFrameworks = new ArrayCollection();
        $this->projets = new ArrayCollection();
        $this->experiences = new ArrayCollection();
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
     * @return Collection|Langage[]
     */
    public function getLangages(): Collection
    {
        return $this->langages;
    }

    public function addLangage(Langage $langage): self
    {
        if (!$this->langages->contains($langage)) {
            $this->langages[] = $langage;
        }

        return $this;
    }

    public function removeLangage(Langage $langage): self
    {
        if ($this->langages->contains($langage)) {
            $this->langages->removeElement($langage);
        }

        return $this;
    }

    public function __toString()
    {
        return $this->libelle;
    }

    /**
     * @return Collection|VersionFramework[]
     */
    public function getVersionFrameworks(): Collection
    {
        return $this->versionFrameworks;
    }

    public function addVersionFramework(VersionFramework $versionFramework): self
    {
        if (!$this->versionFrameworks->contains($versionFramework)) {
            $this->versionFrameworks[] = $versionFramework;
            $versionFramework->setFramework($this);
        }

        return $this;
    }

    public function removeVersionFramework(VersionFramework $versionFramework): self
    {
        if ($this->versionFrameworks->contains($versionFramework)) {
            $this->versionFrameworks->removeElement($versionFramework);
            // set the owning side to null (unless already changed)
            if ($versionFramework->getFramework() === $this) {
                $versionFramework->setFramework(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Projet[]
     */
    public function getProjets(): Collection
    {
        return $this->projets;
    }

    public function addProjet(Projet $projet): self
    {
        if (!$this->projets->contains($projet)) {
            $this->projets[] = $projet;
            $projet->addFramework($this);
        }

        return $this;
    }

    public function removeProjet(Projet $projet): self
    {
        if ($this->projets->contains($projet)) {
            $this->projets->removeElement($projet);
            $projet->removeFramework($this);
        }

        return $this;
    }

    /**
     * @return Collection|Experience[]
     */
    public function getExperiences(): Collection
    {
        return $this->experiences;
    }

    public function addExperience(Experience $experience): self
    {
        if (!$this->experiences->contains($experience)) {
            $this->experiences[] = $experience;
            $experience->addFramework($this);
        }

        return $this;
    }

    public function removeExperience(Experience $experience): self
    {
        if ($this->experiences->contains($experience)) {
            $this->experiences->removeElement($experience);
            $experience->removeFramework($this);
        }

        return $this;
    }
}
