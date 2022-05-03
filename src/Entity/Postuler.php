<?php

namespace App\Entity;

use App\Repository\PostulerRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PostulerRepository::class)
 */
class Postuler
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Artiste", inversedBy="postuler")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="IdArtiste", referencedColumnName="identifiant")
     * })
     */
    private ?Artiste $artiste;

    /**
     * @ORM\ManyToOne(targetEntity="OffreDeCasting", inversedBy="postuler")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="IdOffreDeCasting", referencedColumnName="identifiant")
     * })
     */
    private ?OffreDeCasting $offreDeCasting;

    /**
     * @ORM\Column(type="text")
     */
    private ?string $motivation;

    /**
     * @ORM\Column(type="datetime")
     */
    private ?\DateTimeInterface $datePostulation;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getArtiste(): ?Artiste
    {
        return $this->artiste;
    }

    public function setArtiste(?Artiste $artiste): self
    {
        $this->artiste = $artiste;

        return $this;
    }

    public function getOffreDeCasting(): ?OffreDeCasting
    {
        return $this->offreDeCasting;
    }

    public function setOffreDeCasting(?OffreDeCasting $casting): self
    {
        $this->offreDeCasting = $casting;
        return $this;
    }

    public function getMotivation(): ?string
    {
        return $this->motivation;
    }

    public function setMotivation(string $motivation): self
    {
        $this->motivation = $motivation;

        return $this;
    }

    public function getDatePostulation(): ?\DateTimeInterface
    {
        return $this->datePostulation;
    }

    public function setDatePostulation(\DateTimeInterface $datePostulation): self
    {
        $this->datePostulation = $datePostulation;

        return $this;
    }
}