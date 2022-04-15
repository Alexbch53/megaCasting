<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Civilite
 *
 * @ORM\Table(name="Civilite")
 * @ORM\Entity
 */
class Civilite
{
    /**
     * @var int
     *
     * @ORM\Column(name="Identifiant", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $identifiant;

    /**
     * @var string
     *
     * @ORM\Column(name="civiliteLongue", type="string", length=100, nullable=false)
     */
    private $civiliteLongue;

    /**
     * @var string
     *
     * @ORM\Column(name="LibelleCourt", type="string", length=10, nullable=false)
     */
    private $civilitecourt;

    public function getIdentifiant(): ?int
    {
        return $this->identifiant;
    }

    public function getciviliteLongue(): ?string
    {
        return $this->civiliteLongue;
    }

    public function setLibelle(string $civiliteLongue): self
    {
        $this->civiliteLongue = $civiliteLongue;

        return $this;
    }

    public function getcivilitecourt(): ?string
    {
        return $this->civilitecourt;
    }

    public function setcivilitecourt(string $civilitecourt): self
    {
        $this->civilitecourt = $civilitecourt;

        return $this;
    }

    public function setciviliteLongue(string $civiliteLongue): self
    {
        $this->civiliteLongue = $civiliteLongue;

        return $this;
    }
}
