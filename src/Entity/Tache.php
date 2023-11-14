<?php

namespace App\Entity;

use App\Repository\TacheRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TacheRepository::class)]
class Tache
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 75)]
    private ?string $titre = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dateLimite = null;

    #[ORM\ManyToOne(inversedBy: 'taches')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Colonne $colonne = null;

    #[ORM\ManyToOne(inversedBy: 'taches')]
    private ?Utilisateur $responsable = null;

    #[ORM\OneToMany(mappedBy: 'tache', targetEntity: Action::class, orphanRemoval: true)]
    private Collection $actions;

    public function __construct()
    {
        $this->actions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): static
    {
        $this->titre = $titre;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getDateLimite(): ?\DateTimeInterface
    {
        return $this->dateLimite;
    }

    public function setDateLimite(?\DateTimeInterface $dateLimite): static
    {
        $this->dateLimite = $dateLimite;

        return $this;
    }

    public function getColonne(): ?Colonne
    {
        return $this->colonne;
    }

    public function setColonne(?Colonne $colonne): static
    {
        $this->colonne = $colonne;

        return $this;
    }

    public function getResponsable(): ?Utilisateur
    {
        return $this->responsable;
    }

    public function setResponsable(?Utilisateur $responsable): static
    {
        $this->responsable = $responsable;

        return $this;
    }

    /**
     * @return Collection<int, Action>
     */
    public function getActions(): Collection
    {
        return $this->actions;
    }

    public function addAction(Action $action): static
    {
        if (!$this->actions->contains($action)) {
            $this->actions->add($action);
            $action->setTache($this);
        }

        return $this;
    }

    public function removeAction(Action $action): static
    {
        if ($this->actions->removeElement($action)) {
            // set the owning side to null (unless already changed)
            if ($action->getTache() === $this) {
                $action->setTache(null);
            }
        }

        return $this;
    }
}
