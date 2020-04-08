<?php

namespace App\Controller;

use App\Services\FilmService;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use JMS\Serializer\Annotation as Serializer;


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
     * @Rest\View(serializerGroups={"list"})
     */
    public function listAction()
    {
        return $this->service->list();
    }
}
