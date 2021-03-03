<?php

namespace App\Entity;

use App\Repository\UTILISATEURRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UTILISATEURRepository::class)
 */
class UTILISATEUR
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $Nom;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $Prenom;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $MOT_DE_PASSE;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): self
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->Prenom;
    }

    public function setPrenom(?string $Prenom): self
    {
        $this->Prenom = $Prenom;

        return $this;
    }

    public function getMOTDEPASSE(): ?string
    {
        return $this->MOT_DE_PASSE;
    }

    public function setMOTDEPASSE(string $MOT_DE_PASSE): self
    {
        $this->MOT_DE_PASSE = $MOT_DE_PASSE;

        return $this;
    }
}
