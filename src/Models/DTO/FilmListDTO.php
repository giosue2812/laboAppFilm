<?php


namespace App\Models\DTO;


use App\Entity\Film;

class FilmListDTO
{
    /**
     * @var int $id
     */
    private $id;
    /**
     * @var string $titre
     */
    private $titre;
    /**
     * @var string $description;
     */
    private $description;
    /**
     * @var string $image
     */
    private $image;

    public function __construct(Film $film)
    {
        $this->titre = $film->getTitre();
        $this->description = $film->getDescription();
        $this->id = $film->getId();
        $this->image = $film->getImage();
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return FilmListDTO
     */
    public function setId(int $id): FilmListDTO
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitre(): string
    {
        return $this->titre;
    }

    /**
     * @param string $titre
     * @return FilmListDTO
     */
    public function setTitre(string $titre): FilmListDTO
    {
        $this->titre = $titre;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return FilmListDTO
     */
    public function setDescription(string $description): FilmListDTO
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return string
     */
    public function getImage(): string
    {
        return $this->image;
    }

    /**
     * @param string $image
     * @return FilmListDTO
     */
    public function setImage(string $image): FilmListDTO
    {
        $this->image = $image;
        return $this;
    }
}
