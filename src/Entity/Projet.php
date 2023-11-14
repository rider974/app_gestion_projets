<?php

namespace App\Entity;

use App\Repository\ProjetRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProjetRepository::class)]
class Projet
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 75)]
    private ?string $titre = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $objectifs = null;

    #[ORM\ManyToMany(targetEntity: Utilisateur::class, mappedBy: 'projets')]
    private Collection $utilisateurs;

    #[ORM\OneToMany(mappedBy: 'projet', targetEntity: Tableau::class)]
    private Collection $tableaux;

    public function __construct()
    {
        $this->utilisateurs = new ArrayCollection();
        $this->tableaux = new ArrayCollection();
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

    public function getObjectifs(): ?string
    {
        return $this->objectifs;
    }

    public function setObjectifs(?string $objectifs): static
    {
        $this->objectifs = $objectifs;

        return $this;
    }

    /**
     * @return Collection<int, Utilisateur>
     */
    public function getUtilisateurs(): Collection
    {
        return $this->utilisateurs;
    }

    public function addUtilisateur(Utilisateur $utilisateur): static
    {
        if (!$this->utilisateurs->contains($utilisateur)) {
            $this->utilisateurs->add($utilisateur);
            $utilisateur->addProjet($this);
        }

        return $this;
    }

    public function removeUtilisateur(Utilisateur $utilisateur): static
    {
        if ($this->utilisateurs->removeElement($utilisateur)) {
            $utilisateur->removeProjet($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Tableau>
     */
    public function getTableaux(): Collection
    {
        return $this->tableaux;
    }

    public function addTableaux(Tableau $tableaux): static
    {
        if (!$this->tableaux->contains($tableaux)) {
            $this->tableaux->add($tableaux);
            $tableaux->setProjet($this);
        }

        return $this;
    }

    public function removeTableaux(Tableau $tableaux): static
    {
        if ($this->tableaux->removeElement($tableaux)) {
            // set the owning side to null (unless already changed)
            if ($tableaux->getProjet() === $this) {
                $tableaux->setProjet(null);
            }
        }

        return $this;
    }
}
