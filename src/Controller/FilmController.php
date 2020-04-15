<?php

namespace App\Controller;

use App\Entity\Film;
use App\Entity\Personne;
use App\Form\FilmType;
use App\Models\FilmForm;
use App\Services\FilmService;
use AutoMapperPlus\Exception\UnregisteredMappingException;
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
     * @Rest\View()
     */
    public function listAction()
    {
        return $this->service->list();
    }

    /**
     * @Rest\Get(path="/api/films/detail/{id}")
     * @Rest\View()
     * @param Request $request
     * @return mixed
     */
    public function detailAction(Request $request)
    {
        return $this->service->detail($request->get('id'));
    }

    /**
     * @param Request $request
     * @return FilmForm|UnregisteredMappingException|\Exception|mixed
     * @Rest\Post(path="/api/films/insert")
     * @Rest\View()
     */
    public function insertAction(Request $request)
    {
        $filmForm = new FilmForm();
        $data = json_decode($request->getContent(),true);
        $form = $this->createForm(FilmType::class,$filmForm,[
            'csrf_protection' => false
        ]);
        $form->handleRequest($request);
        $form->submit($data);
        if($form->isSubmitted()&&$form->isValid())
        {
             $this->service->insert($form->getData());
        }
        return $filmForm;
    }

    /**
     * @param Film $filmId
     * @param Personne $personneId
     * @Rest\Put(path="/api/films/{filmId}/add/{personneId}")
     * @Rest\View()
     * @return string
     */
    public function addRealisateurAction(Film $filmId, Personne $personneId)
    {
        $this->service->addRealisateur($filmId,$personneId);
        return 'ok';
    }

    /**
     * @param Film $filmId
     * @param Personne $personneId
     * @Rest\Post("/api/films/insert/{filmId}/and/{personneId}")
     * @Rest\View()
     * @return string
     */
    public function addActeurAction(Film $filmId, Personne $personneId)
    {
        $this->service->addActeur($filmId,$personneId);
        return 'ok';
    }
}
