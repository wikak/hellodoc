<?php

namespace App\Entity;

use App\Repository\RendezVousRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RendezVousRepository::class)
 */
class RendezVous
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $label;

    /**
     * @ORM\Column(type="date")
     */
    private $date_du_rdv;

    /**
     * @ORM\Column(type="time")
     */
    private $heure_du_rdv;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isArchived;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="rendezVouses")
     */
    private $createdBy;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $doctor;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(string $label): self
    {
        $this->label = $label;

        return $this;
    }

    public function getDateDuRdv(): ?\DateTimeInterface
    {
        return $this->date_du_rdv;
    }

    public function setDateDuRdv(\DateTimeInterface $date_du_rdv): self
    {
        $this->date_du_rdv = $date_du_rdv;

        return $this;
    }

    public function getHeureDuRdv(): ?\DateTimeInterface
    {
        return $this->heure_du_rdv;
    }

    public function setHeureDuRdv(\DateTimeInterface $heure_du_rdv): self
    {
        $this->heure_du_rdv = $heure_du_rdv;

        return $this;
    }

    public function isIsArchived(): ?bool
    {
        return $this->isArchived;
    }

    public function setIsArchived(?bool $isArchived): self
    {
        $this->isArchived = $isArchived;

        return $this;
    }

    public function getCreatedBy(): ?User
    {
        return $this->createdBy;
    }

    public function setCreatedBy(?User $createdBy): self
    {
        $this->createdBy = $createdBy;

        return $this;
    }

    public function getDoctor(): ?string
    {
        return $this->doctor;
    }

    public function setDoctor(?string $doctor): self
    {
        $this->doctor = $doctor;

        return $this;
    }
}
