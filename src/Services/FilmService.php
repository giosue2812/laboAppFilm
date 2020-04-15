<?php


namespace App\Services;


use App\Entity\ActeurFilm;
use App\Entity\Film;
use App\Models\DTO\FilmDetailDTO;
use App\Models\DTO\FilmListDTO;
use App\Models\FilmForm;
use App\Repository\ActeurFilmRepository;
use App\Repository\FilmRepository;
use App\Repository\PersonneRepository;
use App\Utils\MapperAuto;
use AutoMapperPlus\Exception\UnregisteredMappingException;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FilmService extends AbstractController
{
    /**
     * @var EntityManagerInterface $manager
     */
    private $manager;
    /**
     * @var FilmRepository $repository
     */
    private $repository;
    /**
     * @var PersonneRepository $repositoryPersonne;
     */
    private $repositoryPersonne;

    /**
     * @var ActeurFilmRepository $repositoryActeurFilm
     */
    private $repositoryActeurFilm;
    /**
     * @var MapperAuto $mapperAuto
     */
    private $mapperAuto;

    public function __construct(EntityManagerInterface $manager, FilmRepository $repository, MapperAuto $mapperAuto, PersonneRepository $personneRepository,ActeurFilmRepository $acteurFilmRepository)
    {
        $this->manager = $manager;
        $this->repository = $repository;
        $this->mapperAuto = $mapperAuto;
        $this->repositoryPersonne = $personneRepository;
        $this->repositoryActeurFilm = $acteurFilmRepository;
    }

    public function list()
    {
        $film = $this->repository->findAll();
        return array_map(function($item){
            return new FilmListDTO($item);
        },$film);
    }

    public function detail($id)
    {
        $film = $this->repository->find($id);
        $acteurFilmFind = $this->repositoryActeurFilm->findOneBy(['Films'=>$film]);
        $realisateurs = $this->repositoryPersonne->find($film->getRealisateurs());
        return new FilmDetailDTO($film,$realisateurs,$acteurFilmFind);
    }

    public function insert(FilmForm $filmForm)
    {
        $mapper = $this->mapperAuto->mapp(FilmForm::class,Film::class);
        try{
          $film = $mapper->map($filmForm, Film::class);
          dump($film);
          $this->manager->persist($film);
          $this->manager->flush();
        } catch (UnregisteredMappingException $e){
            return ($e);
        }
        return $film;
    }

    public function addRealisateur($filmId,$personneId)
    {
        $film = $this->repository->find($filmId);
        $realisateur = $this->repositoryPersonne->find($personneId);
        $film->setRealisateurs($realisateur);
        $this->manager->flush();
        return $film;
    }

    public function addActeur($filmId,$personneId)
    {
        $acteurFilm = new ActeurFilm();
        $film = $this->repository->find($filmId);
        $acteur = $this->repositoryPersonne->find($personneId);
        $acteurFilm->setFilms($film);
        $acteurFilm->setActeurs($acteur);
        $this->manager->persist($acteurFilm);
        $this->manager->flush();
        return $acteurFilm;
    }
}
