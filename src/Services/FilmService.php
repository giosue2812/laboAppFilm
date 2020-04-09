<?php


namespace App\Services;


use App\Entity\Film;
use App\Models\FilmForm;
use App\Repository\FilmRepository;
use App\Utils\MapperAuto;
use AutoMapperPlus\Exception\UnregisteredMappingException;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityManagerInterface;

class FilmService
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
     * @var MapperAuto $mapperAuto
     */
    private $mapperAuto;

    public function __construct(EntityManagerInterface $manager, FilmRepository $repository, MapperAuto $mapperAuto)
    {
        $this->manager = $manager;
        $this->repository = $repository;
        $this->mapperAuto = $mapperAuto;
    }

    public function list()
    {
        return $this->repository->findAll();
    }

    public function detail($id)
    {
        return $film = $this->repository->find($id);
    }

    public function insert(FilmForm $filmForm)
    {

        $mapper = $this->mapperAuto->mapp(FilmForm::class,Film::class);
        try{
          $film = $mapper->map($filmForm, Film::class);
          $this->manager->persist($film);
          $this->manager->flush();
        } catch (UnregisteredMappingException $e){
            return ($e);
        }
        return $film;
    }
}
