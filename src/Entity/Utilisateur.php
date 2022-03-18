<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Utilisateur
 *
 * @ORM\Table(name="Utilisateur")
 * @ORM\Entity
 */
class Utilisateur
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
     * @var string|null
     *
     * @ORM\Column(name="MotdePasse", type="string", length=50, nullable=true)
     */
    private $motdepasse;

    /**
     * @var bool
     *
     * @ORM\Column(name="Acces", type="boolean", nullable=false)
     */
    private $acces;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DateAjout", type="date", nullable=false)
     */
    private $dateajout;


}
