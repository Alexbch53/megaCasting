<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * OffreDeCasting
 *
 * @ORM\Table(name="Offre_de_Casting", indexes={@ORM\Index(name="IDX_18DFA917DBAD1978", columns={"Identifiant_Domaine"}), @ORM\Index(name="IDX_18DFA917EFB3CDEE", columns={"Identifiant_Metier"}), @ORM\Index(name="IDX_18DFA917C7A45F55", columns={"Identifiant_Organisation"}), @ORM\Index(name="IDX_18DFA917A6EDA21B", columns={"Identifiant_Type_Contrat"})})
 * @ORM\Entity
 */
class OffreDeCasting
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
     * @ORM\Column(name="Intitule_Offre", type="string", length=255, nullable=false)
     */
    private $intituleOffre;

    /**
     * @var int
     *
     * @ORM\Column(name="Reference_Offre", type="integer", nullable=false)
     */
    private $referenceOffre;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Date_Debut", type="date", nullable=false)
     */
    private $dateDebut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Date_Fin", type="date", nullable=false)
     */
    private $dateFin;

    /**
     * @var string
     *
     * @ORM\Column(name="Ville", type="string", length=100, nullable=false)
     */
    private $ville;

    /**
     * @var \Domaine
     *
     * @ORM\ManyToOne(targetEntity="Domaine")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Identifiant_Domaine", referencedColumnName="Identifiant",nullable=false)
     * })
     */
    private $identifiantDomaine;

    /**
     * @var \Metier
     *
     * @ORM\ManyToOne(targetEntity="Metier")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Identifiant_Metier", referencedColumnName="Identifiant",nullable=false)
     * })
     */
    private $identifiantMetier;

    /**
     * @var \Organisation
     *
     * @ORM\ManyToOne(targetEntity="Organisation")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Identifiant_Organisation", referencedColumnName="Identifiant",nullable=false)
     * })
     */
    private $identifiantOrganisation;

    /**
     * @var \TypeContrat
     *
     * @ORM\ManyToOne(targetEntity="TypeContrat")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Identifiant_Type_Contrat", referencedColumnName="Identifiant",nullable=false)
     * })
     */
    private $identifiantTypeContrat;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Artiste", mappedBy="identifiantOffre")
     */
    private $identifiantArtiste;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="ListeReferenciel", mappedBy="identifiantOffre")
     */
    private $identifiantListe;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="PartenaireDiffusion", mappedBy="identifiantOffre")
     */
    private $identifiantPartenaire;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->identifiantArtiste = new \Doctrine\Common\Collections\ArrayCollection();
        $this->identifiantListe = new \Doctrine\Common\Collections\ArrayCollection();
        $this->identifiantPartenaire = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getIdentifiant(): ?string
    {
        return $this->identifiant;
    }

    public function getIntituleOffre(): ?string
    {
        return $this->intituleOffre;
    }

    public function setIntituleOffre(string $intituleOffre): self
    {
        $this->intituleOffre = $intituleOffre;

        return $this;
    }

    public function getReferenceOffre(): ?int
    {
        return $this->referenceOffre;
    }

    public function setReferenceOffre(int $referenceOffre): self
    {
        $this->referenceOffre = $referenceOffre;

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

    public function setDateFin(\DateTimeInterface $dateFin): self
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getIdentifiantDomaine(): ?Domaine
    {
        return $this->identifiantDomaine;
    }

    public function setIdentifiantDomaine(?Domaine $identifiantDomaine): self
    {
        $this->identifiantDomaine = $identifiantDomaine;

        return $this;
    }

    public function getIdentifiantMetier(): ?Metier
    {
        return $this->identifiantMetier;
    }

    public function setIdentifiantMetier(?Metier $identifiantMetier): self
    {
        $this->identifiantMetier = $identifiantMetier;

        return $this;
    }

    public function getIdentifiantOrganisation(): ?Organisation
    {
        return $this->identifiantOrganisation;
    }

    public function setIdentifiantOrganisation(?Organisation $identifiantOrganisation): self
    {
        $this->identifiantOrganisation = $identifiantOrganisation;

        return $this;
    }

    public function getIdentifiantTypeContrat(): ?TypeContrat
    {
        return $this->identifiantTypeContrat;
    }

    public function setIdentifiantTypeContrat(?TypeContrat $identifiantTypeContrat): self
    {
        $this->identifiantTypeContrat = $identifiantTypeContrat;

        return $this;
    }

    /**
     * @return Collection<int, Artiste>
     */
    public function getIdentifiantArtiste(): Collection
    {
        return $this->identifiantArtiste;
    }

    public function addIdentifiantArtiste(Artiste $identifiantArtiste): self
    {
        if (!$this->identifiantArtiste->contains($identifiantArtiste)) {
            $this->identifiantArtiste[] = $identifiantArtiste;
            $identifiantArtiste->addIdentifiantOffre($this);
        }

        return $this;
    }

    public function removeIdentifiantArtiste(Artiste $identifiantArtiste): self
    {
        if ($this->identifiantArtiste->removeElement($identifiantArtiste)) {
            $identifiantArtiste->removeIdentifiantOffre($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, ListeReferenciel>
     */
    public function getIdentifiantListe(): Collection
    {
        return $this->identifiantListe;
    }

    public function addIdentifiantListe(ListeReferenciel $identifiantListe): self
    {
        if (!$this->identifiantListe->contains($identifiantListe)) {
            $this->identifiantListe[] = $identifiantListe;
            $identifiantListe->addIdentifiantOffre($this);
        }

        return $this;
    }

    public function removeIdentifiantListe(ListeReferenciel $identifiantListe): self
    {
        if ($this->identifiantListe->removeElement($identifiantListe)) {
            $identifiantListe->removeIdentifiantOffre($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, PartenaireDiffusion>
     */
    public function getIdentifiantPartenaire(): Collection
    {
        return $this->identifiantPartenaire;
    }

    public function addIdentifiantPartenaire(PartenaireDiffusion $identifiantPartenaire): self
    {
        if (!$this->identifiantPartenaire->contains($identifiantPartenaire)) {
            $this->identifiantPartenaire[] = $identifiantPartenaire;
            $identifiantPartenaire->addIdentifiantOffre($this);
        }

        return $this;
    }

    public function removeIdentifiantPartenaire(PartenaireDiffusion $identifiantPartenaire): self
    {
        if ($this->identifiantPartenaire->removeElement($identifiantPartenaire)) {
            $identifiantPartenaire->removeIdentifiantOffre($this);
        }

        return $this;
    }

}