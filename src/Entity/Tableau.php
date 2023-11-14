<?php

namespace App\Entity;

use App\Repository\TableauRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TableauRepository::class)]
class Tableau
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'tableaux')]
    private ?Projet $projet = null;

    #[ORM\OneToMany(mappedBy: 'tableau', targetEntity: Colonne::class, orphanRemoval: true)]
    private Collection $colonnes;

    public function __construct()
    {
        $this->colonnes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProjet(): ?Projet
    {
        return $this->projet;
    }

    public function setProjet(?Projet $projet): static
    {
        $this->projet = $projet;

        return $this;
    }

    /**
     * @return Collection<int, Colonne>
     */
    public function getColonnes(): Collection
    {
        return $this->colonnes;
    }

    public function addColonne(Colonne $colonne): static
    {
        if (!$this->colonnes->contains($colonne)) {
            $this->colonnes->add($colonne);
            $colonne->setTableau($this);
        }

        return $this;
    }

    public function removeColonne(Colonne $colonne): static
    {
        if ($this->colonnes->removeElement($colonne)) {
            // set the owning side to null (unless already changed)
            if ($colonne->getTableau() === $this) {
                $colonne->setTableau(null);
            }
        }

        return $this;
    }
}
