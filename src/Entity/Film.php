<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
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
     * @Serializer\Groups({"film_list","film_detail"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50,unique=true)
     * @Serializer\Groups({"film_list","film_detail"})
     */
    private $titre;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Serializer\Groups({"film_list"})
     */
    private $description;

    /**
     * @Serializer\Groups({"film_detail"})
     * @ORM\Column(type="date", nullable=true)

     */
    private $date_sortie;

    /**
     * @Serializer\Groups({"film_detail"})
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $bande_annoce;

    /**
     * @Serializer\Groups({"film_detail"})
     * @ORM\ManyToMany(targetEntity="Personne")
     * @ORM\JoinTable(name="acteur_film",
     *  joinColumns={@ORM\JoinColumn(name="id_film",referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="id_personne",referencedColumnName="id")}
     * )
     */
    private $personnes;

    /**
     * @Serializer\Groups({"film_list"})
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image;

    /**
     * @Serializer\Groups({"film_detail"})
     * @ORM\ManyToOne(targetEntity="App\Entity\Personne")
     * @ORM\JoinColumn(name="realisateurs",referencedColumnName="id")
     */
    private $realisateurs;

    public function __construct()
    {
        $this->personnes = new ArrayCollection();
    }

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
