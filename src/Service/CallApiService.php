<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class CallApiService
{

  private $client;

  public function __construct(HttpClientInterface $client)
  {
    $this->client = $client;
  }

  public function getData()
  {

    $response = $this->client->request(
      'GET',
      'https://localhost:8000/api/villes'
    );

    return $response->toArray();
  }

  public function getOneData($id)
  {

    $response = $this->client->request(
      'GET',
      'https://localhost:8000/api/ville/' . $id
    );

    return $response->toArray();
  }
}
