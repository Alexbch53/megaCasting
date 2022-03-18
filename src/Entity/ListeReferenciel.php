<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * ListeReferenciel
 *
 * @ORM\Table(name="Liste_referenciel")
 * @ORM\Entity
 */
class ListeReferenciel
{
    /**
     * @var int
     *
     * @ORM\Column(name="Identifiant", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $identifiant;

    /**
     * @var string
     *
     * @ORM\Column(name="Type_Contrat", type="string", length=100, nullable=false)
     */
    private $typeContrat;

    /**
     * @var string
     *
     * @ORM\Column(name="Domaine_Metier", type="string", length=100, nullable=false)
     */
    private $domaineMetier;

    /**
     * @var string
     *
     * @ORM\Column(name="Metier", type="string", length=100, nullable=false)
     */
    private $metier;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="OffreDeCasting", inversedBy="identifiantListe")
     * @ORM\JoinTable(name="liste_referenciel_offre",
     *   joinColumns={
     *     @ORM\JoinColumn(name="Identifiant_Liste", referencedColumnName="Identifiant")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="Identifiant_Offre", referencedColumnName="Identifiant")
     *   }
     * )
     */
    private $identifiantOffre;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->identifiantOffre = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getIdentifiant(): ?string
    {
        return $this->identifiant;
    }

    public function getTypeContrat(): ?string
    {
        return $this->typeContrat;
    }

    public function setTypeContrat(string $typeContrat): self
    {
        $this->typeContrat = $typeContrat;

        return $this;
    }

    public function getDomaineMetier(): ?string
    {
        return $this->domaineMetier;
    }

    public function setDomaineMetier(string $domaineMetier): self
    {
        $this->domaineMetier = $domaineMetier;

        return $this;
    }

    public function getMetier(): ?string
    {
        return $this->metier;
    }

    public function setMetier(string $metier): self
    {
        $this->metier = $metier;

        return $this;
    }

    /**
     * @return Collection<int, OffreDeCasting>
     */
    public function getIdentifiantOffre(): Collection
    {
        return $this->identifiantOffre;
    }

    public function addIdentifiantOffre(OffreDeCasting $identifiantOffre): self
    {
        if (!$this->identifiantOffre->contains($identifiantOffre)) {
            $this->identifiantOffre[] = $identifiantOffre;
        }

        return $this;
    }

    public function removeIdentifiantOffre(OffreDeCasting $identifiantOffre): self
    {
        $this->identifiantOffre->removeElement($identifiantOffre);

        return $this;
    }

}
