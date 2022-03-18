<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ContenueEditorial
 *
 * @ORM\Table(name="Contenue_editorial")
 * @ORM\Entity
 */
class ContenueEditorial
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
     * @ORM\Column(name="Fiche_Metier", type="string", length=100, nullable=false)
     */
    private $ficheMetier;

    /**
     * @var string
     *
     * @ORM\Column(name="Conseil", type="string", length=100, nullable=false)
     */
    private $conseil;

    /**
     * @var string
     *
     * @ORM\Column(name="Interviews", type="string", length=100, nullable=false)
     */
    private $interviews;

    /**
     * @var string
     *
     * @ORM\Column(name="Article", type="text", length=16, nullable=false)
     */
    private $article;


}
