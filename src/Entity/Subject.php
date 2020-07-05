<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SubjectRepository")
 */
class Subject
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $openDate;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $closeDate;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Project", inversedBy="projectSubject")
     * @ORM\JoinColumn(nullable=false)
     */
    private $project;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Comment", mappedBy="subject")
     */
    private $subjectComments;

    public function __construct()
    {
        $this->subjectComments = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOpenDate(): ?\DateTimeInterface
    {
        return $this->openDate;
    }

    public function setOpenDate(\DateTimeInterface $openDate): self
    {
        $this->openDate = $openDate;

        return $this;
    }

    public function getCloseDate(): ?\DateTimeInterface
    {
        return $this->closeDate;
    }

    public function setCloseDate(?\DateTimeInterface $closeDate): self
    {
        $this->closeDate = $closeDate;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getProject(): ?Project
    {
        return $this->project;
    }

    public function setProject(?Project $project): self
    {
        $this->project = $project;

        return $this;
    }

    /**
     * @return Collection|Comment[]
     */
    public function getSubjectComments(): Collection
    {
        return $this->subjectComments;
    }

    public function addSubjectComment(Comment $subjectComment): self
    {
        if (!$this->subjectComments->contains($subjectComment)) {
            $this->subjectComments[] = $subjectComment;
            $subjectComment->setSubject($this);
        }

        return $this;
    }

    public function removeSubjectComment(Comment $subjectComment): self
    {
        if ($this->subjectComments->contains($subjectComment)) {
            $this->subjectComments->removeElement($subjectComment);
            // set the owning side to null (unless already changed)
            if ($subjectComment->getSubject() === $this) {
                $subjectComment->setSubject(null);
            }
        }

        return $this;
    }
}
