<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PersonneRepository")
 */
class Personne
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;
    /**
     * @ORM\Column(type="string")
     */
    private $nom;
    /**
     * @ORM\Column(type="string")
     */
    private $prenom;
    /**
     * @ORM\Column(type="string")
     */
    private $ad_rue;
    /**
     * @ORM\Column(type="bigint")
     */
    private $ad_code_postal;
    /**
     * @ORM\Column(type="string")
     */
    private $ad_ville;
    /**
     * @ORM\Column(type="integer")
     */
    private $tel;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\ActeurFilm", mappedBy="id_personne")
     */
    private $acteurFilms;

    public function __construct()
    {
        $this->acteurFilms = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     * @return Personne
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param mixed $prenom
     * @return Personne
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAdRue()
    {
        return $this->ad_rue;
    }

    /**
     * @param mixed $ad_rue
     * @return Personne
     */
    public function setAdRue($ad_rue)
    {
        $this->ad_rue = $ad_rue;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAdCodePostal()
    {
        return $this->ad_code_postal;
    }

    /**
     * @param mixed $ad_code_postal
     * @return Personne
     */
    public function setAdCodePostal($ad_code_postal)
    {
        $this->ad_code_postal = $ad_code_postal;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAdVille()
    {
        return $this->ad_ville;
    }

    /**
     * @param mixed $ad_ville
     * @return Personne
     */
    public function setAdVille($ad_ville)
    {
        $this->ad_ville = $ad_ville;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * @param mixed $tel
     * @return Personne
     */
    public function setTel($tel)
    {
        $this->tel = $tel;
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
            $acteurFilm->addIdPersonne($this);
        }

        return $this;
    }

    public function removeActeurFilm(ActeurFilm $acteurFilm): self
    {
        if ($this->acteurFilms->contains($acteurFilm)) {
            $this->acteurFilms->removeElement($acteurFilm);
            $acteurFilm->removeIdPersonne($this);
        }

        return $this;
    }

}
