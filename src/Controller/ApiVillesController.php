<?php

namespace App\Controller;

use App\Repository\VillesRepository;
use Normalizer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Config\Definition\Builder\NormalizationBuilder;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class ApiVillesController extends AbstractController
{
  /**
   * @Route("/api/villes", name="api_villes_index", methods={"GET"})
   */
  public function index(VillesRepository $villesRepository, NormalizerInterface $normalizer): Response
  {
    return $this->json($villesRepository->findAll(), 200, [], ['groups' => 'ville:read']);
  }


  /**
   * @Route("/api/ville/{id}", name="api_villes_show", methods={"GET"})
   */
  public function show($id, VillesRepository $villesRepository, NormalizerInterface $normalizer): Response
  {
    return $this->json($villesRepository->findBy(['id' => $id]), 200, [], ['groups' => 'ville:read']);
  }
}
