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

    public function __construct()
    {
        $this->langages = new ArrayCollection();
        $this->versionFrameworks = new ArrayCollection();
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
}
