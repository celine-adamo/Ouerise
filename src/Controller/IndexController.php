<?php

namespace App\Controller;

use App\Service\CallApi;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /**
     * @Route("/", name="index")
     * @param CallApi $callApiServices
     * @return Response
     */
    public function index(CallApi $callApiServices): Response
    {
        return new Response($this->renderView('index/index.html.twig'));
    }

    /**
     * @Route ("/index_json", name="index_json")
     * @return JsonResponse
     */
    public function autrement() :JsonResponse {
        $locations = $this->getDoctrine()->getRepository('App:Location')
            ->findAll();

        $response = new JsonResponse();

        $datas = [];

        foreach ($locations as $location) {
            $datas[] = array(
                'id' => $location->getId(),
                'name' => $location->getName(),
                'description' => $location->getDescription(),
                'img' => $location->getImg(),
            );
        }

        $response->setData([
            'datas' => $datas
        ]);

        return $response;
    }
}