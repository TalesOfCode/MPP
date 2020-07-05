<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProjectRepository")
 */
class Project
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $name;

    /**
     * @ORM\Column(type="datetime")
     */
    private $creationDate;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $link;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $closureDate;

    /**
     * @ORM\Column(type="boolean")
     */
    private $status;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Subject", mappedBy="project")
     */
    private $projectSubject;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\projectVisibility", inversedBy="projects")
     * @ORM\JoinColumn(nullable=false)
     */
    private $visibility;

    public function __construct()
    {
        $this->projectSubject = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getCreationDate(): ?\DateTimeInterface
    {
        return $this->creationDate;
    }

    public function setCreationDate(\DateTimeInterface $creationDate): self
    {
        $this->creationDate = $creationDate;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getLink(): ?string
    {
        return $this->link;
    }

    public function setLink(?string $link): self
    {
        $this->link = $link;

        return $this;
    }

    public function getClosureDate(): ?\DateTimeInterface
    {
        return $this->closureDate;
    }

    public function setClosureDate(?\DateTimeInterface $closureDate): self
    {
        $this->closureDate = $closureDate;

        return $this;
    }

    public function getStatus(): ?bool
    {
        return $this->status;
    }

    public function setStatus(bool $status): self
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return Collection|Subject[]
     */
    public function getProjectSubject(): Collection
    {
        return $this->projectSubject;
    }

    public function addProjectSubject(Subject $projectSubject): self
    {
        if (!$this->projectSubject->contains($projectSubject)) {
            $this->projectSubject[] = $projectSubject;
            $projectSubject->setProject($this);
        }

        return $this;
    }

    public function removeProjectSubject(Subject $projectSubject): self
    {
        if ($this->projectSubject->contains($projectSubject)) {
            $this->projectSubject->removeElement($projectSubject);
            // set the owning side to null (unless already changed)
            if ($projectSubject->getProject() === $this) {
                $projectSubject->setProject(null);
            }
        }

        return $this;
    }

    public function getVisibility(): ?projectVisibility
    {
        return $this->visibility;
    }

    public function setVisibility(?projectVisibility $visibility): self
    {
        $this->visibility = $visibility;

        return $this;
    }
}
