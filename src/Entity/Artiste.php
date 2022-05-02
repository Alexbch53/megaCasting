<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Artiste
 *
 * @ORM\Table(name="Artiste", indexes={@ORM\Index(name="IDX_53BA0CD330B2325D", columns={"IdCivilite"})})
 * @ORM\Entity
 */
class Artiste implements UserInterface, PasswordAuthenticatedUserInterface
{
    /**
     * @var string
     * @ORM\Column(type="string", length=255)
     */
    private $login;
    /**
     * @var int
     *
     * @ORM\Column(name="identifiant", type="bigint", nullable=false)
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
     * @var \DateTime
     *
     * @ORM\Column(name="Date_Naissance", type="date", nullable=false)
     */
    private $dateNaissance;
    /**
     * @var \Civilite
     *
     * @ORM\ManyToOne(targetEntity="Civilite")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="IdCivilite", referencedColumnName="Identifiant",nullable=false)
     * })
     */
    private $idcivilite;
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
    private $identifiantOffre;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->identifiantOffre = new \Doctrine\Common\Collections\ArrayCollection();
    }
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
    public function getPrenom(): ?string
    {
        return $this->prenom;
    }
    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }
    public function getCv(): ?string
    {
        return $this->cv;
    }
    public function setCv(?string $cv): self
    {
        $this->cv = $cv;

        return $this;
    }
    public function getDateNaissance(): ?\DateTimeInterface
    {
        return $this->dateNaissance;
    }
    public function setDateNaissance(\DateTimeInterface $dateNaissance): self
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }
    public function getIdcivilite(): \Civilite
    {
        return $this->idcivilite;
    }
    public function setIdcivilite(Civilite $idcivilite): self
    {
        $this->idcivilite = $idcivilite;

        return $this;
    }
    /**
     * @return Collection<int, OffreDeCasting>
     */
    public function getIdentifiantOffre(): Collection
    {
        return $this->identifiantOffre;
    }
    public function addIdentifiantOffre(OffreDeCasting $identifiantOffre): self
    {
        if (!$this->identifiantOffre->contains($identifiantOffre)) {
            $this->identifiantOffre[] = $identifiantOffre;
        }

        return $this;
    }
    public function removeIdentifiantOffre(OffreDeCasting $identifiantOffre): self
    {
        $this->identifiantOffre->removeElement($identifiantOffre);

        return $this;
    }
    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];
    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;
    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */

    public function getUserIdentifier(): string
    {
        return (string)$this->login;
    }
    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }
    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }
    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }
    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }
    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    /**
     * @return string
     */
    public function getLogin(): string
    {
        return $this->login;
    }

    /**
     * @param string $login
     */
    public function setLogin(string $login): void
    {
        $this->login = $login;
    }

    public function setModifieddate(\DateTime $param)
    {
    }
}
