<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CommentairesRepository")
 */
class Commentaires
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $film;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $content;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Utilisateur")
     * @ORM\JoinColumn(name="utilisateurs_id",referencedColumnName="id")
     */
    private $utilsateurs;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Film")
     * @ORM\JoinColumn(name="films_id",referencedColumnName="id")
     */
    private $films;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFilm(): ?string
    {
        return $this->film;
    }

    public function setFilm(string $film): self
    {
        $this->film = $film;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(?string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getFilms(): ?int
    {
        return $this->films;
    }

    /**
     * @param Film $films
     * @return $this
     */
    public function setFilms($films): self
    {
        $this->films = $films;

        return $this;
    }

    public function getUtilsateurs(): ?int
    {
        return $this->utilsateurs;
    }

    /**
     * @param Utilisateur $utilsateurs
     * @return $this
     */
    public function setUtilisateurs($utilsateurs): self
    {
        $this->utilsateurs = $utilsateurs;

        return $this;
    }
}
