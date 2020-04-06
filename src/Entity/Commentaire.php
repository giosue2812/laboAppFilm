<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CommentaireRepository")
 */
class Commentaire
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
    private $film;
    /**
     * @ORM\Column(type="string")
     */
    private $content;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Film", inversedBy="commentaires")
     */
    private $id_film;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="commentaires")
     */
    private $id_utilsateur;

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getFilm()
    {
        return $this->film;
    }

    /**
     * @param mixed $film
     * @return Commentaire
     */
    public function setFilm($film)
    {
        $this->film = $film;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     * @return Commentaire
     */
    public function setContent($content)
    {
        $this->content = $content;
        return $this;
    }

    public function getIdFilm(): ?Film
    {
        return $this->id_film;
    }

    public function setIdFilm(?Film $id_film): self
    {
        $this->id_film = $id_film;

        return $this;
    }

    public function getIdUtilsateur(): ?User
    {
        return $this->id_utilsateur;
    }

    public function setIdUtilsateur(?User $id_utilsateur): self
    {
        $this->id_utilsateur = $id_utilsateur;

        return $this;
    }

}
