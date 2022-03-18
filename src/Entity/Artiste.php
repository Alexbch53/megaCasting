<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Artiste
 *
 * @ORM\Table(name="Artiste")
 * @ORM\Entity
 */
class Artiste
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
     * @ORM\Column(name="Nom", type="string", length=100, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="Prenom", type="string", length=100, nullable=false)
     */
    private $prenom;

    /**
     * @var string|null
     *
     * @ORM\Column(name="CV", type="string", length=100, nullable=true)
     */
    private $cv;

    /**
     * @var string
     *
     * @ORM\Column(name="Civilite", type="string", length=50, nullable=false)
     */
    private $civilite;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Date_Naissance", type="date", nullable=false)
     */
    private $dateNaissance;

    /**
     * @var bool
     *
     * @ORM\Column(name="Verification", type="boolean", nullable=false)
     */
    private $verification;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="OffreDeCasting", inversedBy="identifiantArtiste")
     * @ORM\JoinTable(name="artiste_offre",
     *   joinColumns={
     *     @ORM\JoinColumn(name="Identifiant_Artiste", referencedColumnName="Identifiant")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="Identifiant_Offre", referencedColumnName="Identifiant")
     *   }
     * )
     */
    private $OffreDeCasting;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->OffreDeCasting = new \Doctrine\Common\Collections\ArrayCollection();
    }

}
