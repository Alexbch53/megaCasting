<?php

namespace App\Entity;

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
     * @ORM\Column(name="Date_Diffusion", type="date", nullable=false)
     */
    private $dateDiffusion;

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
     *   @ORM\JoinColumn(name="Identifiant_Domaine", referencedColumnName="Identifiant")
     * })
     */
    private $Domaine;

    /**
     * @var \Metier
     *
     * @ORM\ManyToOne(targetEntity="Metier")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Identifiant_Metier", referencedColumnName="Identifiant")
     * })
     */
    private $Metier;

    /**
     * @var \Organisation
     *
     * @ORM\ManyToOne(targetEntity="Organisation")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Identifiant_Organisation", referencedColumnName="Identifiant")
     * })
     */
    private $Organisation;

    /**
     * @var \TypeContrat
     *
     * @ORM\ManyToOne(targetEntity="TypeContrat")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Identifiant_Type_Contrat", referencedColumnName="Identifiant")
     * })
     */
    private $TypeContrat;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Artiste", mappedBy="identifiantOffre")
     */
    private $Artiste;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="ListeReferenciel", mappedBy="identifiantOffre")
     */
    private $ListeReferenciel;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="PartenaireDiffusion", mappedBy="identifiantOffre")
     */
    private $PartenaireDiffusion;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->Artiste = new \Doctrine\Common\Collections\ArrayCollection();
        $this->ListeReferenciel = new \Doctrine\Common\Collections\ArrayCollection();
        $this->PartenaireDiffusion = new \Doctrine\Common\Collections\ArrayCollection();
    }

}
