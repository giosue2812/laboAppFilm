<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ActeurFilmRepository")
 */
class ActeurFilm
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Film")
     */
    private $Films;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Personne")
     */
    private $Acteurs;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFilms(): ?Film
    {
        return $this->Films;
    }

    public function setFilms(?Film $Films): self
    {
        $this->Films = $Films;

        return $this;
    }

    public function getActeurs(): ?Personne
    {
        return $this->Acteurs;
    }

    public function setActeurs(?Personne $Acteurs): self
    {
        $this->Acteurs = $Acteurs;

        return $this;
    }

}
