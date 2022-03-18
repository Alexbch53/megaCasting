<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PartenaireDiffusion
 *
 * @ORM\Table(name="Partenaire_diffusion")
 * @ORM\Entity
 */
class PartenaireDiffusion
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
     * @var string|null
     *
     * @ORM\Column(name="Libelle_Offre", type="string", length=100, nullable=true)
     */
    private $libelleOffre;

    /**
     * @var string
     *
     * @ORM\Column(name="Libelle_Media", type="string", length=100, nullable=false)
     */
    private $libelleMedia;

    /**
     * @var bool
     *
     * @ORM\Column(name="Acces", type="boolean", nullable=false, options={"default"="1"})
     */
    private $acces = true;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="OffreDeCasting", inversedBy="identifiantPartenaire")
     * @ORM\JoinTable(name="partenaire_offre",
     *   joinColumns={
     *     @ORM\JoinColumn(name="Identifiant_Partenaire", referencedColumnName="Identifiant")
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
