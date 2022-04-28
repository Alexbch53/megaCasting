<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Login
 *
 * @ORM\Table(name="Login")
 * @ORM\Entity
 */
class Login
{
    /**
     * @var int
     *
     * @ORM\Column(name="identifiant", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $identifiant;

    /**
     * @var string|null
     *
     * @ORM\Column(name="user_login", type="string", length=100, nullable=true)
     */
    private $userLogin;

    /**
     * @var string|null
     *
     * @ORM\Column(name="user_password", type="string", length=100, nullable=true)
     */
    private $userPassword;

    public function getIdentifiant(): ?int
    {
        return $this->identifiant;
    }

    public function getUserLogin(): ?string
    {
        return $this->userLogin;
    }

    public function setUserLogin(?string $userLogin): self
    {
        $this->userLogin = $userLogin;

        return $this;
    }

    public function getUserPassword(): ?string
    {
        return $this->userPassword;
    }

    public function setUserPassword(?string $userPassword): self
    {
        $this->userPassword = $userPassword;

        return $this;
    }
}
