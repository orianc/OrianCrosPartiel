<?php

namespace App\Entity;


use Doctrine\ORM\Mapping as ORM;
use App\Repository\AlbumRepository;
use Symfony\Component\Validator\Constraints as Assert;



/**
 * @ORM\Entity(repositoryClass=AlbumRepository::class)
 */
class Album
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Assert\NotBlank(message="Ce champ ne peut pas être vide !")
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @Assert\NotBlank(message="Ce champ ne peut pas être vide !")

     * @ORM\Column(type="string", length=255)
     */
    private $pochette;

    /**
     * @ORM\Column(type="date")
     */
    private $annee;

    /**
     * @Assert\NotBlank(message="Ce champ ne peut pas être vide !")

     * @ORM\Column(type="string", length=255)
     */
    private $genre;

    /**
     * 
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $presentation;

    /**
     * 
     * @ORM\ManyToOne(targetEntity=Artiste::class, inversedBy="albums")
     * @ORM\JoinColumn(nullable=false)
     */
    private $artiste;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getPochette(): ?string
    {
        return $this->pochette;
    }

    public function setPochette(string $pochette): self
    {
        $this->pochette = $pochette;

        return $this;
    }

    public function getAnnee(): ?\DateTimeInterface
    {
        return $this->annee;
    }

    public function setAnnee(\DateTimeInterface $annee): self
    {
        $this->annee = $annee;

        return $this;
    }

    public function getGenre(): ?string
    {
        return $this->genre;
    }

    public function setGenre(string $genre): self
    {
        $this->genre = $genre;

        return $this;
    }

    public function getPresentation(): ?string
    {
        return $this->presentation;
    }

    public function setPresentation(?string $presentation): self
    {
        $this->presentation = $presentation;

        return $this;
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
}
