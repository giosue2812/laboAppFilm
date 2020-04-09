<?php

namespace App\Controller;

use App\Form\FilmType;
use App\Models\FilmForm;
use App\Services\FilmService;
use AutoMapperPlus\Exception\UnregisteredMappingException;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use JMS\Serializer\SerializerInterface;
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

    /**
     * @param Request $request
     * @param SerializerInterface $serializer
     * @return FilmForm|UnregisteredMappingException|\Exception|mixed
     * @Rest\Post(path="/api/films/insert",name="film_insert")
     * @Rest\View()
     */
    public function insertAction(Request $request, SerializerInterface $serializer)
    {
        $filmForm = new FilmForm();
        $data = json_decode($request->getContent(),true);
        $form = $this->createForm(FilmType::class,$filmForm,[
            'csrf_protection' => false
        ]);
        $form->handleRequest($request);
        $form->submit($data);
        if($form->isSubmitted()&&$form->isValid()){
        $filmInsert = $this->service->insert($form->getData());
            return $filmInsert;
        }
        return 'Erreur';

    }
}
