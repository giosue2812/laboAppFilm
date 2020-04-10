<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FilmRepository")
 */
class Film
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50,unique=true)
     */
    private $titre;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="date",nullable=true)
     */
    private $date_sortie;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $bande_annoce;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Personne")
     * @ORM\JoinColumn(name="realisateurs",referencedColumnName="id")
     */
    private $realisateurs;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getDateSortie(): ?\DateTime
    {
        return $this->date_sortie;
    }

    public function setDateSortie(?\DateTime $date_sortie): self
    {
        $this->date_sortie = $date_sortie;

        return $this;
    }

    public function getBandeAnnoce(): ?string
    {
        return $this->bande_annoce;
    }

    public function setBandeAnnoce(?string $bande_annoce): self
    {
        $this->bande_annoce = $bande_annoce;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getRealisateurs(): ?Personne
    {
        return $this->realisateurs;
    }

    public function setRealisateurs(?Personne $realisateurs): self
    {
        $this->realisateurs = $realisateurs;

        return $this;
    }

}
