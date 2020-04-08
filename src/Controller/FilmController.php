<?php

namespace App\Controller;

use App\Services\FilmService;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\Request;

class FilmController extends AbstractFOSRestController
{
    /**
     * @var FilmService $service
     */
    private $service;

    public function __construct(FilmService $service)
    {
        $this->service = $service;
    }

    /**
     * @Rest\Get(path="/api/films")
     * @Rest\View(serializerGroups={"film_list"})
     */
    public function listAction()
    {
        return $this->service->list();
    }

    /**
     * @Rest\Get(path="/api/films/detail/{id}")
     * @Rest\View(serializerGroups={"film_detail"})
     * @param Request $request
     * @return mixed
     */
    public function detailAction(Request $request)
    {
        return $this->service->detail($request->get('id'));
    }
}
