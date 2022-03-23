<?php
// src/Entity/Task.php
namespace App\Entity;

class Application
{
    protected int $CastingIdentifier;
    protected string $firstName;
    protected string $lastName;
    protected string $email;
    protected string $motivation;
    protected string $Sexe;
    protected \DateTime $applicationDate;
    protected \DateTime $birthDate;

    /**
     * @return int
     */
    public function getCastingIdentifier(): int
    {
        return $this->CastingIdentifier;
    }

    /**
     * @param int $CastingIdentifier
     */
    public function setCastingIdentifier(int $CastingIdentifier): void
    {
        $this->CastingIdentifier = $CastingIdentifier;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getMotivation(): string
    {
        return $this->motivation;
    }

    /**
     * @param string $motivation
     */
    public function setMotivation(string $motivation): void
    {
        $this->motivation = $motivation;
    }

    /**
     * @return string
     */
    public function getSexe(): string
    {
        return $this->Sexe;
    }

    /**
     * @param string $Sexe
     */
    public function setSexe(string $Sexe): void
    {
        $this->Sexe = $Sexe;
    }

    /**
     * @return \DateTime
     */
    public function getApplicationDate(): \DateTime
    {
        return $this->applicationDate;
    }

    /**
     * @param \DateTime $applicationDate
     */
    public function setApplicationDate(\DateTime $applicationDate): void
    {
        $this->applicationDate = $applicationDate;
    }

    /**
     * @return \DateTime
     */
    public function getBirthDate(): \DateTime
    {
        return $this->birthDate;
    }

    /**
     * @param \DateTime $birthDate
     */
    public function setBirthDate(\DateTime $birthDate): void
    {
        $this->birthDate = $birthDate;
    }

}