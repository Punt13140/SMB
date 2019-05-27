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
     * @ORM\Column(type="json_array", nullable=true)
     */
    private $versions;

    public function __construct()
    {
        $this->langages = new ArrayCollection();
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

    public function getVersions()
    {
        return $this->versions;
    }

    public function setVersions($versions): self
    {
        $this->versions = $versions;

        return $this;
    }
}
