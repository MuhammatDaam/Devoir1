<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity]
#[UniqueEntity(fields: ['numero'], message: 'Ce numéro d\'agence existe déjà')]
#[UniqueEntity(fields: ['telephone'], message: 'Ce numéro de téléphone existe déjà')]
class Agency
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, unique: true)]
    #[Assert\NotBlank(message: 'Le numéro est obligatoire')]
    private string $numero;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: 'L\'adresse est obligatoire')]
    private string $adresse;

    #[ORM\Column(length: 20, unique: true)]
    #[Assert\NotBlank(message: 'Le téléphone est obligatoire')]
    private string $telephone;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumero(): string
    {
        return $this->numero;
    }

    public function setNumero(string $numero): self
    {
        $this->numero = $numero;
        return $this;
    }

    public function getAdresse(): string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;
        return $this;
    }

    public function getTelephone(): string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): self
    {
        $this->telephone = $telephone;
        return $this;
    }
}