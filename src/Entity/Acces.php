<?php

namespace App\Entity;

use App\Repository\AccesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AccesRepository::class)
 */
class Acces
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Autorisation::class, inversedBy="acces")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Autorisation_Id;

    /**
     * @ORM\ManyToOne(targetEntity=Documents::class, inversedBy="acces")
     * @ORM\JoinColumn(nullable=false)
     */
    private $DocumentId;

    /**
     * @ORM\ManyToOne(targetEntity=Utilisateur::class, inversedBy="acces")
     * @ORM\JoinColumn(nullable=false)
     */
    private $UtilisateurId;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAutorisationId(): ?Autorisation
    {
        return $this->Autorisation_Id;
    }

    public function setAutorisationId(?Autorisation $Autorisation_Id): self
    {
        $this->Autorisation_Id = $Autorisation_Id;

        return $this;
    }

    public function getDocumentId(): ?Documents
    {
        return $this->DocumentId;
    }

    public function setDocumentId(?Documents $DocumentId): self
    {
        $this->DocumentId = $DocumentId;

        return $this;
    }

    public function getUtilisateurId(): ?Utilisateur
    {
        return $this->UtilisateurId;
    }

    public function setUtilisateurId(?Utilisateur $UtilisateurId): self
    {
        $this->UtilisateurId = $UtilisateurId;

        return $this;
    }
}
