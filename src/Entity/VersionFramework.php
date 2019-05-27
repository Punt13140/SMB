<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\VersionFrameworkRepository")
 */
class VersionFramework
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=5)
     */
    private $numVersion;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Framework", inversedBy="versionFrameworks")
     * @ORM\JoinColumn(nullable=false)
     */
    private $framework;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumVersion(): ?string
    {
        return $this->numVersion;
    }

    public function setNumVersion(string $numVersion): self
    {
        $this->numVersion = $numVersion;

        return $this;
    }

    public function getFramework(): ?Framework
    {
        return $this->framework;
    }

    public function setFramework(?Framework $framework): self
    {
        $this->framework = $framework;

        return $this;
    }

    public function __toString()
    {
        return $this->numVersion;
    }
}
