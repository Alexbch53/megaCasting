<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Metier
 *
 * @ORM\Table(name="Metier", indexes={@ORM\Index(name="IDX_560C08BADBAD1978", columns={"Identifiant_Domaine"})})
 * @ORM\Entity
 */
class Metier
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
     * @ORM\Column(name="Nom", type="string", length=255, nullable=false)
     */
    private $nom;

    /**
     * @var \Domaine
     *
     * @ORM\ManyToOne(targetEntity="Domaine")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Identifiant_Domaine", referencedColumnName="Identifiant")
     * })
     */
    private $identifiantDomaine;

    public function getIdentifiant(): ?string
    {
        return $this->identifiant;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

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


}