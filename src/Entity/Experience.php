<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ExperienceRepository")
 */
class Experience
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $libelle;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="date")
     */
    private $dateDebut;

    /**
     * @Assert\Expression(
     *     "this.getDateFin() == null || this.getDateDebut() < this.getDateFin()",
     *     message="La date de fin doit être après la date de début. Bah ouai."
     * )
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateFin;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $entreprise;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $lieu;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isExpInformatique;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\CurriculumVitae", inversedBy="experiences")
     */
    private $curriculumVitae;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Framework", inversedBy="experiences")
     */
    private $frameworks;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Langage", inversedBy="experiences")
     */
    private $autresLangages;

    public function __construct()
    {
        $this->frameworks = new ArrayCollection();
        $this->autresLangages = new ArrayCollection();
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->dateDebut;
    }

    public function setDateDebut(\DateTimeInterface $dateDebut): self
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->dateFin;
    }

    public function setDateFin(?\DateTimeInterface $dateFin): self
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    public function getEntreprise(): ?string
    {
        return $this->entreprise;
    }

    public function setEntreprise(string $entreprise): self
    {
        $this->entreprise = $entreprise;

        return $this;
    }

    public function getLieu(): ?string
    {
        return $this->lieu;
    }

    public function setLieu(string $lieu): self
    {
        $this->lieu = $lieu;

        return $this;
    }

    public function getIsExpInformatique(): ?bool
    {
        return $this->isExpInformatique;
    }

    public function setIsExpInformatique(bool $isExpInformatique): self
    {
        $this->isExpInformatique = $isExpInformatique;

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

    public function __toString()
    {
        return $this->libelle;
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

    /**
     * @return Collection|Langage[]
     */
    public function getAutresLangages(): Collection
    {
        return $this->autresLangages;
    }

    public function addAutresLangage(Langage $autresLangage): self
    {
        if (!$this->autresLangages->contains($autresLangage)) {
            $this->autresLangages[] = $autresLangage;
        }

        return $this;
    }

    public function removeAutresLangage(Langage $autresLangage): self
    {
        if ($this->autresLangages->contains($autresLangage)) {
            $this->autresLangages->removeElement($autresLangage);
        }

        return $this;
    }
}
