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
     * @ORM\Column(type="bigint")
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
     * @ORM\ManyToOne(targetEntity="Film")
     * @ORM\JoinColumn(name="id_film",referencedColumnName="id")
     */
    private $id_film;

    /**
     * @ORM\ManyToOne(targetEntity="Utilisateur")
     * @ORM\JoinColumn(name="id_utilisateur",referencedColumnName="id")
     */
    private $id_utilisateur;

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

    public function getIdFilm(): ?int
    {
        return $this->id_film;
    }

    public function setIdFilm(int $id_film): self
    {
        $this->id_film = $id_film;

        return $this;
    }

    public function getIdUtilisateur(): ?int
    {
        return $this->id_utilisateur;
    }

    public function setIdUtilisateur(int $id_utilisateur): self
    {
        $this->id_utilisateur = $id_utilisateur;

        return $this;
    }
}
