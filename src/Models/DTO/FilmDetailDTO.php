<?php


namespace App\Models\DTO;


use App\Entity\ActeurFilm;
use App\Entity\Film;
use App\Entity\Personne;

class FilmDetailDTO
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
     * @var \DateTime $date_sortie
     */
    private $date_sortie;
    /**
     * @var string
     */
    private $bande_annoce;
    /**
     * @var Personne $realisateurs
     */
    private $realisateurs;
    /**
     * @var ActeurFilm[] $acteurs
     */
    private $acteurs;

    public function __construct(Film $film, Personne $personne, ActeurFilm $acteurFilm = null)
    {
        $this->id = $film->getId();
        $this->titre = $film->getTitre();
        $this->date_sortie = $film->getDateSortie();
        $this->bande_annoce = $film->getBandeAnnoce();
        $this->realisateurs = $personne;
        if($acteurFilm == null)
        {
            return $this->acteurs = [];
        }
        else
        {
            $this->acteurs = $acteurFilm->getActeurs();
        }

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
     * @return FilmDetailDTO
     */
    public function setId(int $id): FilmDetailDTO
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
     * @return FilmDetailDTO
     */
    public function setTitre(string $titre): FilmDetailDTO
    {
        $this->titre = $titre;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDateSortie(): \DateTime
    {
        return $this->date_sortie;
    }

    /**
     * @param \DateTime $date_sortie
     * @return FilmDetailDTO
     */
    public function setDateSortie(\DateTime $date_sortie): FilmDetailDTO
    {
        $this->date_sortie = $date_sortie;
        return $this;
    }

    /**
     * @return string
     */
    public function getBandeAnnoce(): string
    {
        return $this->bande_annoce;
    }

    /**
     * @param string $bande_annoce
     * @return FilmDetailDTO
     */
    public function setBandeAnnoce(string $bande_annoce): FilmDetailDTO
    {
        $this->bande_annoce = $bande_annoce;
        return $this;
    }

    /**
     * @return Personne
     */
    public function getRealisateurs(): Personne
    {
        return $this->realisateurs;
    }

    /**
     * @param Personne $realisateurs
     * @return FilmDetailDTO
     */
    public function setRealisateurs(Personne $realisateurs): FilmDetailDTO
    {
        $this->realisateurs = $realisateurs;
        return $this;
    }

    /**
     * @return ActeurFilm[]
     */
    public function getActeurs(): ?array
    {
        return $this->acteurs;
    }

    /**
     * @param ActeurFilm[] $acteurs
     * @return FilmDetailDTO
     */
    public function setActeurs(array $acteurs): FilmDetailDTO
    {
        $this->acteurs = $acteurs;
        return $this;
    }

}
