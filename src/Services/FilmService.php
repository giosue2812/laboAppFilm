<?php


namespace App\Services;


use App\Repository\FilmRepository;
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

    public function __construct(EntityManagerInterface $manager, FilmRepository $repository)
    {
        $this->manager = $manager;
        $this->repository = $repository;
    }

    public function list()
    {
        return $this->repository->findAll();
    }
}
