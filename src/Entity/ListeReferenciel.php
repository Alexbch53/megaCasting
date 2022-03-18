<?php

namespace App\Entity;

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
    private $OffreDeCasting;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->OffreDeCasting = new \Doctrine\Common\Collections\ArrayCollection();
    }

}
