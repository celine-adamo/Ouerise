<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Contracts\HttpClient\ResponseInterface;

class CallApi {

    private HttpClientInterface $client;

    public function __construct(HttpClientInterface $client) {
        $this->client = $client;
    }

    /**
     * Fonction servant à récupérer le paramètre de la route ex. "Lion de belfort"
     * Renvoie la variable dans le lien de l'api dans la fonction getApiData()
     * @param $lieu
     * @return string[]
     */
    public function getApiLocation($lieu) : array {
        return $this->getApiData('?q=' . $lieu);
    }

    /**
     * Fonction servant à récupérer la réponse
     * @param $lieu
     * @return string[]
     */
    public function getApiData($lieu): array
    {
        // En méthode GET, on va chercher les données grâce à l'url passé en deuxième paramètre.
        $response = $this->client->request(
            'GET',
            'https://api-adresse.data.gouv.fr/search/' . $lieu
        );
        return $response->toArray();
    }
}
