<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
     * @ORM\ManyToOne(targetEntity="App\Entity\Personne")
     */
    private $id_real;
    /**
     * @ORM\Column(type="string")
     */
    private $titre;
    /**
     * @ORM\Column(type="string")
     */
    private $description;
    /**
     * @ORM\Column(type="date")
     */
    private $date_sortie;
    /**
     * @ORM\Column(type="string")
     */
    private $bande_annonce;
    /**
     * @ORM\Column(type="string")
     */
    private $image;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\ActeurFilm", mappedBy="id_film")
     */
    private $acteurFilms;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Commentaire", mappedBy="id_film")
     */
    private $commentaires;

    public function __construct()
    {
        $this->acteurFilms = new ArrayCollection();
        $this->commentaires = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdReal(): ?Personne
    {
        return $this->id_real;
    }

    public function setIdReal(?Personne $id_real): self
    {
        $this->id_real = $id_real;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * @param mixed $titre
     * @return Film
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     * @return Film
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDateSortie()
    {
        return $this->date_sortie;
    }

    /**
     * @param mixed $date_sortie
     * @return Film
     */
    public function setDateSortie($date_sortie)
    {
        $this->date_sortie = $date_sortie;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getBandeAnnonce()
    {
        return $this->bande_annonce;
    }

    /**
     * @param mixed $bande_annonce
     * @return Film
     */
    public function setBandeAnnonce($bande_annonce)
    {
        $this->bande_annonce = $bande_annonce;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     * @return Film
     */
    public function setImage($image)
    {
        $this->image = $image;
        return $this;
    }

    /**
     * @return Collection|ActeurFilm[]
     */
    public function getActeurFilms(): Collection
    {
        return $this->acteurFilms;
    }

    public function addActeurFilm(ActeurFilm $acteurFilm): self
    {
        if (!$this->acteurFilms->contains($acteurFilm)) {
            $this->acteurFilms[] = $acteurFilm;
            $acteurFilm->addIdFilm($this);
        }

        return $this;
    }

    public function removeActeurFilm(ActeurFilm $acteurFilm): self
    {
        if ($this->acteurFilms->contains($acteurFilm)) {
            $this->acteurFilms->removeElement($acteurFilm);
            $acteurFilm->removeIdFilm($this);
        }

        return $this;
    }

    /**
     * @return Collection|Commentaire[]
     */
    public function getCommentaires(): Collection
    {
        return $this->commentaires;
    }

    public function addCommentaire(Commentaire $commentaire): self
    {
        if (!$this->commentaires->contains($commentaire)) {
            $this->commentaires[] = $commentaire;
            $commentaire->setIdFilm($this);
        }

        return $this;
    }

    public function removeCommentaire(Commentaire $commentaire): self
    {
        if ($this->commentaires->contains($commentaire)) {
            $this->commentaires->removeElement($commentaire);
            // set the owning side to null (unless already changed)
            if ($commentaire->getIdFilm() === $this) {
                $commentaire->setIdFilm(null);
            }
        }

        return $this;
    }

}
