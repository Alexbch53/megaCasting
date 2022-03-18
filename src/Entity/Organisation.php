<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Organisation
 *
 * @ORM\Table(name="Organisation")
 * @ORM\Entity
 */
class Organisation
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
     * @ORM\Column(name="Nom_Organisation", type="string", length=100, nullable=true)
     */
    private $nomOrganisation;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Adresse_Organisation", type="string", length=100, nullable=true)
     */
    private $adresseOrganisation;

    /**
     * @var int
     *
     * @ORM\Column(name="Code_Postal", type="integer", nullable=false)
     */
    private $codePostal;

    /**
     * @var int
     *
     * @ORM\Column(name="Numero_Telephone", type="integer", nullable=false)
     */
    private $numeroTelephone;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Adresse_Email", type="string", length=100, nullable=true)
     */
    private $adresseEmail;


}
