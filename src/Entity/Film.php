<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

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
     * @ORM\Column(type="date", nullable=true)
     */
    private $date_sortie;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $bande_annoce;

    /**
     * @ORM\Column(type="integer")
     * @ORM\ManyToOne(targetEntity="Personne")
     * @ORM\JoinColumn(name="id_real",referencedColumnName="id")
     */
    private $id_real;

    /**
     * @ORM\ManyToMany(targetEntity="Personne")
     * @ORM\JoinTable(name="acteur_film",
     *  joinColumns={@ORM\JoinColumn(name="id_film",referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="id_personne",referencedColumnName="id")}
     * )
     */
    private $personnes;

    public function __construct()
    {
        $this->personnes = new ArrayCollection();
    }

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image;

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

    public function getDateSortie(): ?\DateTimeInterface
    {
        return $this->date_sortie;
    }

    public function setDateSortie(?\DateTimeInterface $date_sortie): self
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

    public function getIdReal(): ?int
    {
        return $this->id_real;
    }

    public function setIdReal(int $id_real): self
    {
        $this->id_real = $id_real;

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

    /**
     * @return ArrayCollection
     */
    public function getPersonnes(): ArrayCollection
    {
        return $this->personnes;
    }

    /**
     * @param ArrayCollection $personnes
     * @return Film
     */
    public function setPersonnes(ArrayCollection $personnes): Film
    {
        $this->personnes = $personnes;
        return $this;
    }

}
